<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdvantageSeeder extends Seeder
{
    public function run()
    {
        DB::table('advantages')->insert([
            [
                'id' => 1,
                'text' => 'Больше 500 довольных клиентов',
            ],
            [
                'id' => 2,
                'text' => 'Больше 500 довольных клиентов',
            ],
            [
                'id' => 3,
                'text' => 'Больше 500 довольных клиентов',
            ],
        ]);
    }
}