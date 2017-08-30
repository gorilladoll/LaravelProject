<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Buylist;

class BuylistController extends Controller
{
    //
    public function printMain(Request $request){
      $buylist = DB::table('buylists')->take(4)->get();
      // return view('contents.')
    }

    public function insertBuylist(Request $request){
      $bid      = $request->input('bid');
      $bname    = $request->input('bname');
      $bprice   = $request->input('bprice');
      $bseller  = $request->input('bseller');
      $bimg     = $request->input('bimg');
      $bbuyer   = $request->input('bbuyer');

      if(isset($bimg)){
        $bimg_name = date("Y-m-d-H-i-s").$bimg->getClientOriginalName();
        if($bimg->getClientOriginalExtension() == "jpg" ||$bimg->getClientOriginalExtension() == "png"
           || $bimg->getClientOriginalExtension() == "jpeg")
         {
            $result = $bimg->move(storage_path('app/images'),$bimg_name);
            Buylist::create([
              'bid'     => $bid,
              'bname'   => $bname,
              'bprice'  => $bprice,
              'bseller' => $bseller,
              'bimg'    => $bimg_name,
              'bbuyer'  => $bbuyer,
            ]);
            $buylist = DB::table('buylists')->get();
            $buylist = json_encode($buylist,JSON_PRETTY_PRINT);
            return $buylist;
         }
      }
    }
}
