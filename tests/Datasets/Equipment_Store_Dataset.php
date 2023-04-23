<?php

use App\Components\EquipmentTypeMask\EquipmentTypeMaskInterface;
use App\Models\Equipment;
use App\Models\EquipmentType;

dataset('equipment_store_dataset', function () {
    yield function() {
        $typeModel = EquipmentType::factory()->create();
        $data = Equipment::factory()->definition();
        $data['equipment_type_id'] = $typeModel->id;
        $component = app(EquipmentTypeMaskInterface::class);
        $component->setMask($typeModel->sn_mask);
        $data['serial_number'] = $component->generateSerialNumber();
        return [
            'items' => [$data]
        ];
    };
});

dataset('equipment_store_wrong_mask_dataset', function () {
    $wrongSnKey = function() {
        $type = EquipmentType::factory()->create();
        $definition = Equipment::factory()->state(['equipment_type_id' => $type->id])->definition();
        $maskComponent = app(EquipmentTypeMaskInterface::class);
        $currentValue = $maskComponent::generateMask();

        $definition['serial_number'] = str_replace(['@', '_', '-'], '', $currentValue);;

        return $definition;
    };
    yield fn() => ['items' => [$wrongSnKey()]];
});
