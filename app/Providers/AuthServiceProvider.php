<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        if(!$this->app->runningInConsole()){
            foreach (Permission::all() as $key => $permission) {
                Gate::define($permission->name, function($user) use ($permission){
                    return $user->hasPermission($permission);
                });

                // Gate::define($permission->name, function($admin) use ($permission){
                //     return $admin->hasPermission($permission);
                // });
            }
        }

        /**
         * su dung trong Controller
         * $this->authorize('view-post');
         *
         * su dung trong Web.php
         * ->middleware(can:view-post)
         */
    }
}
