<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class createseedersproduct extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            Product::create([
                'product_name' => 'Stroberi',
                'img' => 'stroberi.jpg',
                'price' => 24000,
                'stok' => 24,
                'status' => 'aktif',
            ]);
            Product::create([
                'product_name' => 'Anggur',
                'img' => 'anggur.jpg',
                'price' => 49000,
                'stok' => 20,
                'status' => 'aktif',
            ]);
            Product::create([
                'product_name' => 'Lemon',
                'img' => 'lemon.jpg',
                'price' => 45000,
                'stok' => 10,
                'status' => 'aktif',
            ]);
            Product::create([
                'product_name' => 'Kiwi',
                'img' => 'kiwi.jpg',
                'price' => 90000,
                'stok' => 2,
                'status' => 'non-aktif',
            ]);
            Product::create([
                'product_name' => 'Apel Hijau',
                'img' => 'apelhijau.jpg',
                'price' => 40000,
                'stok' => 30,
                'status' => 'aktif',
            ]);
            Product::create([
                'product_name' => 'Raspberry',
                'img' => 'raspberry.jpg',
                'price' => 160000,
                'stok' => 0,
                'status' => 'aktif',
            ]);
        });
    }
}
