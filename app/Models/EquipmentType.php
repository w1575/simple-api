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
}
