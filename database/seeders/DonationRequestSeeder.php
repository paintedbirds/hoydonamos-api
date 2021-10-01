<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DonationRequest;

class DonationRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DonationRequest::factory()
        ->count(10)
        ->create();
    }
}
