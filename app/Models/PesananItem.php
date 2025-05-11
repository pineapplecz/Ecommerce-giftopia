<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananItem extends Model
{
    use HasFactory;

    protected $fillable = ['pesanan_id', 'produk_id', 'jumlah', 'harga_satuan'];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
     public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id');
    }
}
