<?php

namespace App\Contracts\Api\Equipment;

use App\Data\Equipment\StoreData;
use Illuminate\Http\JsonResponse;

interface StoreContractInterface
{
    public function __invoke(StoreData $data): JsonResponse;
}
