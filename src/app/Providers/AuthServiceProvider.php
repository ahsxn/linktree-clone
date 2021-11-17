<?php

namespace App\Providers;

use App\Models\Link;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('edit', fn(User $user, Link $link) => $user->id == $link->user_id);
        Gate::define('update', fn(User $user, Link $link) => $user->id == $link->user_id);
        Gate::define('destroy', fn(User $user, Link $link) => $user->id == $link->user_id);
    }
}
