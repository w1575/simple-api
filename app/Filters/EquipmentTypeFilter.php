<?php

namespace App\Filters;

use App\Components\Eloquent\QueryFilter\QueryFilters;
use Illuminate\Database\Eloquent\Builder;

class EquipmentTypeFilter extends QueryFilters implements EquipmentTypeFilterInterface
{
    public function type(string $value): Builder
    {
        return $this->builder->where('type', 'LIKE', "%{$value}%");
    }

    public function sn_mask(string $value): Builder
    {
        return $this->builder->where('sn_mask', 'LIKE', "%{$value}%");
    }
}
