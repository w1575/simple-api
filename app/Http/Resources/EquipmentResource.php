<?php

namespace App\Http\Resources;

use App\Models\EquipmentType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $equipment_type_id
 * @property string $serial_number
 * @property string $comment
 * @property EquipmentType $equipmentType
 */
class EquipmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'equipment_type' => EquipmentTypeResource::make($this->equipmentType),
            'serial_number' => $this->serial_number,
            'comment' => $this->comment,
        ];
    }
}
