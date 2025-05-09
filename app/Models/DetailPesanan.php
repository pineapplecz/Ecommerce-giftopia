<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model
{
    use HasFactory;

    // Menentukan kolom yang dapat diisi
    protected $fillable = [
        'pesanan_id',
        'produk_id',
        'jumlah',
        'harga'
    ];

    // Relasi ke tabel Pesanan
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }

    // Relasi ke tabel Produk
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
