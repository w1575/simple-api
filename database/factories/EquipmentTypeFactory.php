<?php

namespace Database\Factories;

use App\Components\EquipmentTypeMask\EquipmentTypeMaskInterface;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EquipmentType>
 */
class EquipmentTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $equipmentTypeMaskComponent = app(EquipmentTypeMaskInterface::class);
        return [
            'created_at' => $this->faker->dateTime(),
//            'updated_at' => '',
            'type' => $this->faker->word,
            'sn_mask' => $equipmentTypeMaskComponent::generateMask(),
//            'deleted_at' => '',
        ];
    }
}
