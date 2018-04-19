<?php

namespace App\Providers;

use App\CardCategory;
use Illuminate\Support\ServiceProvider;

class ViewsProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
	    view()->composer('*', function ($view)
	    {
		    $category = CardCategory::all();

		    $view->with('menu-category', $category);
	    });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
