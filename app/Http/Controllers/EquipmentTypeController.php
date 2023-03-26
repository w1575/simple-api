<?php

namespace App\Http\Controllers;

use App\Contracts\Api\EquipmentType\IndexContractInterface;
use App\Data\EquipmentType\IndexData;
use Illuminate\Http\Request;

class EquipmentTypeController extends Controller
{
    public function index(Request $request)
    {
        $command = app(IndexContractInterface::class);
        $indexData = IndexData::from($request->toArray());
        return $command($indexData);
    }
}
