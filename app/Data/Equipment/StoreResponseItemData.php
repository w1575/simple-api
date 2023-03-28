<?php

namespace App\Data\Equipment;

use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;

class StoreResponseItemData extends Data
{
    public function __construct(
        public ?int $id,
        public ?string $created_at,
        public ?string $updated_at,
        public int $equipment_type_id,
        public string $serial_number,
        public ?string $comment,
        public ?string $errors,
    ) {}
}
