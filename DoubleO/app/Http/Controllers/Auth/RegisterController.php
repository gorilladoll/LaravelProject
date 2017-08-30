<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;
//추가됨
use Illuminate\Support\Facades\Hash;
//추가됨
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    static function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'mileage' => $data['mileage'],
        ]);
    }

    static function check(Request $request,array $data){
      $name = isset($data['email']) ? $data['email'] : null;
      $password = isset($data['password']) ? $data['password'] : null;


      $database = User::where(['email' => $data['email']])->first();
      // var_dump($database['password']);

      if(isset($database['email'])){
        if(!Hash::check($password,$database['password'])){
          // echo "error";
          return false;
        }else {
          // echo "success";
          $request->session()->put('login',$database['name']);
          // echo $request->session()->get('login');
          return true;
        }
      }
    }
}
