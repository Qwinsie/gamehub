<?php

namespace App\Providers;

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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('edit-profile', function (User $user, $profile) {
            return $profile->is($user);
        });

        Gate::define('edit-game', function (User $user, $game) {
            return $game->user->is($user);
        });

        Gate::before(function (User $user) {
            if ($user->id === 1 ) {
                return true;
            }
        });
    }
}
