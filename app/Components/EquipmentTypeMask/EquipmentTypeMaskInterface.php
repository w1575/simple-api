<?php

namespace App\Components\EquipmentTypeMask;

interface EquipmentTypeMaskInterface
{
    public const MASK_DIGIT = 'N';

    public const MASK_UPPERCASE_LETTER = "A";

    public const MASK_LOWERCASE_LETTER = "a";

    public const MASK_DIGIT_OR_LETTER = "X";

    public const MASK_SPECIAL_SYMBOL = "Z";

    public const REGEXP_DELIMITER = "%";

    public static function getMaskAvailableValues(): array;

    public function validateMask(): void;

    /**
     * @param string $mask
     * @return void
     */
    public function setMask(string $mask): void;

    public function getMask(): string;

    public function generateSerialMask(): string;

    public function generateMaskRegulaExpression(): string;

}
