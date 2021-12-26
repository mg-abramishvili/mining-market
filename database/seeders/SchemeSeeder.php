<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SchemeSeeder extends Seeder
{
    public function run()
    {
        DB::table('schemes')->insert([
            [
                'id' => 1,
                'name' => 'Заявка',
                'text' => 'Вы оставляете заявку, мы подбираем оборудование под ваш бюджет.',
            ],
            [
                'id' => 2,
                'name' => 'Договор',
                'text' => 'Подписываем договор, вы производите оплату.',
            ],
            [
                'id' => 3,
                'name' => 'Сборка фермы',
                'text' => 'Сборка вашей майнинг-фермы в течение 5-7 дней.',
            ],
            [
                'id' => 4,
                'name' => 'Доставка и обучение',
                'text' => 'Доставляем вам готовую ферму, обучаем как пользоваться.',
            ],
        ]);
    }
}