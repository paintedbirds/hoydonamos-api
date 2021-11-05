<?php

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
        if (App::environment('production')) {
            $this->call(AdminSeeder::class);
        } else {
            $this->call([
                UserSeeder::class,
                AdminSeeder::class,
                DonationSeeder::class,
                DonationRequestSeeder::class,
                PetitionSeeder::class,
            ]);  
        }

    }
}
