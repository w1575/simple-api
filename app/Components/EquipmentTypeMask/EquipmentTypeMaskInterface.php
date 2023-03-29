<?php

namespace App\Components\EquipmentTypeMask;

use App\Components\EquipmentTypeMask\Exceptions\InvalidEquipmentTypeMaskValueException;

interface EquipmentTypeMaskInterface
{
    public const MASK_DIGIT = 'N';

    public const MASK_UPPERCASE_LETTER = "A";

    public const MASK_LOWERCASE_LETTER = "a";

    public const MASK_DIGIT_OR_LETTER = "X";

    public const MASK_SPECIAL_SYMBOL = "Z";

    public static function getMaskAvailableValues(): array;

    public static function validateMask(): bool;

    /**
     * @throws InvalidEquipmentTypeMaskValueException
     * @param string $mask
     * @return void
     */
    public function setMask(string $mask): void;

    public function getMask(): string;

    public function generateSerialMask(): string;

    public function generateMaskRegulaExpression(): string;

}
