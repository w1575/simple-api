<?php

use App\Components\EquipmentTypeMask\EquipmentTypeMask;

it('generates correct regexp values', function (string $values, string $regexp) {
    $component = new EquipmentTypeMask();
    $component->setMask($values);
    expect($component->generateMaskRegulaExpression())->toEqual($regexp);
})->with('units/equipment_validator_type/regexp_values');
