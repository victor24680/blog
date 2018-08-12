<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      /*  DB::listen(function($sql, $bindings, $time) {
            echo 'SQL语句执行：'.$sql .'，参数：'.json_encode($bindings) .',耗时：'.$time .'ms';
        });*/
       /* DB::listen(function($query){
            dump($query->bindings);
        });*/
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
