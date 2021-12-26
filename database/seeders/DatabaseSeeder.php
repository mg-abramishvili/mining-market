<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            SettingSeeder::class,
            AdvantageSeeder::class,
            SchemeSeeder::class,
            ReviewSeeder::class,
        ]);
    }
}