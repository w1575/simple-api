<?php

namespace App\Data\Equipment;

use Spatie\LaravelData\Data;

class EditData extends Data
{
    public function __construct(
        public ?int $id,
        public ?int $equipment_type_id,
        public ?string $serial_number,
        public ?string $comment,
    ) {}
}
