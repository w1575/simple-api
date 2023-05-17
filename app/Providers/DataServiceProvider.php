<?php

namespace App\Providers;

use App\Contracts\Data\EquipmentDataInterface;
use App\Contracts\Data\EquipmentTypeDataInterface;
use App\Data\EquipmentData;
use Illuminate\Support\ServiceProvider;

class DataServiceProvider extends ServiceProvider
{
    public array $bindings = [
        EquipmentDataInterface::class => EquipmentData::class,
        EquipmentTypeDataInterface::class => EquipmentTypeDataInterface::class,
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
