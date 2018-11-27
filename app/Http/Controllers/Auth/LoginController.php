<?php

namespace ComunidadAEI\Http\Controllers\Auth;

use ComunidadAEI\Http\Controllers\Controller;
use ComunidadAEI\Services\Auth\AuthenticatesUsers;
use ComunidadAEI\Services\Auth\RedirectsUsers;
use Illuminate\Support\Facades\Auth;


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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectPath()
    {

        if (Auth::check() && Auth()->user()->privilegios_administrador) {
            return '/Admin';
        }

        return '/home';

    }
}
