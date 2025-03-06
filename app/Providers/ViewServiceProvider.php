<?php

namespace App\Providers;

use App\Models\Product;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $view->with('categories', Category::all());
        });

        View::composer('*', function ($view) {
            $view->with('count', Product::getCartCount());
        });
    }

    public function register()
    {
        //
    }
}
