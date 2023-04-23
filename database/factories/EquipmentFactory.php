<?php

namespace Database\Factories;

use App\Components\EquipmentTypeMask\EquipmentTypeMaskInterface;
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
        return [
            'equipment_type_id' => null,
            'serial_number' => $this->faker->unique()->word, // все равно нужно сгенерировать на основе типа
            'comment' => $this->faker->text(64),
        ];
    }
}
