<?php

namespace App\Actions\Equipment;

use App\Contracts\Api\Equipment\IndexContractInterface;
use App\Data\Equipment\IndexData;
use App\Http\Resources\EquipmentCollection;
use App\Http\Resources\EquipmentResource;
use App\Http\Resources\EquipmentTypeCollection;
use App\Models\Equipment;
use App\Models\EquipmentType;

class IndexAction implements IndexContractInterface
{
    public function __invoke(IndexData $dto): EquipmentCollection
    {
        return new EquipmentCollection(Equipment::paginate());
    }
}
