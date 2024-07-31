<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('users')->insert([
           [ 'name' => 'Petugas Khoirul',
            'password' => bcrypt('123123'),
            'email' => 'petugas@gmail.com',
            'role' => 'Petugas'],
            [
                'name' => 'Pelanggan George',
                'password' => bcrypt('123123'),
                'email' => 'pelanggan@gmail.com',
                'role' => 'Pelanggan'
            ]
        ]);
        DB::table('menu')->insert([
            ['name' => 'Cuci Basah',
            'satuan' => 'Per Kilo',
            'price' => 20000]
            ,[
                'name' => 'Cuci Kering',
                'satuan' => 'Per Kilo',
                'price' => 25000
            ],
            [
                'name' => 'Cuci & Setrika',
                'satuan' => 'Per Baju',
                'price' => 23000
            ]
        ]);

        DB::table('status')->insert([
            [
                'name' => 'Pending'
            ],[
                'name' => 'Dikerjakan',
            ],[
                'name' => 'Selesai',
            ]
        ]);
    }
}
