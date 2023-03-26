<?php

namespace App\Actions\EquipmentType;

use App\Contracts\Api\EquipmentType\IndexContractInterface;
use App\Data\EquipmentType\IndexData;
use App\Http\Resources\EquipmentTypeCollection;
use App\Models\EquipmentType;
use Spatie\QueryBuilder\QueryBuilder;

class IndexAction implements IndexContractInterface
{

    public function __invoke(IndexData $data): EquipmentTypeCollection
    {
        $equipmentTypes = QueryBuilder::for(EquipmentType::query())
            ->allowedFilters('type', 'sn_mask')
        ;

        return new EquipmentTypeCollection($equipmentTypes->paginate());
    }
}
