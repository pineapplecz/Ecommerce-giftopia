<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kategoris')->insert([
            ['id' => 1, 'nama' => 'Cake'],
            ['id' => 2, 'nama' => 'Parcel Buah'],
            ['id' => 3, 'nama' => 'Parcel Pecah Belah'],
            ['id' => 4, 'nama' => 'Parcel Makanan'],
            ['id' => 5, 'nama' => 'Parcel Kesehatan'],
            ['id' => 6, 'nama' => 'Hampers'],
            ['id' => 7, 'nama' => 'Personal Gift'],
            ['id' => 8, 'nama' => 'Baby Born Gift'],
            ['id' => 9, 'nama' => 'Bunga'],
            ['id' => 10, 'nama' => 'Hadiah Ulang Tahun'],
        ]);
    }
}
