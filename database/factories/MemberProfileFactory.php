<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\MemberProfile;
use App\Models\User;

class MemberProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MemberProfile::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->text(),
            'linkedin_profile_link' => $this->faker->word(),
            'visibility' => $this->faker->randomElement(["Club","Registered","Public"]),
        ];
    }
}
