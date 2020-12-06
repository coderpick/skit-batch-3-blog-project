<?php

namespace App\Providers;

use App\Models\Category;
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
        $this->showCategoryOnHeader();
        $this->showCategoryOnFooter();
    }

    public function showCategoryOnHeader()
    {
         view()->composer('layouts.frontend.partials.header', function ($view) {
             $view->with('categories', Category::get());
        });
    }
     public function showCategoryOnFooter()
    {
         view()->composer('layouts.frontend.partials.footer', function ($view) {
             $view->with('categories', Category::limit(15)->get());
        });
    }
}
