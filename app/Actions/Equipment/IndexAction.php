<?php

namespace App\Actions\Equipment;

use App\Contracts\Api\Equipment\IndexContractInterface;
use App\Data\Equipment\IndexData;
use App\Http\Resources\EquipmentTypeCollection;
use App\Models\EquipmentType;

class IndexAction implements IndexContractInterface
{
    public function __invoke(IndexData $dto): EquipmentTypeCollection
    {
        return new EquipmentTypeCollection(EquipmentType::paginate());
    }
}
