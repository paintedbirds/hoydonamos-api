<?php

namespace Database\Factories;

use App\Models\Petition;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Str;

class PetitionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Petition::class;

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
            'subject' => Str::random(10),
            'description' => Str::random(50),
            'state' =>  $state[rand(0,2)],
        ];
    }
}
