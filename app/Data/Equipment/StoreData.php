<?php

namespace App\Data\Equipment;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class StoreData extends Data
{
    public function __construct(
        #[DataCollectionOf(StoreItemData::class)]
        public DataCollection $items,
    ) {}
}
