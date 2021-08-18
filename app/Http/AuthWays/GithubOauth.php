<?php


namespace App\Http\AuthWays;


use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GithubOauth implements AuthWaysContracts
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }
    public function handleProviderCallback()
    {

        $githubUser = Socialite::driver('github')->stateless()->user();
        $user=User::where('provider_id',$githubUser->getId())->first();
        if (!$user){
            //add user to database
            $user =User::create([
                'email'        =>$githubUser->getEmail(),
                'provider_id'  =>$githubUser->getId(),
                'name'         =>$githubUser->getName(),
                'avatar'       =>$githubUser->getAvatar(),
            ]);
        }
        //Login user
        #set True as a remember property
        Auth::login($user,true);

        return redirect($this->redirectTo);
    }
}
