<?php

namespace App\Providers;

use App\Models\Employee;
use Illuminate\Support\Facades\Gate;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('view-admin', function (Employee $employee) {
            return $employee->office->slug === 'administrador';
        });

        Gate::define('view-desenvolvedor', function (Employee $employee) {
            return $employee->office->slug === 'desenvolvedor';
        });

        Gate::define('view-chefe-de-cozinha', function (Employee $employee) {
            return $employee->office->slug === 'chefe-de-cozinha';
        });
    }
}
