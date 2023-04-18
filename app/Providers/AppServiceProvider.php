<?php

namespace App\Providers;

use App\Components\Eloquent\QueryFilter\QueryFilters;
use App\Components\Eloquent\QueryFilter\QueryFiltersInterface;
use App\Components\EquipmentTypeMask\EquipmentTypeMask;
use App\Components\EquipmentTypeMask\EquipmentTypeMaskInterface;
use App\Filters\EquipmentTypeFilter;
use App\Filters\EquipmentTypeFilterInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public array $bindings = [
        QueryFiltersInterface::class => QueryFilters::class,
        EquipmentTypeFilterInterface::class =>  EquipmentTypeFilter::class,
        EquipmentTypeMaskInterface::class => EquipmentTypeMask::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
