<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Commission;
use App\Models\Club;
use App\Models\Meeting;

class MeetingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Meeting::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'club_id' => Club::factory(),
            'commission_id' => Commission::factory(),
            'meeting_date' => $this->faker->dateTime(),
            'editable_until' => $this->faker->dateTime(),
            'meeting_name' => $this->faker->word(),
            'meeting_description' => $this->faker->text(),
            'location' => $this->faker->word(),
            'status' => $this->faker->randomElement(["Draft","Published"]),
            'booking_method' => $this->faker->randomElement(["Internal","External"]),
            'booking_instructions' => $this->faker->text(),
        ];
    }
}
