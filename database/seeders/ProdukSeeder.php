<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('produks')->insert([
            // Cake
            ['nama' => 'Chocolate Fudge Cake', 'kategori_id' => 1, 'harga' => 150000],
            ['nama' => 'Red Velvet Cake', 'kategori_id' => 1, 'harga' => 160000],
            ['nama' => 'Cheesecake Strawberry', 'kategori_id' => 1, 'harga' => 170000],
            ['nama' => 'Tiramisu Cake', 'kategori_id' => 1, 'harga' => 180000],
            ['nama' => 'Blackforest Cake', 'kategori_id' => 1, 'harga' => 140000],

            // Parcel Buah
            ['nama' => 'Parcel Buah Premium', 'kategori_id' => 2, 'harga' => 200000],
            ['nama' => 'Parcel Apel & Jeruk', 'kategori_id' => 2, 'harga' => 180000],
            ['nama' => 'Parcel Buah Tropis', 'kategori_id' => 2, 'harga' => 190000],
            ['nama' => 'Mini Fruit Basket', 'kategori_id' => 2, 'harga' => 160000],
            ['nama' => 'Fruit Medley Gift', 'kategori_id' => 2, 'harga' => 210000],

            // Parcel Pecah Belah
            ['nama' => 'Set Gelas Kristal', 'kategori_id' => 3, 'harga' => 250000],
            ['nama' => 'Parcel Piring Cantik', 'kategori_id' => 3, 'harga' => 270000],
            ['nama' => 'Mug Set Eksklusif', 'kategori_id' => 3, 'harga' => 230000],
            ['nama' => 'Tea Set Keramik', 'kategori_id' => 3, 'harga' => 290000],
            ['nama' => 'Luxury Dining Set', 'kategori_id' => 3, 'harga' => 300000],

            // Parcel Makanan
            ['nama' => 'Snack Box Premium', 'kategori_id' => 4, 'harga' => 180000],
            ['nama' => 'Kue Kering Lebaran', 'kategori_id' => 4, 'harga' => 160000],
            ['nama' => 'Parcel Makanan Ringan', 'kategori_id' => 4, 'harga' => 150000],
            ['nama' => 'Paket Makanan Tradisional', 'kategori_id' => 4, 'harga' => 170000],
            ['nama' => 'Hampers Makanan Komplit', 'kategori_id' => 4, 'harga' => 200000],

            // Parcel Kesehatan
            ['nama' => 'Vitamin C Gift Pack', 'kategori_id' => 5, 'harga' => 120000],
            ['nama' => 'Paket Herbal Alami', 'kategori_id' => 5, 'harga' => 150000],
            ['nama' => 'Parcel Imun Booster', 'kategori_id' => 5, 'harga' => 180000],
            ['nama' => 'Healthy Hampers', 'kategori_id' => 5, 'harga' => 170000],
            ['nama' => 'Kit Sehat Keluarga', 'kategori_id' => 5, 'harga' => 200000],

            // Hampers
            ['nama' => 'Eid Hampers', 'kategori_id' => 6, 'harga' => 250000],
            ['nama' => 'Luxury Hampers Box', 'kategori_id' => 6, 'harga' => 300000],
            ['nama' => 'Christmas Hampers', 'kategori_id' => 6, 'harga' => 280000],
            ['nama' => 'New Year Hampers', 'kategori_id' => 6, 'harga' => 260000],
            ['nama' => 'Custom Hampers Eksklusif', 'kategori_id' => 6, 'harga' => 350000],

            // Personal Gift
            ['nama' => 'Custom Mug Gift', 'kategori_id' => 7, 'harga' => 100000],
            ['nama' => 'Mini Frame Foto', 'kategori_id' => 7, 'harga' => 90000],
            ['nama' => 'Keychain Nama', 'kategori_id' => 7, 'harga' => 80000],
            ['nama' => 'Gift Set Notebook', 'kategori_id' => 7, 'harga' => 120000],
            ['nama' => 'Personalized Tumbler', 'kategori_id' => 7, 'harga' => 110000],

            // Baby Born Gift
            ['nama' => 'Set Pakaian Bayi', 'kategori_id' => 8, 'harga' => 200000],
            ['nama' => 'Boneka Rattle', 'kategori_id' => 8, 'harga' => 130000],
            ['nama' => 'Baby Blanket Gift', 'kategori_id' => 8, 'harga' => 150000],
            ['nama' => 'Baby Care Package', 'kategori_id' => 8, 'harga' => 180000],
            ['nama' => 'Gift Box Bayi Baru Lahir', 'kategori_id' => 8, 'harga' => 220000],

            // Bunga
            ['nama' => 'Bouquet Mawar Merah', 'kategori_id' => 9, 'harga' => 120000],
            ['nama' => 'Hand Bouquet Lily', 'kategori_id' => 9, 'harga' => 130000],
            ['nama' => 'Buket Bunga Campur', 'kategori_id' => 9, 'harga' => 140000],
            ['nama' => 'Flower Box Elegan', 'kategori_id' => 9, 'harga' => 150000],
            ['nama' => 'Blooming Basket', 'kategori_id' => 9, 'harga' => 160000],

            // Hadiah Ulang Tahun
            ['nama' => 'Gift Box Ulang Tahun', 'kategori_id' => 10, 'harga' => 170000],
            ['nama' => 'Birthday Cake Special', 'kategori_id' => 10, 'harga' => 160000],
            ['nama' => 'Buket Ulang Tahun', 'kategori_id' => 10, 'harga' => 150000],
            ['nama' => 'Mini Parcel Ulang Tahun', 'kategori_id' => 10, 'harga' => 140000],
            ['nama' => 'Kado Unik Ulang Tahun', 'kategori_id' => 10, 'harga' => 180000],
        ]);
    }
}
