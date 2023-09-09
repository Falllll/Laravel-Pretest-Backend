<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mandi = Product::create([
            'nama' => 'Sabun mandi',
            'toko_id' => '1',
            'user_id' => '1',
            'qty' => 10,
            'price' => 10000
        ]);
        $sampo = Product::create([
            'nama' => 'Sampo',
            'toko_id' => '3',
            'user_id' => '3',
            'qty' => 30,
            'price' => 2000
        ]);
        $cuci = Product::create([
            'nama' => 'Sabun cuci',
            'toko_id' => '2',
            'user_id' => '2',
            'qty' => 20,
            'price' => 5000
        ]);
    }
}
