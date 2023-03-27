<?php

namespace App\Actions\EquipmentType;

use App\Contracts\Api\EquipmentType\IndexContractInterface;
use App\Data\EquipmentType\IndexData;
use App\Filters\EquipmentTypeFilterInterface;
use App\Http\Resources\EquipmentTypeCollection;
use App\Models\EquipmentType;
use Illuminate\Http\Resources\Json\JsonResource;

class IndexAction implements IndexContractInterface
{
    public function __invoke(IndexData $data, EquipmentTypeFilterInterface $filters): JsonResource
    {
        $equipmentTypes = EquipmentType::query()->filter($filters);

        return new EquipmentTypeCollection($equipmentTypes->paginate());
    }
}
