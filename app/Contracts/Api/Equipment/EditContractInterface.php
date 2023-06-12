<?php

namespace App\Contracts\Api\Equipment;

use App\Data\Equipment\EditData;
use Illuminate\Http\Resources\Json\JsonResource;

interface EditContractInterface
{
    public function __invoke(EditData $data): JsonResource;
}
