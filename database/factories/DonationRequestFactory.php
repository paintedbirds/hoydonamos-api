<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Donation;
use App\Models\DonationRequest;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DonationRequestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DonationRequest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $state = ['ACCEPTED', 'REJETCTED', 'PENDING'];

        return [
            'user_id' => User::all()->random()->id,
            'donation_id' => Donation::all()->random()->id,
            'reason' => Str::random(20),
            'state' =>  $state[rand(0,2)],
        ];
    }
}
