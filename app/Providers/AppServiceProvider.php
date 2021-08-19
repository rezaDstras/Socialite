<?php

namespace App\Providers;

use App\Http\AuthWays\AuthWaysContracts;
use App\Http\AuthWays\GithubOauth;
use App\Http\AuthWays\GoogleOAuth;
use App\Http\Views\Composers\ChannelComposer;
use App\Models\Channel;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

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

        //every single page
        //View::share('channels',Channel::orderBy('title')->get());

        //Granular

        //View::composer(['channels.index','posts.create'] , function ($view){
        //   $view->with('channels',Channel::orderBy('title')->get());
       // });

        //Composer Classes
        //View::composer(['channels.index','posts.create'],ChannelComposer::class);

        //Use Partials with Composer Classes
        View::composer('partials.*',ChannelComposer::class);
    }
}
