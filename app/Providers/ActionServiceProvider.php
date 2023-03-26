<?php

namespace App\Providers;

use App\Actions\Equipment\IndexAction;
use App\Contracts\Api\Equipment\IndexContractInterface;
use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
{

    public array $bindings = [
        IndexContractInterface::class => IndexAction::class,
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
