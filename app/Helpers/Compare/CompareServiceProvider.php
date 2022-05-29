<?php

namespace App\Helpers\Compare;

use Illuminate\Support\ServiceProvider;

class CompareServiceProvider extends ServiceProvider
{
    public function register()
    {
         $this->app->singleton('compare',function (){
             return new CompareService();
         });
    }
}
