<?php

use App\Models\Equipment;

dataset('equipment_store_dataset', function () {
    yield fn() => ['items' => [Equipment::factory()->definition()]];
});

dataset('equipment_store_wrong_mask_dataset', function () {
    $wrongSnKey = function() {
        $definition = Equipment::factory()->definition();

        $currentValue = $definition['serial_number'];

        $definition['serial_number'] = str_replace(['@', '_', '-'], '', $currentValue);;

        return $definition;
    };
    yield fn() => ['items' => [$wrongSnKey()]];
});
