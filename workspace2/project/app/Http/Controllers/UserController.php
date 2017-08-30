<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Session;
     

class UserController extends Controller{

    public function authenticate(Request $req){

    	$users = User::where('email','=',$req->get('email'))->get();

    	$user = $users[0];
        Session::put('user',$user);

    	if($req->input('password') == $user['password']){
    		$req->session()->put('user',$user);
            return view('main')->with('user',$req->session()->get('user'));
    	}
       
    	/*$test = [
    		'users'		=>$Users,
    		'test'		=>bcrypt($req->get('password'))
    	];
    	return view('test')->with('test',$test);*/

    }

    public function regist(Request $req){
    	$users = new User;

    	$users->email 				= $req->input('email');
    	$users->password 			= $req->input('password');
    	$users->attention_location	= $req->input('attention');
    	$users->name                = $req->input('nick_name');
    	$users->nick_name			= $req->input('nick_name');
    	$users->own_flea			= 10000;

    	$users->save();
    	return response('완료');
    }
    
    // public function alarmCheck(Request $req){
    // 	$recommendInfo = $req->input('recommendInfo');
    	
    	
    	
    // 	$result = $recommendInfo;
    //     $callback = $req->input('callback');
    //     echo $callback."(".json_encode($result).")";
    // }
}
