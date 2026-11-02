<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice Pembayaran Findara</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f6f9; padding: 30px; margin: 0;">
    <div style="max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">
        
        <!-- Header -->
        <div style="background-color: #13357B; color: #ffffff; padding: 24px; text-align: center;">
            <h2 style="margin: 0; font-size: 22px;">Findara Digital Store</h2>
            <p style="margin: 5px 0 0; font-size: 14px; opacity: 0.85;">Terima kasih atas pesanan Anda!</p>
        </div>

        <!-- Body -->
        <div style="padding: 30px; color: #333333; line-height: 1.6;">
            <p style="margin-top: 0;">Halo <strong>{{ $order->customer_name }}</strong>,</p>
            <p>Pembayaran Anda telah berhasil kami terima. Berikut adalah rincian transaksi dan tautan untuk mengunduh produk digital Anda:</p>

            <div style="background-color: #f8f9fa; border-left: 4px solid #13357B; padding: 15px; margin: 20px 0; border-radius: 4px;">
                <p style="margin: 4px 0;"><strong>No. Invoice:</strong> {{ $order->order_id }}</p>
                <p style="margin: 4px 0;"><strong>Produk:</strong> {{ $order->product->name ?? 'Produk Digital' }}</p>
                <p style="margin: 4px 0;"><strong>Total Bayar:</strong> Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
                <p style="margin: 4px 0;"><strong>Status:</strong> <span style="color: #198754; font-weight: bold;">LUNAS (PAID)</span></p>
            </div>

            @if(!empty($order->product->file_url))
            <div style="text-align: center; margin: 30px 0;">
                <a href="{{ $order->product->file_url }}" target="_blank"
                   style="background-color: #13357B; color: #ffffff; text-decoration: none; padding: 14px 28px; border-radius: 50px; font-weight: bold; display: inline-block;">
                    Download Produk Digital
                </a>
            </div>
            <p style="font-size: 13px; color: #666666;">Jika tombol di atas tidak berfungsi, salin dan buka tautan berikut di browser Anda:<br>
                <a href="{{ $order->product->file_url }}" style="color: #13357B;">{{ $order->product->file_url }}</a>
            </p>
            @else
            <p style="color: #666666;">File produk digital Anda sedang disiapkan dan akan segera dikirimkan oleh tim kami.</p>
            @endif

            <hr style="border: none; border-top: 1px solid #eeeeee; margin: 25px 0;">
            <p style="font-size: 13px; color: #888888; margin-bottom: 0;">
                Butuh bantuan? Hubungi kami via WhatsApp di 0852 1330 3200 atau balas langsung email ini.<br>
                <strong>Findara - Agensi IT & Digital Marketing Pekanbaru</strong>
            </p>
        </div>
    </div>
</body>
</html>