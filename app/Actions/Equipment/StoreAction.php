<?php

namespace App\Actions\Equipment;

use App\Contracts\Api\Equipment\StoreContractInterface;
use App\Data\Equipment\StoreData;
use App\Data\Equipment\StoreItemData;
use App\Data\Equipment\StoreResponseData;
use App\Data\Equipment\StoreResponseItemData;
use App\Models\Equipment;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StoreAction implements StoreContractInterface
{
    public function __construct(protected Request $request)
    {
    }

    public function __invoke(StoreData $data): JsonResponse
    {
        /** @var StoreResponseItemData[] $items */
        $items = [];

        foreach ($data->items as $item) {
            /** @var StoreItemData $item */
            try {
                $itemData = $item->toArray();
                $model = Equipment::create($itemData);
                $attributes = $model->attributesToArray();
                $items[] = StoreResponseItemData::from($attributes);
            } catch (Exception $exception) {
                $itemResponse = StoreResponseItemData::from($item);
                $itemResponse->errors = $exception->getMessage();
                $items[] = $itemResponse;
            }
        }
        $responseData = StoreResponseData::from(['items' => $items]);
        return $responseData->toResponse($this->request);
    }
}
