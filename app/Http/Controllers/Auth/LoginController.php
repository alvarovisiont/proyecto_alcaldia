<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Acceso;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
    protected $redirectTo = '/escritorio';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest', ['except' => 'logout']);
    }

    public function login()
    {
        return view('escritorio.login');
    }


    public function auth(Request $request)
    {
        $this->validate($request, ['usuario' => 'requerid' , 'password' => 'requerid']);
        if(Auth::attempt( $request->only(['username', 'password' ]) ) )
        {

            return redirect()->intended('escritorio');
        }
        else
        {
            return redirect()->route('login')->writeErrors('Error en sus credenciales por favor intentelo de nuevo');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
