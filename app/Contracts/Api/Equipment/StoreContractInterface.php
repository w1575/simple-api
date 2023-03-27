<?php

namespace App\Contracts\Api\Equipment;

use App\Data\Equipment\StoreData;
use Illuminate\Http\Resources\Json\JsonResource;

interface StoreContractInterface
{
    public function __invoke(StoreData $data): JsonResource;
}
