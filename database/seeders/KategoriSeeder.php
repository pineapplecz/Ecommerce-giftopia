<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kategoris')->insert([
            ['nama' => 'Cake'],
            ['nama' => 'Parcel Buah'],
            ['nama' => 'Parcel Pecah Belah'],
            ['nama' => 'Parcel Makanan'],
            ['nama' => 'Parcel Kesehatan'],
            ['nama' => 'Hampers'],
            ['nama' => 'Personal Gift'],
            ['nama' => 'Baby Born Gift'],
            ['nama' => 'Bunga'],
            ['nama' => 'Hadiah Ulang Tahun'],
        ]);
    }
}
