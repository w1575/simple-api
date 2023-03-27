<?php

namespace Database\Factories;

use App\Models\Equipment;
use App\Models\EquipmentType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Equipment>
 */
class EquipmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = EquipmentType::firstOrFail();

        return [
            'equipment_type_id' => $type->id,
            'serial_number' => $type->generateSN(),
            'comment' => $this->faker->text(64),
        ];
    }
}
