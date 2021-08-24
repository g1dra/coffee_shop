<?php

namespace Database\Seeders;

use App\Models\Barista;
use App\Models\Coffee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Barista::factory(3)->create();
        Coffee::factory(3)->create();
        Cache::put('index', 1);
    }
}
