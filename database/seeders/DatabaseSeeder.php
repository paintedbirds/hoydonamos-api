<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (!App::environment('production')) {
            $this->call([
                UserSeeder::class,
                DonationSeeder::class,
                DonationRequestSeeder::class,
                PetitionSeeder::class,
            ]);  
        };
    }
}