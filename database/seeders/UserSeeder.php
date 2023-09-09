<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marketer = User::create([
            'name' => 'Marketer',
            'email' => 'marketer@gmail.id',
            'password' => bcrypt('password')
        ]);

        $supplier = User::create([
            'name' => 'Supplier',
            'email' => 'suplier@gmail.id',
            'password' => bcrypt('password')
        ]);

        $distributor = User::create([
            'name' => 'Distributor',
            'email' => 'distributor@gmail.id',
            'password' => bcrypt('password')
        ]);
    }
}
