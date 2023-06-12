<?php

namespace App\Actions\Equipment;

use App\Contracts\Api\Equipment\EditContractInterface;
use App\Data\Equipment\EditData;
use App\Http\Resources\EquipmentResource;
use App\Models\Equipment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class EditAction implements EditContractInterface
{

    public function __invoke(EditData $data): JsonResource
    {
        $model = Equipment::whereId($data->id)->firstOr(
            fn() => throw new NotFoundHttpException('Record does not exist')
        );
        $model->update($data->toArray());
        $model->fresh();
        return new EquipmentResource($model);
    }
}
