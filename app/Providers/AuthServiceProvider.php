<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Services\Auth\JwtGuard;
use App\Services\Auth\JserverProvider;
use Auth;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);
        //  Auth::extend('jwt', function($app, $name, array $config) {
        // // 返回 Illuminate\Contracts\Auth\Guard 实例
        //     return new JwtGuard($name,Auth::createUserProvider($config['provider']),$this->app['session.store']);
        // });
        // //

        // Auth::provider('jserver',function($app,array $config){
        //     return new JserverProvider($config['model']);
        // });
    }
}
