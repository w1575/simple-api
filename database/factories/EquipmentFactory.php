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
        $type = EquipmentType::firstOrFail();

        /** @var EquipmentTypeMaskInterface $maskComponent */
        $maskComponent = app(EquipmentTypeMaskInterface::class);
        $maskComponent->setMask($type->sn_mask);
        return [
            'equipment_type_id' => $type->id,
            'serial_number' => $maskComponent->generateSerialMask(),
            'comment' => $this->faker->text(64),
        ];
    }
}
