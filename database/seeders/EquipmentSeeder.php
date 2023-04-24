<?php

namespace Database\Seeders;

use App\Components\EquipmentTypeMask\EquipmentTypeMaskInterface;
use App\Models\Equipment;
use App\Models\EquipmentType;
use Illuminate\Database\Seeder;

class EquipmentSeeder extends Seeder
{
    public function __construct(protected int $count = 10)
    {
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $collection = Equipment::factory()->for(EquipmentType::factory())->count($this->count)->create();
        $equipmentTypeMaskComponent = app(EquipmentTypeMaskInterface::class);
        $collection->each(function(Equipment $item) use ($equipmentTypeMaskComponent) {
            $type = $item->equipmentType;
            $equipmentTypeMaskComponent->setMask($type->sn_mask);
            $serialNumber = $equipmentTypeMaskComponent->generateSerialNumber();
            $item->update(['serial_number' => $serialNumber]);
        });
    }
}
