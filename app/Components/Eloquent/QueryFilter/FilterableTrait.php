<?php

namespace App\Components\Eloquent\QueryFilter;

use Illuminate\Database\Eloquent\Builder;

trait FilterableTrait
{
    public function scopeFilter(Builder $query, QueryFiltersInterface $filters): Builder
    {
        return $filters->apply($query);
    }
}
