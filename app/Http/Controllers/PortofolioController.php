<?php

namespace App\Http\Controllers;

class PortofolioController extends Controller
{
    public function index()
    {
        $portofolio = [
            [
                'foto'      => 'porto-01.jpg',
                'pasangan'  => 'Hildan & Lala',
                'tanggal'   => 'April 2026',
                'sort_date' => '2026-04',
                'template'  => 'Serene Glow',
                'paket'     => 'Standard',
                'rating'    => 5,
            ],
            [
                'foto'      => 'porto-02.jpg',
                'pasangan'  => 'Gilang & Jihan',
                'tanggal'   => 'April 2026',
                'sort_date' => '2026-04',
                'template'  => 'Aura Silver',
                'paket'     => 'Standard',
                'rating'    => 5,
            ],
            [
                'foto'      => 'porto-03.jpg',
                'pasangan'  => 'Ayub & Nuria',
                'tanggal'   => 'April 2026',
                'sort_date' => '2026-04',
                'template'  => 'Serenity Luxe',
                'paket'     => 'Standard',
                'rating'    => 5,
            ],
            [
                'foto'      => 'porto-04.jpg',
                'pasangan'  => 'Farhan & Dian',
                'tanggal'   => 'Mei 2026',
                'sort_date' => '2026-05',
                'template'  => 'Serene Glow',
                'paket'     => 'Standard',
                'rating'    => 5,
            ],
            [
                'foto'      => 'porto-05.jpg',
                'pasangan'  => 'Kris & Elin',
                'tanggal'   => 'Maret 2026',
                'sort_date' => '2026-03',
                'template'  => 'Platinum Lite',
                'paket'     => 'Standard',
                'rating'    => 5,
            ],
            [
                'foto'      => 'porto-06.jpg',
                'pasangan'  => 'Dian & Apidin',
                'tanggal'   => 'Oktober 2025',
                'sort_date' => '2025-10',
                'template'  => 'Eterna',
                'paket'     => 'Standard',
                'rating'    => 4,
            ],
            [
                'foto'      => 'porto-07.jpg',
                'pasangan'  => 'Diki & Lury',
                'tanggal'   => 'Januari 2026',
                'sort_date' => '2026-01',
                'template'  => 'Aruna Series',
                'paket'     => 'Standard',
                'rating'    => 4.5,
            ],
            [
                'foto'      => 'porto-08.jpg',
                'pasangan'  => 'Ananda & Diyan',
                'tanggal'   => 'November 2025',
                'sort_date' => '2025-11',
                'template'  => 'Aruna Series',
                'paket'     => 'Standard',
                'rating'    => 4.5,
            ],
            [
                'foto'      => 'porto-09.jpg',
                'pasangan'  => 'Hilda & Deri',
                'tanggal'   => 'Desember 2025',
                'sort_date' => '2025-12',
                'template'  => 'Aruna Series',
                'paket'     => 'Standard',
                'rating'    => 4.5,
            ],
            [
                'foto'      => 'porto-10.jpg',
                'pasangan'  => 'Tasa & Lutfi',
                'tanggal'   => 'Januari 2026',
                'sort_date' => '2026-01',
                'template'  => 'Aruna Series',
                'paket'     => 'Standard',
                'rating'    => 4.7,
            ],
            [
                'foto'      => 'porto-11.jpg',
                'pasangan'  => 'Angga & Diya',
                'tanggal'   => 'Desember 2025',
                'sort_date' => '2025-12',
                'template'  => 'Aruna Series',
                'paket'     => 'Standard',
                'rating'    => 4.8,
            ],
            [
                'foto'      => 'porto-12.jpg',
                'pasangan'  => 'Hafidz & Cinta',
                'tanggal'   => 'Desember 2025',
                'sort_date' => '2025-12',
                'template'  => 'Aruna Series',
                'paket'     => 'Standard',
                'rating'    => 4.7,
            ],
            [
                'foto'      => 'porto-13.jpg',
                'pasangan'  => 'Fajar & Novi',
                'tanggal'   => 'Desember 2025',
                'sort_date' => '2025-12',
                'template'  => 'Aruna Series',
                'paket'     => 'Standard',
                'rating'    => 4.7,
            ],
            [
                'foto'      => 'porto-14.jpg',
                'pasangan'  => 'Ayu & Rizal',
                'tanggal'   => 'Januari 2026',
                'sort_date' => '2026-01',
                'template'  => 'Silver Class',
                'paket'     => 'Standard',
                'rating'    => 4.8,
            ],
            [
                'foto'      => 'porto-15.jpg',
                'pasangan'  => 'Ratri & Zami',
                'tanggal'   => 'Januari 2026',
                'sort_date' => '2026-01',
                'template'  => 'Silver Class',
                'paket'     => 'Standard',
                'rating'    => 4.8,
            ],
            [
                'foto'      => 'porto-16.jpg',
                'pasangan'  => 'Hawa & Ferdi',
                'tanggal'   => 'Maret 2026',
                'sort_date' => '2026-03',
                'template'  => 'Serene Glow',
                'paket'     => 'Standard',
                'rating'    => 4.7,
            ],
            [
                'foto'      => 'porto-17.jpg',
                'pasangan'  => 'Bella & Irfan',
                'tanggal'   => 'April 2026',
                'sort_date' => '2026-04',
                'template'  => 'Aura Silver',
                'paket'     => 'Standard',
                'rating'    => 4.8,
            ],
            [
                'foto'      => 'porto-18.jpg',
                'pasangan'  => 'Resi & Ikhsan',
                'tanggal'   => 'Juni 2026',
                'sort_date' => '2026-06',
                'template'  => 'Platinum Lite',
                'paket'     => 'Standard',
                'rating'    => 5,
            ],
            [
                'foto'      => 'porto-19.jpg',
                'pasangan'  => 'Fauzi & Isma',
                'tanggal'   => 'Mei 2026',
                'sort_date' => '2026-05',
                'template'  => 'Serene Glow',
                'paket'     => 'Standard',
                'rating'    => 5,
            ],
        ];

        // Urutkan terbaru ke terlama
        usort($portofolio, function ($a, $b) {
            return strcmp($b['sort_date'], $a['sort_date']);
        });

        return view('portofolio.index', compact('portofolio'));
    }
}
