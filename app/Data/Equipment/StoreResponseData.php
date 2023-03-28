<?php

namespace App\Data\Equipment;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class StoreResponseData extends Data
{
    public function __construct(
        #[DataCollectionOf(StoreResponseItemData::class)]
        public DataCollection $items,
    ) {}
}
