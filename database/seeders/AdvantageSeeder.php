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
                'text' => 'Надежная деловая репутация',
                'icon' => '/img/a1.png',
            ],
            [
                'id' => 2,
                'text' => 'Доступные цены на услуги',
                'icon' => '/img/a2.png',
            ],
            [
                'id' => 3,
                'text' => 'Оперативность выполнения заказов',
                'icon' => '/img/a3.png',
            ],
        ]);
    }
}