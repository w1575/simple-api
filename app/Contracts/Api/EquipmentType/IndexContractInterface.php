<?php

namespace App\Contracts\Api\EquipmentType;

use App\Data\EquipmentType\IndexData;
use App\Filters\EquipmentTypeFilterInterface;
use App\Http\Resources\EquipmentTypeCollection;
use Illuminate\Http\Resources\Json\JsonResource;

interface IndexContractInterface
{
    public function __invoke(IndexData $data, EquipmentTypeFilterInterface $filters): JsonResource;
}
