<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesanan_items', function (Blueprint $table) {
            $table->id();  // ID sebagai primary key
            $table->foreignId('pesanan_id')->constrained('pesanans')->onDelete('cascade'); // Relasi ke tabel pesanans
            $table->foreignId('produk_id')->constrained('produks')->onDelete('cascade'); // Relasi ke tabel produks
            $table->integer('jumlah');  // Jumlah produk
            $table->decimal('harga', 10, 2);  // Harga satuan produk
            $table->timestamps();  // Timestamps (created_at, updated_at)
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanan_items');  // Menghapus tabel jika migrasi dibatalkan
    }
};
