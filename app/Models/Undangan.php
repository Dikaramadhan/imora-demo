<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Undangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'slug',
        'kategori',
        'harga',
        'deskripsi',
        'fitur',
        'thumbnail',
        'preview_url',
        'status',
        'is_populer',
    ];

    protected $casts = [
        'fitur' => 'array',
        'harga' => 'integer',
        'is_populer' => 'boolean',
    ];

    // Format harga ke Rupiah
    protected function hargaFormatted(): Attribute
    {
        return Attribute::make(
            get: fn() => 'Rp ' . number_format($this->harga, 0, ',', '.'),
        );
    }

    // Scope: hanya yang aktif
    public function scopeAktif($query)
    {
        return $query->where('status', 'aktif');
    }

    // Scope: yang populer
    public function scopePopuler($query)
    {
        return $query->where('is_populer', true);
    }

    // Scope: filter berdasarkan kategori
    public function scopeKategori($query, string $kategori)
    {
        return $query->where('kategori', $kategori);
    }

    // Scope: pencarian
    public function scopeCari($query, string $keyword)
    {
        return $query->where('nama', 'like', "%{$keyword}%")
            ->orWhere('deskripsi', 'like', "%{$keyword}%");
    }
}
