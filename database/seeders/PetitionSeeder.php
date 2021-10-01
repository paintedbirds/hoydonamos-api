<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Petition;

class PetitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Petition::factory()
        ->count(10)
        ->create();
    }
}
