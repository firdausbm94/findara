<?php

namespace App\Http\Controllers;

use App\Mail\OrderPaidMail;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Snap;

class ShopController extends Controller
{
    public function __construct()
    {
        Config::$serverKey    = config('services.midtrans.server_key');
        Config::$isProduction = (bool) config('services.midtrans.is_production');
        Config::$isSanitized  = (bool) config('services.midtrans.is_sanitized');
        Config::$is3ds        = (bool) config('services.midtrans.is_3ds');
    }

    // 1. Halaman Etalase Toko
    public function index()
    {
        $products = Product::latest()->get();
        return view('shop', compact('products'));
    }

    // 2. Proses Checkout & Request Snap Token Midtrans
    public function checkout(Request $request)
    {
        $request->validate([
            'product_id'     => 'required|exists:products,id',
            'customer_name'  => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:30',
        ]);

        $product = Product::findOrFail($request->product_id);
        $orderId = 'FDR-' . time() . '-' . strtoupper(Str::random(4));

        // Simpan ke tabel orders dengan status awal 'pending'
        $order = Order::create([
            'order_id'       => $orderId,
            'product_id'     => $product->id,
            'customer_name'  => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'total_price'    => (int) $product->price,
            'status'         => 'pending',
        ]);

        // Parameter payload ke Midtrans Snap
        $params = [
            'transaction_details' => [
                'order_id'     => $order->order_id,
                'gross_amount' => (int) $order->total_price,
            ],
            'item_details' => [
                [
                    'id'       => (string) $product->id,
                    'price'    => (int) $product->price,
                    'quantity' => 1,
                    'name'     => Str::limit($product->name, 45),
                ],
            ],
            'customer_details' => [
                'first_name' => $order->customer_name,
                'email'      => $order->customer_email,
                'phone'      => $order->customer_phone,
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
            $order->update(['snap_token' => $snapToken]);

            return response()->json([
                'status'     => 'success',
                'snap_token' => $snapToken,
                'order_id'   => $order->order_id,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Gagal memproses transaksi: ' . $e->getMessage(),
            ], 500);
        }
    }

    // 3. Webhook / Callback Otomatis dari Midtrans + Auto-Email
    public function callback(Request $request)
    {
        $serverKey = config('services.midtrans.server_key');

        // Verifikasi Signature Key asli dari Midtrans
        $hashed = hash(
            'sha512',
            $request->order_id . $request->status_code . $request->gross_amount . $serverKey
        );

        if ($hashed !== $request->signature_key) {
            return response()->json(['message' => 'Invalid signature key'], 403);
        }

        $order = Order::with('product')->where('order_id', $request->order_id)->first();
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $transactionStatus = $request->transaction_status;
        $fraudStatus       = $request->fraud_status;

        // Pastikan email hanya dikirim 1 kali saat status berubah menjadi 'paid'
        if ($order->status !== 'paid') {
            if (($transactionStatus == 'capture' && $fraudStatus == 'accept') || $transactionStatus == 'settlement') {
                $order->update(['status' => 'paid']);

                try {
                    Mail::to($order->customer_email)->send(new OrderPaidMail($order));
                } catch (\Exception $e) {
                    Log::error('Gagal mengirim email order: ' . $e->getMessage());
                }
            } elseif (in_array($transactionStatus, ['cancel', 'deny', 'expire'])) {
                $order->update(['status' => 'failed']);
            } elseif ($transactionStatus == 'pending') {
                $order->update(['status' => 'pending']);
            }
        }

        return response()->json(['message' => 'Callback received successfully']);
    }
}