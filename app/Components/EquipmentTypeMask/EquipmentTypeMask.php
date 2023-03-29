<?php

namespace App\Components\EquipmentTypeMask;

class EquipmentTypeMask implements EquipmentTypeMaskInterface
{

    public static function getMaskAvailableValues(): array
    {
        // TODO: Implement getMaskAvailableValues() method.
        return false;
    }

    public static function validateMask(): bool
    {
        // TODO: Implement validateMask() method.
    }

    /**
     * @inheritDoc
     */
    public function setMask(string $mask): void
    {
        // TODO: Implement setMask() method.
    }

    public function getMask(): string
    {
        // TODO: Implement getMask() method.
    }

    public function generateSerialMask(): string
    {
        // TODO: Implement generateSerialMask() method.
    }

    public function generateMaskRegulaExpression(): string
    {
        // TODO: Implement generateMaskRegulaExpression() method.
    }
}
