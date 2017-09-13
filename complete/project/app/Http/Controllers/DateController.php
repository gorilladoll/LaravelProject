<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Date;

class DateController extends Controller
{
    function createDate(Request $request){
      $session = $request->session()->get('user');
      $title   = $request->input('title');
      $start   = $request->input('start');
      $end     = $request->input('end');


      if(isset($session) && isset($title) && isset($start) && isset($end)){
        Date::create([
          'user_id' => $session['id'],
          'title'   => $title,
          'start'   => $start,
          'end'     => $end,
        ]);
      }
    }

    function alertDate(Request $request){
      $session = $request->session()->get('user');
      $id      = $request->input('id');
      $title   = $request->input('title');
      $start   = $request->input('start');
      $end     = $request->input('end');

      if(isset($session) && isset($title) && isset($start) && isset($end)){
        $update = Date::find($id);
        if($update){
          $update->title = $title;
          $update->start = $start;
          $update->End   = $end;
          $update->save();
        }
      }
    }

    function main(Request $req){
      $session = $req->session()->get('user');
      $plans = DB::table('dates')->select('id','title','start','end')
                                 ->where('user_id',$session['id'])->get();

      $plans = json_encode($plans,JSON_PRETTY_PRINT);

      // var_dump($plans);
      return $plans;
    }
}
