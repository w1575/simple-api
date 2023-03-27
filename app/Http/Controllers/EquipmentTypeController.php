<?php

namespace App\Http\Controllers;

use App\Contracts\Api\EquipmentType\IndexContractInterface;
use App\Data\EquipmentType\IndexData;
use App\Filters\EquipmentTypeFilterInterface;
use App\Http\Requests\EquipmentType\EquipmentIndexRequest;
use Illuminate\Http\Resources\Json\JsonResource;

class EquipmentTypeController extends Controller
{
    public function index(EquipmentIndexRequest $request, EquipmentTypeFilterInterface $filters): JsonResource
    {
        $indexData = IndexData::from($request->toArray());
        $command = app(IndexContractInterface::class);

        return $command($indexData, $filters);
    }
}
