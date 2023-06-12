<?php

namespace App\Http\Resources;

use App\Components\EquipmentTypeMask\EquipmentTypeMaskInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EquipmentTypeResource extends JsonResource
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
            'type' => $this->type,
            'sn_mask' => $this->sn_mask,
            'example_number' => app(EquipmentTypeMaskInterface::class)->setMask($this->sn_mask)->generateSerialNumber()
        ];
    }
}
