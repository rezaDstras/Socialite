<?php

namespace App\Providers;

use App\Http\AuthWays\AuthWaysContracts;
use App\Http\AuthWays\GithubOauth;
use App\Http\AuthWays\GoogleOAuth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

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
        $request=$this->app->request->getRequestUri();
        $callback='/auth/github/callback';
        if($request == ['/auth/github/redirect' || $request == $callback ]){
            $this->app->singleton(AuthWaysContracts::class,function (){
                return new GithubOauth();
            });
        }else{
            $this->app->singleton(AuthWaysContracts::class,function (){
                return new GoogleOAuth();
            });
        }

    }
}
