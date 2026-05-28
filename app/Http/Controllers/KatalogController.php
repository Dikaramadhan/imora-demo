<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KatalogController extends Controller
{
    private function getCatalogData(): array
    {
        return [
            'platinum-lite' => [
                'nama' => 'Platinum Lite (Standard)',
                'kategori' => 'pernikahan',
                'harga' => 120000,
                'hargaStr' => 'Rp 120.000',
                'deskripsi' => 'Desain bunga klasik dengan sentuhan modern yang elegan untuk pernikahan impianmu.',
                'fitur' => 16,
                'populer' => true,
                'seed' => 'inv-platinum-lite',
                'preview_url' => route('template.standard.platinum.lite'),
                'fitur_list' => [
                    'Link undangan personal',
                    'Musik latar pilihan',
                    'RSVP online',
                    'Galeri foto',
                    'Countdown timer',
                    'Google Maps',
                    'Ucapan & doa tamu',
                    '4x revisi gratis',
                    'Support WhatsApp',
                ],
            ],
            'serene-glow' => [
                'nama' => 'Serene Glow (Standard)',
                'kategori' => 'pernikahan',
                'harga' => 120000,
                'hargaStr' => 'Rp 120.000',
                'deskripsi' => 'Nuansa mewah dengan warna warm yang memukau untuk hari bahagiamu.',
                'fitur' => 16,
                'populer' => true,
                'seed' => 'inv-serene-glow',
                'preview_url' => route('template.standard.serene.glow'),
                'fitur_list' => [
                    'Link undangan personal',
                    'Musik latar pilihan',
                    'RSVP online',
                    'Galeri foto',
                    'Countdown timer',
                    'Google Maps',
                    'Ucapan & doa tamu',
                    '4x revisi gratis',
                    'Support WhatsApp',
                ],
            ],
            'aura-silver' => [
                'nama' => 'Aura Silver (Standard)',
                'kategori' => 'pernikahan',
                'harga' => 120000,
                'hargaStr' => 'Rp 120.000',
                'deskripsi' => 'Clean dan minimalis, sempurna untuk pasangan yang menyukai kesederhanaan.',
                'fitur' => 16,
                'populer' => true,
                'seed' => 'inv-aura-silver',
                'preview_url' => route('template.standard.aura.silver'),
                'fitur_list' => [
                    'Link undangan personal',
                    'Musik latar pilihan',
                    'RSVP online',
                    'Galeri foto',
                    'Countdown timer',
                    'Google Maps',
                    'Ucapan & doa tamu',
                    '4x revisi gratis',
                    'Support WhatsApp',
                ],
            ],
            'serenity-luxe' => [
                'nama' => 'Serenity Luxe (Standard)',
                'kategori' => 'pernikahan',
                'harga' => 130000,
                'hargaStr' => 'Rp 130.000',
                'deskripsi' => 'Kemewahan ala kerajaan dengan aksen dan detail yang sangat premium.',
                'fitur' => 17,
                'populer' => true,
                'seed' => 'inv-serenity-luxe',
                'preview_url' => route('template.standard.serenity.luxe'),
                'fitur_list' => [
                    'Link undangan personal',
                    'Musik latar pilihan',
                    'RSVP online',
                    'Galeri foto',
                    'Countdown timer',
                    'Google Maps',
                    'Ucapan & doa tamu',
                    '5x revisi gratis',
                    'Support WhatsApp',
                    'Amplop digital',
                ],
            ],
            'platinum-minimal' => [
                'nama' => 'Platinum Minimal (Basic)',
                'kategori' => 'pernikahan',
                'harga' => 75000,
                'hargaStr' => '59.000',
                'deskripsi' => 'Tampilan minimalis bersih dengan tipografi elegan.',
                'fitur' => 9,
                'populer' => false,
                'seed' => 'inv-platinum-minimal',
                'preview_url' => route('template.basic.platinum.minimal'),
                'fitur_list' => [
                    'Link undangan personal',
                    'Countdown timer',
                    'Google Maps',
                    'Ucapan & doa tamu',
                    '2x revisi gratis',
                    'Support WhatsApp',
                ],
            ],
            'stellar-grace' => [
                'nama' => 'Stellar Grace (Basic)',
                'kategori' => 'pernikahan',
                'harga' => 75000,
                'hargaStr' => '59.000',
                'deskripsi' => 'Sentuhan bintang dan warna lembut yang romantis.',
                'fitur' => 9,
                'populer' => false,
                'seed' => 'inv-stellar-grace',
                'preview_url' => route('template.basic.stellar.grace'),
                'fitur_list' => [
                    'Link undangan personal',
                    'Countdown timer',
                    'Google Maps',
                    'Ucapan & doa tamu',
                    '2x revisi gratis',
                    'Support WhatsApp',
                ],
            ],
            'core-series' => [
                'nama' => 'Core Series (Basic)',
                'kategori' => 'pernikahan',
                'harga' => 75000,
                'hargaStr' => '59.000',
                'deskripsi' => 'Desain serbaguna dan modern, mudah dibaca di semua ukuran layar.',
                'fitur' => 9,
                'populer' => false,
                'seed' => 'inv-core-series',
                'preview_url' => route('template.basic.core.series'),
                'fitur_list' => [
                    'Link undangan personal',
                    'Countdown timer',
                    'Google Maps',
                    'Ucapan & doa tamu',
                    '2x revisi gratis',
                    'Support WhatsApp',
                ],
            ],
            'moderna-lite' => [
                'nama' => 'Moderna Lite (Basic)',
                'kategori' => 'pernikahan',
                'harga' => 75000,
                'hargaStr' => '59.000',
                'deskripsi' => 'Gaya kontemporer dengan layout yang rapi.',
                'fitur' => 9,
                'populer' => false,
                'seed' => 'inv-moderna-lite',
                'preview_url' => route('template.basic.moderna.lite'),
                'fitur_list' => [
                    'Link undangan personal',
                    'Countdown timer',
                    'Google Maps',
                    'Ucapan & doa tamu',
                    '2x revisi gratis',
                    'Support WhatsApp',
                ],
            ],
        ];
    }

    public function index()
    {
        return view('katalog.index');
    }

    public function detail(string $slug)
    {
        $catalog = $this->getCatalogData();

        if (!isset($catalog[$slug])) {
            abort(404);
        }

        return view('katalog.detail', [
            'template' => $catalog[$slug],
        ]);
    }
}
