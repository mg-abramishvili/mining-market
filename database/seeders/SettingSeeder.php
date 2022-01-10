<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SettingSeeder extends Seeder
{
    public function run()
    {
        DB::table('settings')->insert([
            'id' => 1,
            'tel' => '+7 999 123-45-67',
            'email' => '1@1.net',
            'email_for_notifications' => '1@1.net',
            'address' => 'г. Уфа, ул. Уличная, 1/1, офис 1',
            'logo' => '/img/logo.svg',
            'vk' => 'https://www.youtube.com/channel/UC52vd2JAxC8Nn-G8PYjVv5w/videos',
            'youtube' => 'https://www.youtube.com/channel/UC52vd2JAxC8Nn-G8PYjVv5w/videos',
            'seo_title' => 'Купить майнинг-ферму в Уфе - Mining Market',
            'seo_description' => 'Купить майнинг-ферму в Уфе - Mining Market',
        ]);
    }
}