<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class MileageController extends Controller
{
    function Main(Request $req){
        $user_name = Session::get('user');

        // 포인트 정보
        $user_mileage = DB::table('users')
            ->select('s_mileage','b_mileage')
            ->where('email','=',$user_name['email'])->get();

        //return $user_mileage;
        return view('contents.mileage.mileage_sell_ad')->with('user_info',$user_mileage);
    }

    function buyerShop(Request $req){
        $user_name = Session::get('user');

        // 포인트 정보
        $user_mileage = DB::table('users')
            ->select('s_mileage','b_mileage')
            ->where('email','=',$user_name['email'])->get();

        //return $user_mileage;
        return view('contents.mileage.mileage_discount')->with('user_info',$user_mileage);
    }

    function buyAction(Request $req){
        $user_name = Session::get('user');

        //구매한 물건
        $object = $req->get('text');
        $price = $req->get('price');
        $buyer = $req->get('buyer');

        if($buyer == 'buyer'){

            //바이어 상품 구입시
            $user_mileage = DB::table('users')
                ->select('b_mileage')
                ->where('email', '=', $user_name['email'])->get();

            $coupon = DB::table('coupon')
                ->where('user_id', $user_name['email'])
                ->where('coupon_name', $object)
                ->count();

            if ($user_mileage[0]->b_mileage < $price) {
                $result['error'] = '마일리지가 부족합니다!';
            } else if ($coupon) {
                $result['error'] = '이미 있는 쿠폰입니다!';
            } else {

                $calc = $user_mileage[0]->b_mileage - $price;

                DB::table('users')
                    ->where('email', $user_name['email'])
                    ->update(['b_mileage' => $calc]);

                DB::table('coupon')->insert(
                    ['user_id' => $user_name['email'], 'coupon_name' => $object,'coupon_type' => 'buyer']
                );

                // 차감된 포인트
                $result['price'] = $price;
                $result['name'] = $object;
                $result['calc'] = $calc;

            }

        } else {

            //셀러 상품 구입시
            $user_mileage = DB::table('users')
                ->select('s_mileage')
                ->where('email', '=', $user_name['email'])->get();

            $coupon = DB::table('coupon')
                ->where('user_id', $user_name['email'])
                ->where('coupon_name', $object)
                ->count();

            if ($user_mileage[0]->s_mileage < $price) {
                $result['error'] = '마일리지가 부족합니다!';
            } else if ($coupon) {
                $result['error'] = '이미 있는 쿠폰입니다!';
            } else {

                $calc = $user_mileage[0]->s_mileage - $price;

                DB::table('users')
                    ->where('email', $user_name['email'])
                    ->update(['s_mileage' => $calc]);

                DB::table('coupon')->insert(
                    ['user_id' => $user_name['email'], 'coupon_name' => $object,'coupon_type' => 'seller']
                );

                // 차감된 포인트
                $result['price'] = $price;
                $result['name'] = $object;
                $result['calc'] = $calc;

            }
        }

        $callback = $req->input('callback');
        echo $callback."(".json_encode($result).")";
    }
}
