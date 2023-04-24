<?php

namespace App\Actions\Equipment;

use App\Data\Equipment\EditData;
use Illuminate\Http\JsonResponse;

class EditAction implements \App\Contracts\Api\Equipment\EditContractInterface
{

    public function __invoke(EditData $data): JsonResponse
    {
        // TODO: Implement __invoke() method.
    }
}
