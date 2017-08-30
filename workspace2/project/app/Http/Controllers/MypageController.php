<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class MypageController extends Controller
{
    //
    function viewMypage(Request $req){
        return view('contents.mypage.mypage_host');
    }
    function viewSeller(Request $req){
        $user_name = Session::get('user');

        $coupon_list = DB::table('coupon')
            ->select('coupon_name')
            ->where('user_id','=',$user_name['email'])
            ->where('coupon_type','=','seller')
            ->get();

        return view('contents.mypage.mypage_seller')->with('coupon_list',$coupon_list);
    }

    function viewBuyer(Request $req){
        $user_name = Session::get('user');

        $coupon_list = DB::table('coupon')
            ->select('coupon_name')
            ->where('user_id','=',$user_name['email'])
            ->where('coupon_type','=','buyer')
            ->get();

        return view('contents.mypage.mypage_buyer')->with('coupon_list',$coupon_list);
    }

    function useCoupon(Request $req){
        $user_name = Session::get('user');
        $object = $req->get('text');

        // 혹시 쿠폰이 없을 수 있으니 검사
        $coupon = DB::table('coupon')
            ->where('user_id', $user_name['email'])
            ->where('coupon_name', $object)
            ->count();

        if(!$coupon){
            $result['error'] = '쿠폰이 없습니다!';
        } else {
            // DB에서 해당 쿠폰 찾아서 삭제
            DB::table('coupon')->where('user_id', $user_name['email'])->where('coupon_name', $object)->delete();
            $coupon_list = DB::table('coupon')
                ->select('coupon_name')
                ->where('user_id','=',$user_name['email'])
                ->where('coupon_type','=','seller')
                ->get();
            $result['coupon'] = $coupon_list;

            // 쿠폰 사용 후 작동할 기능 추가
        }

        $callback = $req->input('callback');
        echo $callback."(".json_encode($result).")";
    }

    function useBuyerCoupon(Request $req){
        $user_name = Session::get('user');
        $object = $req->get('text');

        // 혹시 쿠폰이 없을 수 있으니 검사
        $coupon = DB::table('coupon')
            ->where('user_id', $user_name['email'])
            ->where('coupon_name', $object)
            ->count();

        if(!$coupon){
            $result['error'] = '쿠폰이 없습니다!';
        } else {
            // DB에서 해당 쿠폰 찾아서 삭제
            DB::table('coupon')->where('user_id', $user_name['email'])->where('coupon_name', $object)->delete();
            $coupon_list = DB::table('coupon')
                ->select('coupon_name')
                ->where('user_id','=',$user_name['email'])
                ->where('coupon_type','=','buyer')
                ->get();
            $result['coupon'] = $coupon_list;

            // 쿠폰 사용 후 작동할 기능 추가
        }

        $callback = $req->input('callback');
        echo $callback."(".json_encode($result).")";
    }
}
