<?php

namespace App\Actions\EquipmentType;

use App\Contracts\Api\EquipmentType\IndexContractInterface;
use App\Data\EquipmentType\IndexData;
use App\Http\Resources\EquipmentTypeCollection;
use App\Http\Resources\EquipmentTypeResource;

class IndexAction implements IndexContractInterface
{

    public function __invoke(IndexData $data): EquipmentTypeCollection
    {
        $command = app(IndexContractInterface::class);
        return $command();
    }
}
