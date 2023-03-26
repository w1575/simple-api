<?php

namespace App\Contracts\Api\EquipmentType;

use App\Data\EquipmentType\IndexData;
use App\Http\Resources\EquipmentTypeCollection;

interface IndexContractInterface
{
    public function __invoke(IndexData $data): EquipmentTypeCollection;
}
