<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Commission;
use App\Models\CommissionMember;

class CommissionMemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CommissionMember::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'commission_id' => Commission::factory(),
            'user_id' => User::factory(),
            'role' => $this->faker->word(),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
        ];
    }
}
