<?php

namespace App\Contracts\Api\Equipment;

use App\Data\Equipment\EditData;
use Illuminate\Http\JsonResponse;

interface EditContractInterface
{
    public function __invoke(EditData $data): JsonResponse;
}
