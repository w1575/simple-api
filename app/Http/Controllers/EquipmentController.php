<?php

namespace App\Http\Controllers;

use App\Contracts\Api\Equipment\DeleteContractInterface;
use App\Contracts\Api\Equipment\EditContractInterface;
use App\Contracts\Api\Equipment\IndexContractInterface;
use App\Contracts\Api\Equipment\StoreContractInterface;
use App\Data\Equipment\DeleteData;
use App\Data\Equipment\EditData;
use App\Data\Equipment\IndexData;
use App\Data\Equipment\StoreData;
use App\Http\Requests\Equipment\StoreEquipmentRequest;
use App\Http\Requests\Equipment\UpdateEquipmentRequest;
use App\Models\Equipment;
use Illuminate\Http\JsonResponse;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $action = app(IndexContractInterface::class);
        $params = [];
        $indexData = IndexData::from($params);
        return $action($indexData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEquipmentRequest $request): JsonResponse
    {
        $command = app(StoreContractInterface::class);
        $data = StoreData::from($request->toArray());
        return $command($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipment $equipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int  $equipment)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEquipmentRequest $request, int $id)
    {
        $data = EditData::from($request);
        $data->id = $id;
        $action = app(EditContractInterface::class);
        return $action($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        $action = app(DeleteContractInterface::class);
        $data = new DeleteData($id);
        return $action($data);
    }
}
