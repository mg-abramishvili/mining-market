<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\Setting;
use App\Models\Review;
use App\Models\Advantage;
use App\Models\Scheme;
use App\Models\About;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Schema::defaultStringLength(191);

        $settings = Setting::find(1);
        $reviews = Review::all();
        $advantages = Advantage::all();
        $schemes = Scheme::all();
        $about = About::find(1);
        View::share('settings', $settings);
        View::share('reviews', $reviews);
        View::share('advantages', $advantages);
        View::share('schemes', $schemes);
        View::share('about', $about);
    }
}
