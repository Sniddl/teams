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

        // $teams = Team::with('roles')->get();
        // // return dump($perms);
        // foreach ($teams as $team) {
        //   // echo $team->roles;
        //   foreach ($team->roles as $role) {
        //     // echo $role->permissions;
        //     Gate::define($role->name, function ($user, $team) use ($role){
        //       echo $role;
        //       // return $user->hasRole($perm->roles);
        //     });
        //   }
        //
        // }
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
