<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \App\Users\Models\User::observe(\App\Users\Observers\Users::class);

        \App\Boards\Models\Board::observe(\App\Boards\Observers\Boards::class);
        \App\Boards\Models\Topic::observe(\App\Boards\Observers\Topics::class);
        \App\Boards\Models\Reply::observe(\App\Boards\Observers\Replies::class);
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
