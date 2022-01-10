<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            [
                'id' => 1,
                'name' => 'Майнинг-ферма на видеокартах NVIDIA GeForce RTX 3060Ti',
                'gpu' => 'nVIDIA GeForce 3060Ti',
                'gpu_amount' => 2,
                'price' => 243749,
                'dohodnost' => 12117,
                'gallery' => '["\/img\/3060ti_2\/01.jpg","\/img\/3060ti_2\/02.jpg","\/img\/3060ti_2\/03.jpg"]',
            ],
            [
                'id' => 2,
                'name' => 'Майнинг-ферма на видеокартах NVIDIA GeForce RTX 3060Ti',
                'gpu' => 'nVIDIA GeForce 3060Ti',
                'gpu_amount' => 4,
                'price' => 437799,
                'dohodnost' => 24237,
                'gallery' => '["\/img\/3060ti_4\/01.jpg","\/img\/3060ti_4\/02.jpg","\/img\/3060ti_4\/03.jpg","\/img\/3060ti_4\/04.jpg"]',
            ],
            [
                'id' => 3,
                'name' => 'Майнинг-ферма на видеокартах NVIDIA GeForce RTX 3060Ti',
                'gpu' => 'nVIDIA GeForce 3060Ti',
                'gpu_amount' => 6,
                'price' => 627799,
                'dohodnost' => 36345,
                'gallery' => '["\/img\/3060ti_6\/01.jpg","\/img\/3060ti_6\/02.jpg","\/img\/3060ti_6\/03.jpg","\/img\/3060ti_6\/04.jpg","\/img\/3060ti_6\/05.jpg"]',
            ]
        ]);
    }
}