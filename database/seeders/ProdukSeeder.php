<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('produks')->insert([
            [
                'nama' => 'Blackforest Cake',
                'deskripsi' => 'Kue blackforest lezat untuk ulang tahun.',
                'harga' => 150000,
                'gambar' => 'blackforest.jpg',
                'kategori_id' => 1
            ],
            [
                'nama' => 'Parcel Buah Premium',
                'deskripsi' => 'Berisi apel, pir, anggur, dan jeruk impor.',
                'harga' => 250000,
                'gambar' => 'parcel_buah.jpg',
                'kategori_id' => 2
            ],
            [
                'nama' => 'Set Cangkir Elegan',
                'deskripsi' => 'Parcel pecah belah berisi set cangkir keramik.',
                'harga' => 200000,
                'gambar' => 'pecah_belah.jpg',
                'kategori_id' => 3
            ],
            [
                'nama' => 'Snack Box Komplit',
                'deskripsi' => 'Parcel makanan ringan manis dan asin.',
                'harga' => 180000,
                'gambar' => 'snack_box.jpg',
                'kategori_id' => 4
            ],
            [
                'nama' => 'Healthy Gift Pack',
                'deskripsi' => 'Berisi madu, vitamin, dan makanan sehat.',
                'harga' => 220000,
                'gambar' => 'kesehatan.jpg',
                'kategori_id' => 5
            ],
            [
                'nama' => 'Hampers Lebaran Premium',
                'deskripsi' => 'Isi kue kering, sirup, dan dekorasi cantik.',
                'harga' => 300000,
                'gambar' => 'hampers.jpg',
                'kategori_id' => 6
            ],
            [
                'nama' => 'Gelas Custom Nama',
                'deskripsi' => 'Hadiah personal dengan nama penerima.',
                'harga' => 120000,
                'gambar' => 'personal_gift.jpg',
                'kategori_id' => 7
            ],
            [
                'nama' => 'Baby Born Gift Box',
                'deskripsi' => 'Isi popok, selimut bayi, dan boneka lucu.',
                'harga' => 275000,
                'gambar' => 'baby_born.jpg',
                'kategori_id' => 8
            ],
            [
                'nama' => 'Buket Bunga Mawar',
                'deskripsi' => 'Buket 12 mawar merah dengan hiasan rapi.',
                'harga' => 180000,
                'gambar' => 'mawar.jpg',
                'kategori_id' => 9
            ],
            [
                'nama' => 'Box Surprise Ulang Tahun',
                'deskripsi' => 'Kado surprise lengkap dengan balon dan snack.',
                'harga' => 320000,
                'gambar' => 'birthday_box.jpg',
                'kategori_id' => 10
            ],
        ]);
    }
}
