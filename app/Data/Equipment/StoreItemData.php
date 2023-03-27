<?php

namespace App\Data\Equipment;

use Spatie\LaravelData\Data;

class StoreItemData extends Data
{
    public function __construct(
        public string $equipment_type_id,
        public string $serial_number,
        public string $comment,
    ) {}
}
