<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Club;
use App\Models\Payment;
use App\Models\User;

class PaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'club_id' => Club::factory(),
            'amount' => $this->faker->randomFloat(2, 0, 99999999.99),
            'payment_date' => $this->faker->date(),
            'payment_type' => $this->faker->randomElement(["Annual","One-time"]),
            'payment_provider_id' => $this->faker->text(),
            'status' => $this->faker->randomElement(["Pending",""]),
        ];
    }
}
