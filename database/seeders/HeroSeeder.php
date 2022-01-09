<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class HeroSeeder extends Seeder
{
    public function run()
    {
        DB::table('heroes')->insert([
            'id' => 1,
            'title' => 'Майнинг-фермы под ключ',
            'list_item_1' => 'Доставим и соберем за 10 дней',
            'list_item_2' => 'Подберем ферму под ваш бюджет',
            'list_item_3' => 'После установки администрирование',
        ]);
    }
}