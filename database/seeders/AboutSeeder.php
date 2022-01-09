<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AboutSeeder extends Seeder
{
    public function run()
    {
        DB::table('abouts')->insert([
            'text' => '<p>Компания начала свой путь в мае 2017 года и быстро стала лидером рынка по продаже видеокарт и майнинг-ферм.</p><p>Мы профессионально консультируем наших клиентов - инвесторов в какое оборудование лучше инвестировать и преумножать свой капитал.</p><p>Наша миссия - создать пассивный доход 100 000 клиентам в СНГ и стать компанией номер один в мире по продаже майнинг-оборудования!</p>',
        ]);
    }
}