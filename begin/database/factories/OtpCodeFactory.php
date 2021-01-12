<?php

namespace Database\Factories;

use App\Models\OtpCode;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class OtpCodeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OtpCode::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $current = Carbon::now();

        return [
            'user_id' => $this->faker->uuid,
            'otp_code' => $this->faker->randomNumber(6),
            'valid_until' => $current->addMinute(),
        ];
    }
}
