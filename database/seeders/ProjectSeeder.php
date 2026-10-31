<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Gazpro - Property Management',
                'category' => 'Web Company Profile',
                'badge_color' => 'primary',
                'description' => 'Website in-house eksklusif untuk manajemen dan pemasaran perumahan modern, lengkap dengan galeri unit dan form prospek.',
                'live_url' => '#',
            ],
            [
                'title' => 'Findara Tour & Travel',
                'category' => 'Web Booking',
                'badge_color' => 'primary',
                'description' => 'Template website biro perjalanan dengan fitur pencarian paket wisata, itinerary interaktif, dan integrasi WhatsApp booking.',
                'live_url' => '#',
            ],
            [
                'title' => 'Gourmet Resto & Cafe',
                'category' => 'Web Katalog',
                'badge_color' => 'primary',
                'description' => 'Desain website elegan untuk bisnis kuliner yang menampilkan menu digital, reservasi meja online, dan ulasan pelanggan.',
                'live_url' => '#',
            ],
            [
                'title' => 'Sistem Kasir (POS) Cloud',
                'category' => 'Web System / App',
                'badge_color' => 'success',
                'description' => 'Aplikasi Point of Sales berbasis web untuk manajemen stok barang, kasir real-time, dan laporan laba rugi otomatis.',
                'live_url' => '#',
            ],
            [
                'title' => 'E-Absensi & HRIS Terpadu',
                'category' => 'Web System / App',
                'badge_color' => 'success',
                'description' => 'Sistem manajemen sumber daya manusia dengan fitur absensi titik koordinat (GPS), pengajuan cuti, dan rekap penggajian.',
                'live_url' => '#',
            ],
            [
                'title' => 'SIMRS Klinik & Bridging BPJS',
                'category' => 'Enterprise System',
                'badge_color' => 'success',
                'description' => 'Sistem Informasi Manajemen Rumah Sakit skala enterprise yang terintegrasi penuh dengan API BPJS Kesehatan (HFIS) secara real-time.',
                'live_url' => '#',
            ]
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}