<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:agent')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request,[
            'email'=> 'required',
            'password' => 'required'
        ]);   

        $credential_email = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $credential_username = [
            'username' => $request->email,
            'password' => $request->password,
        ];

        $login = false;
        if (Auth::attempt($credential_email)) {
            $login = true;
            $credential = $credential_email;
        } else if (Auth::attempt($credential_username)) {
            $login = true;
            $credential = $credential_username;
        }

        if ($login == true) {
            $auth = Auth::user();
            if ($auth->role == 'admin') {
                Auth::guard('admin')->attempt($credential);
                return redirect()->intended(route('home'));
            }else{
                if ($auth->status == 'Active') {
                    Auth::guard('agent')->attempt($credential);
                    return redirect()->intended(route('agent.home'));
                } else {
                    return redirect()->back()->withInput($request->only('email', 'password'))->with('errors', 'Akun ini sedang di suspend');
                }
            }
        }

        return redirect()->back()->withInput($request->only('email', 'password'))->with('errors', 'Username atau password tidak sesuai');

    }

}
