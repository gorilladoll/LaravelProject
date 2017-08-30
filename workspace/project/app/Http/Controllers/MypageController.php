<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MypageController extends Controller
{
    //
    function viewMypage(Request $req){
      return view('contents.mypage.mypage_host');
    }
}
