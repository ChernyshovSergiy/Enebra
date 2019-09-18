<?php

namespace App\Providers;

use App\Models\Inf_subscriber;
use App\Models\Menu;
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
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('admin._sidebar', function ($view){
            $view->with('is_active', Menu::where('is_active', '=', 1)->count());
            $view->with('not_active', Menu::where('is_active', '=', 0)->count());
            $view->with('newSubs', Inf_subscriber::whereNotNull('token')->count());
            $view->with('allSubs', Inf_subscriber::whereToken(null)->count());
        });
    }
}
