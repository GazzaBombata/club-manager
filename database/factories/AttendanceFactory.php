<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Attendance;
use App\Models\Meeting;

class AttendanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Attendance::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'meeting_id' => Meeting::factory(),
            'user_id' => User::factory(),
            'payment_id' => Payment::factory(),
            'status' => $this->faker->randomElement(["Invited","Present","Absent","Excused"]),
            'is_compulsory' => $this->faker->boolean(),
        ];
    }
}
