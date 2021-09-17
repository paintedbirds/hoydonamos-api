<?php

namespace Database\Factories;

use App\Models\Donation;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Str;


class DonationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Donation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $state = ['PENDING', 'PUBLISHED', 'REJETCTED'];

        return [
            'user_id' => User::all()->random()->id,
            'name' => Str::random(20),
            'description' => Str::random(20),
            'image' => 'https://source.unsplash.com/random/1200x800',
            'state' =>  $state[rand(0,2)],
        ];
    }
}
