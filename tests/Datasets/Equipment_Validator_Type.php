<?php

use App\Components\EquipmentTypeMask\EquipmentTypeMaskInterface;

dataset('units/equipment_validator_type/regexp_values', function () {
    yield [
        'value' => EquipmentTypeMaskInterface::MASK_UPPERCASE_LETTER
            . EquipmentTypeMaskInterface::MASK_DIGIT
            . EquipmentTypeMaskInterface::MASK_DIGIT_OR_LETTER
            . EquipmentTypeMaskInterface::MASK_DIGIT_OR_LETTER
            . EquipmentTypeMaskInterface::MASK_LOWERCASE_LETTER
            . EquipmentTypeMaskInterface::MASK_SPECIAL_SYMBOL,
        'expected' =>  EquipmentTypeMaskInterface::REGEXP_DELIMITER
            . "^[A-Z]" . "[0-9]" . "([0-9]|[A-Za-z])" . "([0-9]|[A-Za-z])" . "[a-z]" . "[\-,\_\@]$"
            . EquipmentTypeMaskInterface::REGEXP_DELIMITER
        ,
    ];
});
