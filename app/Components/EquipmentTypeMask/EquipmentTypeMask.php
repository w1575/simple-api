<?php

namespace App\Components\EquipmentTypeMask;

use ReflectionClass;

class EquipmentTypeMask implements EquipmentTypeMaskInterface
{
    private string $mask;

    public static function getMaskAvailableValues(): array
    {
        return (new ReflectionClass(static::class))->getConstants();
    }

    public function validateMask(): bool
    {
        // TODO: Implement validateMask() method.
    }

    /**
     * @inheritDoc
     */
    public function setMask(string $mask): void
    {
        $this->mask = $mask;
    }

    public function getMask(): string
    {
        return $this->mask;
    }

    public function generateSerialMask(): string
    {

    }

    public function generateMaskRegulaExpression(): string
    {
        $result = "^";
        foreach (mb_str_split($this->getMask()) as $letter) {
            $result .= match ($letter) {
                EquipmentTypeMaskInterface::MASK_DIGIT => "[0-9]",
                EquipmentTypeMaskInterface::MASK_UPPERCASE_LETTER => "[A-Z]",
                EquipmentTypeMaskInterface::MASK_LOWERCASE_LETTER => '[a-z]',
                EquipmentTypeMaskInterface::MASK_DIGIT_OR_LETTER => "([0,9]|[A-Z])",
                EquipmentTypeMaskInterface::MASK_SPECIAL_SYMBOL => "[\-,\_\@]",
            };
        }

        return $result . "$";
    }
}
