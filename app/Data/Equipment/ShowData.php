<?php

namespace App\Data\Equipment;

use Spatie\LaravelData\Data;

class ShowData extends Data
{
    public function __construct(
      public int $index,
    ) {}
}
