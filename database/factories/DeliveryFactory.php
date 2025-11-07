<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Delivery>
 */
class DeliveryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        'gender' => fake()->name(),
        'birth_date' => fake()->name(),
        'vehicle_type' => fake()->name(),
        'dni_document_front' => fake()->name(),
        'dni_document_back' => fake()->name(),
        'driving_license' => fake()->name(),
        'transit_license' => fake()->name(),
        'mandatory_insurance' => fake()->name(),
        'profile_photo' => fake()->name(),
        ];
    }
}
