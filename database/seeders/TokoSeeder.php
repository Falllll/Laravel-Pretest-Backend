<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Toko;

class TokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sembako = Toko::create([
            'nama' => 'Toko sembako',
            'user_id' => '1',
            'alamat' => 'Sleman'
        ]);
        $internet = Toko::create([
            'nama' => 'Toko Internet',
            'user_id' => '3',
            'alamat' => 'Bandung'
        ]);
        $kelontong = Toko::create([
            'nama' => 'Toko Kelontong',
            'user_id' => '2',
            'alamat' => 'Yogyakarta'
        ]);
    }
}
