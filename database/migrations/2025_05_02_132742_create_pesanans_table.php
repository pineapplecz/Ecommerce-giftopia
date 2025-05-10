<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
    Schema::create('pesanans', function (Blueprint $table) {
    $table->id();
    // Kolom lainnya, tanpa user_id
    $table->string('nama');
    $table->string('alamat');
    $table->string('telepon');
    $table->decimal('total_harga', 10, 2);
    $table->timestamps();
});

    }

    public function down()
    {
        Schema::dropIfExists('pesanans');
    }
};
