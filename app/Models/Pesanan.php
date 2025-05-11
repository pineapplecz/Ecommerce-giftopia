<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Pesanan.php
class Pesanan extends Model
{
    // app/Models/Pesanan.php
use HasFactory;
    protected $fillable = ['user_id', 'nama', 'alamat', 'telepon', 'total_harga'];
public function detailPesanan()
{
    return $this->hasMany(PesananItem::class, 'pesanan_id');
}
 public function produk()
    {
        return $this->hasManyThrough(Produk::class, PesananItem::class, 'pesanan_id', 'id', 'id', 'produk_id');
    }
}

