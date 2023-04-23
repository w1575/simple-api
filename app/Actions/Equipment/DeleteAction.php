<?php

namespace App\Actions\Equipment;

use App\Contracts\Api\Equipment\DeleteContractInterface;
use App\Data\Equipment\DeleteData;
use App\Http\Resources\DeleteActionResponseResource;
use App\Models\Equipment;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DeleteAction implements DeleteContractInterface
{

    public function __invoke(DeleteData $data): JsonResponse
    {
        $equipment = Equipment::whereId($data->id)->firstOr(fn ()
            => throw new NotFoundHttpException('Record does not exist')
        );

        return (new DeleteActionResponseResource(['success' => $equipment->delete()]))->response();
    }
}
