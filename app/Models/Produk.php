<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks'; 
    protected $fillable = ['nama', 'harga', 'kategori_id', 'deskripsi', 'gambar'];  // Use 'gambar' here


    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
    // Produk.php
public function pesananItems()
{
    return $this->hasMany(PesananItem::class);
}

}
