<?php

namespace App\Providers;

use App\Models\Notification;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
        Paginator::useBootstrap();
        View::composer('Frontend.layouts.header', 'App\Http\View\Composers\FrontPageComposer');
        view()->composer('admin.layouts.nav',function($view){
            $view->with('notifications',Notification::where('notifiable_id',auth()->user()->id)->where('read_at',null)->latest()->get());
        });
    }
}
