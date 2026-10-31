<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    public function ask(Request $request)
    {
        $prompt = $request->input('message');
        $apiKey = env('GEMINI_API_KEY');
        
        if (!$apiKey) {
            return response()->json(['reply' => 'System Error: API Key belum terbaca.']);
        }
        
        $systemContext = "Kamu adalah asisten AI Findara (Agensi IT & Digital Marketing di Pekanbaru). Layanan utama: pembuatan website, bridging SIMRS, dan digital marketing. 
        INFO KONTAK RESMI FINDARA: 
        - WhatsApp: 0852 1330 3200
        - Email: findaraofficial@gmail.com
        - Alamat: Pekanbaru, Riau
        
        Aturan KETAT:
        1. Jawab dengan gaya asik, santai, natural, kekinian seperti konsultan muda. Sapa user dengan 'Kak'.
        2. Jawab singkat maksimal 2 paragraf pendek. Gunakan emoji secukupnya.
        3. JIKA ditanya kontak, HANYA berikan data Info Kontak Resmi di atas. JANGAN PERNAH mengarang nomor lain.
        4. DILARANG KERAS menggunakan format teks Markdown seperti tanda bintang (*) atau garis bawah (_). Jawab menggunakan teks murni 100% tanpa format tebal/miring.
        Pertanyaan user: ";
        
        try {
            // Batas waktu tunggu diperpanjang jadi 60 detik biar nggak gampang timeout
            $response = Http::withoutVerifying()
                ->timeout(60)
                ->withHeaders([
                    'Content-Type' => 'application/json'
                ])->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-3.5-flash:generateContent?key={$apiKey}", [
                    'contents' => [
                        ['parts' => [['text' => $systemContext . " " . $prompt]]]
                    ]
                ]);

            if ($response->failed()) {
                return response()->json(['reply' => 'API Error: ' . $response->body()]);
            }

            $data = $response->json();
            
            // Pengaman struktur JSON anti "undefined"
            if (isset($data['candidates'][0]['content']['parts'][0]['text'])) {
                $reply = $data['candidates'][0]['content']['parts'][0]['text'];
            } else {
                $reply = 'Maaf Kak, sistem gagal memproses balasan (kemungkinan terkena filter keamanan Google).';
            }

            return response()->json(['reply' => $reply]);

        } catch (\Exception $e) {
            return response()->json(['reply' => 'Local Error: Jaringan terputus atau timeout. Detail: ' . $e->getMessage()]);
        }
    }
}