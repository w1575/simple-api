<?php

namespace App\Providers;

use App\Actions\Equipment\DeleteAction;
use App\Actions\Equipment\EditAction;
use App\Actions\Equipment\StoreAction;
use App\Actions\EquipmentType\IndexAction as EquipmentTypeIndex;
use App\Contracts\Api\Equipment\DeleteContractInterface;
use App\Contracts\Api\Equipment\EditContractInterface;
use App\Contracts\Api\Equipment\IndexContractInterface;
use App\Contracts\Api\Equipment\StoreContractInterface;
use App\Contracts\Api\EquipmentType\IndexContractInterface as EquipmentTypeIndexContractInterface;
use App\Actions\Equipment\IndexAction as EquipmentIndexAction;
use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
{

    public array $bindings = [
        EquipmentTypeIndexContractInterface::class => EquipmentTypeIndex::class,
        IndexContractInterface::class => EquipmentIndexAction::class,
        StoreContractInterface::class => StoreAction::class,
        DeleteContractInterface::class => DeleteAction::class,
        EditContractInterface::class => EditAction::class,
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
