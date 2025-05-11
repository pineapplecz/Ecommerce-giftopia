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
    $table->unsignedBigInteger('user_id'); // Menambahkan kolom user_id
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Membuat relasi dengan tabel users
   $table->string('nama_penerima');
$table->text('alamat_penerima');
$table->string('no_hp_penerima');
    $table->decimal('total_harga', 10, 2);
    $table->timestamps();
});

    }

    public function down()
    {
       Schema::table('pesanans', function (Blueprint $table) {
        $table->dropForeign(['user_id']);
        $table->dropColumn('user_id');
    }); 
}
};
