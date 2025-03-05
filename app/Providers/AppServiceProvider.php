<?php

namespace App\Providers;

use App\Http\Controllers\User\ProductController;
use App\Models\Product;
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
//        $count = (new ProductController());
//        $count->getCartCount();
//        view()->share('count', $count);
    }
}
