<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Acceso;
use App\Area;
use App\Sub_area;

class LoginController extends Controller
{

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
    		if(Auth::check()){
    			Auth::logout();
    		}
        return view('escritorio.login');
    }


    public function auth(Request $request)
    {
        $this->validate($request, ['usuario' => 'required' , 'password' => 'required']);
        if(Auth::attempt( $request->only(['usuario', 'password' ]) ) )
        {
            session(['menu' => Acceso::menu()]);

            return redirect()->route('escritorio');
        }
        else
        {
            return redirect()->route('login_entrar')->withErrors('Error en sus credenciales por favor intentelo de nuevo');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        //$request->session()->flush();
        return redirect()->route('login_entrar');
    }
}
