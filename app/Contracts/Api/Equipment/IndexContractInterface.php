<?php

namespace App\Contracts\Api\Equipment;

use App\Data\Equipment\IndexData;
use App\Http\Resources\EquipmentCollection;

interface IndexContractInterface
{
    public function __invoke(IndexData $dto): EquipmentCollection;
}
