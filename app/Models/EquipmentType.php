<?php

namespace App\Models;

use App\Components\Eloquent\QueryFilter\FilterableTrait;
use App\Components\EquipmentTypeMask\EquipmentTypeMaskInterface;
use App\Filters\EquipmentTypeFilterInterface;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use ReflectionClass;

/**
 * App\Models\EquipmentType
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $type
 * @property string $sn_mask
 * @property string|null $deleted_at
 * @method static Builder|EquipmentType newModelQuery()
 * @method static Builder|EquipmentType newQuery()
 * @method static Builder|EquipmentType query()
 * @method static Builder|EquipmentType whereCreatedAt($value)
 * @method static Builder|EquipmentType whereDeletedAt($value)
 * @method static Builder|EquipmentType whereId($value)
 * @method static Builder|EquipmentType whereSnMask($value)
 * @method static Builder|EquipmentType whereType($value)
 * @method static Builder|EquipmentType whereUpdatedAt($value)
 * @method static Builder filter(EquipmentTypeFilterInterface $filters)
 * @mixin Eloquent
 */
class EquipmentType extends Model
{
    use HasFactory, FilterableTrait;

    public function generateSN(): string
    {
        $randomSymbol = function() {
            $items = ['-', '_', '@'];
            return $items[array_rand($items)];
        };

        $randomLetter = fn(string $first, string $last) => array_rand(range($first, $last));

        $generateValue = fn(string $value) => match ($value) {
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

        $result = "";

        foreach (mb_str_split($this->sn_mask) as $letter) {
            $result .= $generateValue($letter);
        }

        return $result;
    }

    /**
     * @return string
     */
    public function getSNMaskRegx(): string
    {
        $result = "^";
        foreach (mb_str_split($this->sn_mask) as $letter) {
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

    /**
     * @return void
     */
    public static function generateRandomSNForGivenMask(string $mask): string
    {

    }

    public static function getMaskAvailableValues(): array
    {
        return (new ReflectionClass(static::class))->getConstants();
    }
}
