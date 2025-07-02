<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // @if(auth()->user()->username === "Amit_pattanaik_987") // gate does the work of this
        Gate::define('admin', function (User $user) {
            return $user->username === "Amit_pattanaik_987";
        });

        //same work as above but this is a custom blade we can use like @admin / @endadmin
        Blade::if('admin', function () {
            return request()->user() ?? request()->user()->can('admin');
            // the reason that i am using ?? is that if the user didnot signed in and then this code executes the the request()->user() will return null and if we do null->can('admin') then it will give error 
        });
    }
}
