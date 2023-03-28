<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Database\Factories\EquipmentFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Illuminate\Support\InteractsWithTime;

/**
 * App\Models\Equipment
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $equipment_type_id
 * @property string $serial_number
 * @property string $comment
 * @method static EquipmentFactory factory($count = null, $state = [])
 * @method static Builder|Equipment newModelQuery()
 * @method static Builder|Equipment newQuery()
 * @method static Builder|Equipment query()
 * @method static Builder|Equipment whereComment($value)
 * @method static Builder|Equipment whereCreatedAt($value)
 * @method static Builder|Equipment whereEquipmentTypeId($value)
 * @method static Builder|Equipment whereId($value)
 * @method static Builder|Equipment whereSerialNumber($value)
 * @method static Builder|Equipment whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Equipment extends Model
{
    use HasFactory, InteractsWithTime;

    protected $guarded = [
        'created_at',
        'updated_at',
        'id',
    ];

    protected $table = "equipments";

    public function equipmentType(): BelongsTo
    {
        return $this->belongsTo(EquipmentType::class);
    }
}
