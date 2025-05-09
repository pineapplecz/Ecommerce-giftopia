<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'total_harga', 
        'status', 
        'alamat_pengiriman'
    ];

    // Relasi ke user (pembeli)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke detail item dalam pesanan
    public function detailPesanan()
    {
        return $this->hasMany(DetailPesanan::class);
    }
}
