<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Socialite;

use App\User;
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
    protected $redirectTo = '/user/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    

    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'userLogout']]);
    }

    public function userLogout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }

    protected $providers =  [
        'google',
        'facebook',
        'twitter'
    ];

    public function redirectToProvider($provider)
    {
        // return Socialite::driver($provider)->redirect();

        if (! $this->isProviderAllowed($provider)) {
            return $this->sendFailedResponse("{$provider} tidak mendukung");

        }

        try{
            return Socialite::driver($provider)->redirect();
        } catch(Exception $e){
            return $this->sendFailedResponse($e->getMessage());
        }

    }



    public function handleProviderCallback($provider)
    {
        // $user = Socialite::driver($provider)->user();
        // $authUser = $this->findOrCreateUser($user, $provider);
        // Auth::login($authUser, true);
        // return redirect('/user/dashboard');

        try{
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e){
            return $this->sendFailedResponse($e->getMessage());
        }

        return empty($user->email)
            ? $this->sendFailedResponse("Email {$provider} tidak ditemukan.")
            : $this->loginOrCreateAccount($user, $provider);
    }

    protected function sendSuccessResponse(){
        return redirect()->intended('/user/dashboard');
    }

    protected function sendFailedResponse(){
        return redirect()->route('login')
            -> withErrors(['msg' => $msg ?: 'Login gagal, silakan coba lagi']);
    }

    protected function loginOrCreateAccount($providerUser, $provider)
    {
        // $authUser = User::where('provider_id', $user->id)->first();
        // if ($authUser) {
        //     return $authUser;
        // }
        // else{
        //     $data = User::create([
        //         'name'     => $user->name,
        //         'email'    => !empty($user->email)? $user->email : '' ,
        //         'provider' => $provider,
        //         'provider_id' => $user->id
        //     ]);
        //     return $data;
        // }

        $user = User::where('email', $providerUser->getEmail())->first();

        if ($user) {
            $user->update([
                'slug' => str_slug($providerUser->getName()),
                'provider' => $provider,
                'provider_id' => $providerUser->id,
            ]);
        } else {
            $user = User::create([
                'slug' => str_slug($providerUser->getName()),
                'name' => $providerUser->getName(),
                'email' => $providerUser->getEmail(),
                'provider' => $provider,
                'provider_id' => $providerUser->getId(),
                // user can use reset password to create a password
                'password' => ''
            ]);
        }

        Auth::login($user, true);

        return $this->sendSuccessResponse();
    }

    private function isProviderAllowed($provider){
        return in_array($provider, $this->providers) && config()->has("services.{$provider}");
    }
}
