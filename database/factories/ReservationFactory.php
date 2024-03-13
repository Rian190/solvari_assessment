<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{

    public function definition(): array
    {

        $start = now();
        $end = now()->addDay();
        return [
            //
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'start' => $start->format('Y-m-d H:i:s'),
            'end' => $end->format('Y-m-d H:i:s'),
            'comments' => $this->faker->text()

        ];
    }
}
