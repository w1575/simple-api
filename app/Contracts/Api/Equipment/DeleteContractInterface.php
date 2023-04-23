<?php

namespace App\Contracts\Api\Equipment;

use App\Data\Equipment\DeleteData;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

interface DeleteContractInterface
{
    /**
     * @param  DeleteData  $data
     * @return JsonResponse
     * @throws NotFoundHttpException
     */
    public function __invoke(DeleteData $data): JsonResponse;
}
