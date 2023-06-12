<?php

use App\Models\Equipment;
use App\Models\EquipmentType;

dataset('equipment_edit_dataset_wrong_id', function () {
    yield [
        'id' => 1575,
        'data' => function() {
            return Equipment::factory()->definition();
        },
    ];
});

dataset('equipment_edit_dataset', function () {
    yield [
        'equipment' => fn() => Equipment::firstOrFail(),
        'data' => function() {
            $equipment = Equipment::firstOrFail();
            $definition = Equipment::factory()->definition();
            $definition['id'] = $equipment->id;
            return $definition;
        },
    ];
});
