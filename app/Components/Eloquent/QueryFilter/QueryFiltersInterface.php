<?php

namespace App\Components\Eloquent\QueryFilter;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

interface QueryFiltersInterface
{
    public function __construct(Request $request);

    public function apply(Builder $builder): Builder;

    public function filters(): array;
}
