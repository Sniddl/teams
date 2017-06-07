<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Gate;
use App\Permission;
use App\Team;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        if (Schema::hasTable('permissions')) {
          foreach ($this->getPermissions() as $permission) {
            Gate::define($permission->name, function ($user, $team) use ($permission){
              return $user->hasPermission($team, $permission->name);
            });
          }
        }

    }

    protected function getPermissions()
    {
      return Permission::with('roles')->get();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
