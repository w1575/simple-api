<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

interface EquipmentTypeFilterInterface
{
    public function type(string $value): Builder;

    public function sn_mask(string $value): Builder;
}
