<?php

namespace App\Http\Controllers\Auth;

use App\Http\AuthWays\AuthWaysContracts;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider(AuthWaysContracts $provider)
    {
//        return Socialite::driver('github')->redirect();
          return $provider->redirectToProvider();

    }
    public function handleProviderCallback(AuthWaysContracts $provider)
    {
        return $provider->handleProviderCallback();

    }

//    public function googleRedirectToProvider()
//    {
//        return Socialite::driver('google')->redirect();
//
//    }
//
//    public function googleHandleProviderCallback()
//    {
//
//        $githubUser = Socialite::driver('google')->stateless()->user();
//
//
//        $user=User::where('provider_id',$githubUser->getId())->first();
//        if (!$user){
//            //add user to database
//            $user =User::create([
//                'email'        =>$githubUser->getEmail(),
//                'provider_id'  =>$githubUser->getId(),
//                'name'         =>$githubUser->getName(),
//                'avatar'       =>$githubUser->getAvatar(),
//            ]);
//        }
//        //Login user
//        #set True as a remember property
//        Auth::login($user,true);
//
//        return redirect($this->redirectTo);
//    }
}
