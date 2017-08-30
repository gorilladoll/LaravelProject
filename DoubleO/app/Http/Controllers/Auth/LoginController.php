<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function show(Request $request){
      $session = $request->session()->get('login');
      if(isset($session)){
          return view('logins.main')->with('session',$session);
      }
      return view('logins.main');
    }

    public function showSignup(){
      return view('logins.signup');
    }

    public function signupConfirm(Request $request){
      $signup = [
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => $request->input('password'),
        'mileage' => 0
      ];

      $signup_confirm = RegisterController::create($signup);
      if($signup_confirm){
        $request->session()->put('login',$signup['name']);
        return redirect()->action('Auth\LoginController@show');
      }
      return redirect()->action('Auth\LoginController@showSignup');
    }

    public function loginConfirm(Request $request){
      $login = [
        'email' => $request->input('email'),
        'password' => $request->input('password')
      ];

      $login_confirm = RegisterController::check($request,$login);
      if(!$login_confirm){
        return redirect('/');
      }
      return redirect('/');
    }

    public function Logout(Request $request){
      $request->session()->forget('login');
      return redirect('/');
    }
}
