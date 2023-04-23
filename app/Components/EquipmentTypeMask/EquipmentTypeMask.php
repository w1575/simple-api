<?php

namespace App\Components\EquipmentTypeMask;

use App\Components\EquipmentTypeMask\Exceptions\InvalidEquipmentTypeMaskValueException;
use ReflectionClass;

class EquipmentTypeMask implements EquipmentTypeMaskInterface
{
    private string $mask;

    public static function getMaskAvailableValues(): array
    {
        return (new ReflectionClass(static::class))->getConstants();
    }

    /**
     * @throws InvalidEquipmentTypeMaskValueException
     */
    public function validateMask(): void
    {
        $availableValues = static::getMaskAvailableValues();
        $maskLength = strlen($this->mask);
        for ($i = 0; $i < $maskLength; $i++) {
            $item = $this->mask[$i];
            if (!in_array($item, $availableValues)) {
                throw new InvalidEquipmentTypeMaskValueException();
            }
        }
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
        $randomSymbol = function() {
            $items = ['-', '_', '@'];
            return $items[array_rand($items)];
        };

        $randomLetter = function (string $first, string $last) {
            $arrayOfLetters = range($first, $last);
            $key = array_rand($arrayOfLetters);
            return $arrayOfLetters[$key];
        };

        $generateValue = fn (string $value) =>
            match ($value) {
                EquipmentTypeMaskInterface::MASK_DIGIT => rand(0, 9),
                EquipmentTypeMaskInterface::MASK_UPPERCASE_LETTER => $randomLetter('A', 'Z'),
                EquipmentTypeMaskInterface::MASK_LOWERCASE_LETTER => $randomLetter('a', 'z'),
                EquipmentTypeMaskInterface::MASK_DIGIT_OR_LETTER => match(rand(0, 2)) {
                    0 => rand(0, 9),
                    1 => $randomLetter('a', 'z'),
                    2 => $randomLetter('A', 'Z'),
                },
                EquipmentTypeMaskInterface::MASK_SPECIAL_SYMBOL => $randomSymbol(),
            };
        ;

        $result = "";

        $maskAsArray = mb_str_split($this->mask);
        foreach ($maskAsArray as $letter) {
            $symbol = $generateValue($letter);
            $result .= $symbol;
        }

        return $result;
    }

    public function generateMaskRegulaExpression(): string
    {
        $result = static::REGEXP_DELIMITER . "^";
        foreach (mb_str_split($this->getMask()) as $letter) {
            $result .= match ($letter) {
                EquipmentTypeMaskInterface::MASK_DIGIT => "[0-9]",
                EquipmentTypeMaskInterface::MASK_UPPERCASE_LETTER => "[A-Z]",
                EquipmentTypeMaskInterface::MASK_LOWERCASE_LETTER => '[a-z]',
                EquipmentTypeMaskInterface::MASK_DIGIT_OR_LETTER => "([0-9]|[A-Za-z])",
                EquipmentTypeMaskInterface::MASK_SPECIAL_SYMBOL => "[\-,\_\@]",
            };
        }

        return $result . "$" . static::REGEXP_DELIMITER;
    }
}
