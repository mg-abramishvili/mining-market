<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ReviewSeeder extends Seeder
{
    public function run()
    {
        DB::table('reviews')->insert([
            'id' => 1,
            'photo' => '/img/1.jpg',
            'screenshot' => '/img/006.jpg',
        ]);
    }
}