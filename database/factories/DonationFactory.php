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
        return [
            'user_id' => User::all()->random()->id,
            'name' => Str::random(20),
            'description' => Str::random(20),
            'image' => 'http://127.0.0.1:8000/storage/donations/7BWYWHfhZyKQGEXVCmLSLEiMgmfriJzWoubhhQ5C.png',
            //state
        ];
    }
}
