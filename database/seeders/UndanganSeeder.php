<?php

namespace Database\Seeders;

use App\Models\Undangan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UndanganSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama'       => 'Elegant Ivory',
                'kategori'   => 'pernikahan',
                'harga'      => 150000,
                'deskripsi'  => 'Desain mewah dengan sentuhan ivory dan gold foil. Cocok untuk pernikahan bergaya klasik dan elegan. Dilengkapi animasi bunga jatuh dan musik latar.',
                'fitur'      => ['Animasi Opening', 'Galeri Foto', 'Maps Lokasi', 'Musik Latar', 'Countdown Timer', 'UCapan & Hadiah Digital', 'RSVP Form'],
                'thumbnail'  => 'https://picsum.photos/seed/imora-elegant-ivory/600/800',
                'is_populer' => true,
            ],
            [
                'nama'       => 'Garden Bloom',
                'kategori'   => 'pernikahan',
                'harga'      => 180000,
                'deskripsi'  => 'Tema garden penuh bunga segar dengan nuansa hijau dan pastel. Sempurna untuk outdoor wedding atau garden party.',
                'fitur'      => ['Animasi Petal Jatuh', 'Galeri Foto Grid', 'Maps Lokasi', 'Musik Latar', 'Countdown Timer', 'UCapan & Hadiah Digital', 'RSVP Form', 'Video Cinematic'],
                'thumbnail'  => 'https://picsum.photos/seed/imora-garden-bloom/600/800',
                'is_populer' => true,
            ],
            [
                'nama'       => 'Royal Navy',
                'kategori'   => 'pernikahan',
                'harga'      => 200000,
                'deskripsi'  => 'Desain premium dengan warna navy dan emas. Menampilkan efek partikel dan transisi halus yang memberikan kesan mewah.',
                'fitur'      => ['Efek Partikel', 'Galeri Foto Mosaic', 'Maps Lokasi', 'Musik Latar', 'Countdown Timer', 'UCapan & Hadiah Digital', 'RSVP Form', 'Video Cinematic', 'Love Story Timeline'],
                'thumbnail'  => 'https://picsum.photos/seed/imora-royal-navy/600/800',
                'is_populer' => true,
            ],
            [
                'nama'       => 'Minimalist White',
                'kategori'   => 'pernikahan',
                'harga'      => 120000,
                'deskripsi'  => 'Clean, simpel, dan modern. Desain minimalis putih yang fokus pada tipografi dan whitespace. Pilihan tepat untuk pasangan yang menyukai kesan simple.',
                'fitur'      => ['Galeri Foto', 'Maps Lokasi', 'Musik Latar', 'Countdown Timer', 'UCapan Digital', 'RSVP Form'],
                'thumbnail'  => 'https://picsum.photos/seed/imora-minimal-white/600/800',
                'is_populer' => false,
            ],
            [
                'nama'       => 'Sunset Warm',
                'kategori'   => 'pernikahan',
                'harga'      => 175000,
                'deskripsi'  => 'Nuansa sunset yang hangat dengan gradasi oranye hingga pink. Ideal untuk pernikahan sore atau golden hour celebration.',
                'fitur'      => ['Animasi Sky Gradient', 'Galeri Foto', 'Maps Lokasi', 'Musik Latar', 'Countdown Timer', 'UCapan & Hadiah Digital', 'RSVP Form'],
                'thumbnail'  => 'https://picsum.photos/seed/imora-sunset-warm/600/800',
                'is_populer' => false,
            ],
            [
                'nama'       => 'Little Prince',
                'kategori'   => 'khitanan',
                'harga'      => 100000,
                'deskripsi'  => 'Tema kartun Little Prince yang lucu dan menarik untuk anak-anak. Warna biru langit dengan elemen bintang dan planet.',
                'fitur'      => ['Animasi Karakter', 'Galeri Foto', 'Maps Lokasi', 'Musik Anak', 'Countdown Timer', 'UCapan Digital'],
                'thumbnail'  => 'https://picsum.photos/seed/imora-little-prince/600/800',
                'is_populer' => true,
            ],
            [
                'nama'       => 'Jungle Safari',
                'kategori'   => 'khitanan',
                'harga'      => 110000,
                'deskripsi'  => 'Tema safari dengan hewan-hewan lucu. Warna hijau dan coklat earth tone yang seru untuk anak laki-laki.',
                'fitur'      => ['Animasi Hewan', 'Galeri Foto', 'Maps Lokasi', 'Musik Anak', 'Countdown Timer', 'UCapan Digital'],
                'thumbnail'  => 'https://picsum.photos/seed/imora-jungle-safari/600/800',
                'is_populer' => false,
            ],
            [
                'nama'       => 'Pastel Dream',
                'kategori'   => 'ulang_tahun',
                'harga'      => 90000,
                'deskripsi'  => 'Nuansa pastel lembut dengan balon dan confetti. Cocok untuk perayaan ulang tahun anak maupun dewasa.',
                'fitur'      => ['Animasi Confetti', 'Galeri Foto', 'Maps Lokasi', 'Musik', 'Countdown Timer', 'UCapan Digital', 'Wish Board'],
                'thumbnail'  => 'https://picsum.photos/seed/imora-pastel-dream/600/800',
                'is_populer' => true,
            ],
            [
                'nama'       => 'Sport Champion',
                'kategori'   => 'ulang_tahun',
                'harga'      => 95000,
                'deskripsi'  => 'Tema olahraga dengan elemen bola, medali, dan trofi. Sangat cocok untuk anak laki-laki yang aktif dan suka olahraga.',
                'fitur'      => ['Animasi Medali', 'Galeri Foto', 'Maps Lokasi', 'Musik', 'Countdown Timer', 'UCapan Digital'],
                'thumbnail'  => 'https://picsum.photos/seed/imora-sport-champion/600/800',
                'is_populer' => false,
            ],
            [
                'nama'       => 'Graduation Blue',
                'kategori'   => 'wisuda',
                'harga'      => 130000,
                'deskripsi'  => 'Desain formal dengan tema wisuda. Warna biru navy dan gold yang membanggakan. Dilengkapi section pencapaian dan perjalanan studi.',
                'fitur'      => ['Animasi Topi Toss', 'Galeri Foto', 'Maps Lokasi', 'Musik', 'Countdown Timer', 'UCapan Digital', 'Timeline Prestasi'],
                'thumbnail'  => 'https://picsum.photos/seed/imora-graduation-blue/600/800',
                'is_populer' => false,
            ],
            [
                'nama'       => 'Aesthetic Cream',
                'kategori'   => 'pernikahan',
                'harga'      => 165000,
                'deskripsi'  => 'Nuansa krem aesthetic dengan sentuhan dried flower dan linen texture. Pilihan populer untuk intimate wedding.',
                'fitur'      => ['Animasi Daun Jatuh', 'Galeri Foto Masonry', 'Maps Lokasi', 'Musik Latar', 'Countdown Timer', 'UCapan & Hadiah Digital', 'RSVP Form'],
                'thumbnail'  => 'https://picsum.photos/seed/imora-aesthetic-cream/600/800',
                'is_populer' => false,
            ],
            [
                'nama'       => 'Under The Sea',
                'kategori'   => 'ulang_tahun',
                'harga'      => 105000,
                'deskripsi'  => 'Tema bawah laut dengan ikan-ikan lucu dan gelembung. Warna biru tosca dan aqua yang menyegarkan.',
                'fitur'      => ['Animasi Gelembung', 'Galeri Foto', 'Maps Lokasi', 'Musik', 'Countdown Timer', 'UCapan Digital'],
                'thumbnail'  => 'https://picsum.photos/seed/imora-under-sea/600/800',
                'is_populer' => false,
            ],
            [
                'nama'       => 'Tropical Paradise',
                'kategori'   => 'pernikahan',
                'harga'      => 190000,
                'deskripsi'  => 'Vibe tropical dengan daun monstera, nanas, dan bunga hibiscus. sempurna untuk beach wedding atau destination wedding.',
                'fitur'      => ['Animasi Daun Tropis', 'Galeri Foto', 'Maps Lokasi', 'Musik Latar', 'Countdown Timer', 'UCapan & Hadiah Digital', 'RSVP Form', 'Video Cinematic'],
                'thumbnail'  => 'https://picsum.photos/seed/imora-tropical-paradise/600/800',
                'is_populer' => false,
            ],
            [
                'nama'       => 'Super Hero',
                'kategori'   => 'khitanan',
                'harga'      => 115000,
                'deskripsi'  => 'Tema super hero dengan karakter komik style. Warna merah dan biru yang energetic untuk anak laki-laki.',
                'fitur'      => ['Animasi Komik', 'Galeri Foto', 'Maps Lokasi', 'Musik Anak', 'Countdown Timer', 'UCapan Digital'],
                'thumbnail'  => 'https://picsum.photos/seed/imora-super-hero/600/800',
                'is_populer' => false,
            ],
            [
                'nama'       => 'Fairy Tale Pink',
                'kategori'   => 'ulang_tahun',
                'harga'      => 98000,
                'deskripsi'  => 'Dunia peri dengan warna pink dan ungu muda. Elemen sparkle dan bintang yang menawan untuk anak perempuan.',
                'fitur'      => ['Animasi Sparkle', 'Galeri Foto', 'Maps Lokasi', 'Musik', 'Countdown Timer', 'UCapan Digital', 'Wish Board'],
                'thumbnail'  => 'https://picsum.photos/seed/imora-fairy-pink/600/800',
                'is_populer' => false,
            ],
            [
                'nama'       => 'Dark Luxury',
                'kategori'   => 'pernikahan',
                'harga'      => 250000,
                'deskripsi'  => 'Desain eksklusif dengan background gelap dan aksen gold. Premium tier untuk pernikahan high-end yang menginginkan kesan eksklusif.',
                'fitur'      => ['Efek Partikel Gold', 'Galeri Foto Premium', 'Maps Lokasi', 'Musik Latar', 'Countdown Timer', 'UCapan & Hadiah Digital', 'RSVP Form', 'Video Cinematic', 'Love Story Timeline', 'QR Code Check-in'],
                'thumbnail'  => 'https://picsum.photos/seed/imora-dark-luxury/600/800',
                'is_populer' => true,
            ],
        ];

        foreach ($data as $item) {
            Undangan::create([
                'nama'       => $item['nama'],
                'slug'       => Str::slug($item['nama']),
                'kategori'   => $item['kategori'],
                'harga'      => $item['harga'],
                'deskripsi'  => $item['deskripsi'],
                'fitur'      => $item['fitur'],
                'thumbnail'  => $item['thumbnail'],
                'preview_url' => null,
                'status'     => 'aktif',
                'is_populer' => $item['is_populer'],
            ]);
        }
    }
}
