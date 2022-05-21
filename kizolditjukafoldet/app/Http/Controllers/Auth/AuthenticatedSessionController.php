<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Hash;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function reset(Request $request){
        $user = Auth::user();
        
        $userPassword = $user->password;

        if (Hash::check($request->newpwd, $userPassword)) {
            throw ValidationException::withMessages(['newpwd'=>'Az új jelszó nem lehet ugyanaz mint a régi jelszó!']);
        }

        if(!strcmp($request->newpwd,$request->confirmpwd)==0){
            throw ValidationException::withMessages(['confirmpwd'=>'A megadott jelszó nem egyezik meg az új jelszóval!']);
        }

        $user->password = Hash::make($request->newpwd);
        $user->timestamps = false;
        $user->save();

        return redirect('/admin');
    }

    public function isLogged(){
        if (Auth::user()) {
            return "true";
        }
        else{
            return "false";
        }
    }
}
