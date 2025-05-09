<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    // Menentukan tabel (optional, hanya jika nama tabel tidak sesuai konvensi Laravel)
    protected $table = 'keranjangs'; 

    // Menambahkan 'user_id' pada fillable untuk mass assignment
    protected $fillable = ['user_id', 'produk_id', 'jumlah'];  // Tambahkan 'user_id' di sini

    // Relasi ke model Produk
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}

