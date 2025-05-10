<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Pesanan.php
class Pesanan extends Model
{
    // app/Models/Pesanan.php

    protected $fillable = ['user_id', 'nama', 'alamat', 'telepon', 'total_harga'];
public function detailPesanan()
{
    return $this->hasMany(DetailPesanan::class);
}
}

