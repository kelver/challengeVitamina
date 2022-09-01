<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Product::factory(100)->create();
        \App\Models\Client::factory(100)->create();
        \App\Models\Oportunity::factory(100)->create();
    }
}
