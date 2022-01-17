<?php

namespace App\Service\History;

use Illuminate\Support\ServiceProvider;

class HistoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /*$this->app->bind('History', function () {
            return new History();
        });*/

        $this->app->singleton('History', function (){
            return new History();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
//        $this->loadMigrationsFrom(__DIR__ . 'database/migrations');

//        Relation::enforceMorphMap(
//            [
//              'post' => 'App\Models\Post',
//              'video' => 'App\Models\Video',
//            ]
//        );
    }
}
