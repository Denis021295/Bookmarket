<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;


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
        Paginator::useBootstrap();

        Gate::define('delete-this-comment', function($user, $comment) {
            return $user->id == $comment->clients->id;
        });

        Gate::define('book-in-basket', function($user, $clients) {
            return $clients->where('login', $user->login)->count();
        });
    }
}
