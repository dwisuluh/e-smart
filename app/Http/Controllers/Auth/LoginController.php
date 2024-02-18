<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Request;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
        // return Socialite::driver('google')->with(['prompt' => 'consent'])->redirect();
    }
    public function handleGoogleCallback()
    {
        try{

            $user = Socialite::driver('google')->user();

            // Cek apakah pengguna sudah ada dalam database
            $existingUser = User::where('email', $user->getEmail())->first();

            if ($existingUser) {
                Auth::login($existingUser); // Login pengguna yang sudah ada
            } else {
                // Jika pengguna belum ada, buat pengguna baru dan login
                $role = null;

                if(($user->getEmail()) === 'dwisuluh@uny.ac.id'){
                    $role = 1;
                }else{
                    $role = 10;
                }

                $newUser = new User();
                $newUser->name = $user->getName();
                $newUser->email = $user->getEmail();
                $newUser->avatar = $user->getAvatar();
                $newUser->role = $role;
                $newUser->save();

                Auth::login($newUser);
            }

            return redirect()->route('home');
        } catch(\Throwable $th){
            abort(404);
        }
    }
    public function logout(Request $request)
    {
        Auth::logout(); // Logout pengguna dari aplikasi
        $request->session()->invalidate(); // Invalidate session
        $request->session()->flush();
        $request->session()->regenerateToken(); // Regenerate token
        return redirect('/login'); // Redirect ke halaman login setelah logout
    }
}
