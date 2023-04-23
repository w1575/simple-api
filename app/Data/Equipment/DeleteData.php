<?php

namespace App\Data\Equipment;

use App\Models\Equipment;
use Spatie\LaravelData\Data;

class DeleteData extends Data
{
    public function __construct(
      public int $id,
    ) {}
}
