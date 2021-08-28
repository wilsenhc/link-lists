<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LandingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Listings\Listing::factory(100)->create();
    }
}
