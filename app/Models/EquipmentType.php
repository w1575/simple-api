<?php

namespace App\Models;

use App\Components\Eloquent\QueryFilter\FilterableTrait;
use App\Filters\EquipmentTypeFilterInterface;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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
            'N' => rand(0, 9),
            'A' => $randomLetter('A', 'Z'),
            'a' => $randomLetter('a', 'z'),
            'X' => match(rand(0, 2)) {
                0 => rand(0, 9),
                1 => $randomLetter('a', 'z'),
                2 => $randomLetter('A', 'Z'),
            },
            'Z' => $randomSymbol(),
        };

        $result = "";

        foreach (mb_str_split($this->sn_mask) as $letter) {
            $result .= $generateValue($letter);
        }

        return $result;
    }

    public function getSNMaskRegx(): string
    {
        $result = "^";
        foreach (mb_str_split($this->sn_mask) as $letter) {
            $result .= match ($letter) {
                'N' => "[0-9]",
                'A' => "[A-Z]",
                'a' => '[a-z]',
                'X' => "([0,9]|[A-Z])",
                'Z' => "[\-,\_\@]",
            };
        }

        return $result. "$";
    }
}
