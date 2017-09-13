<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booth;
use Illuminate\Support\Facades\DB;
use Session;

class BoothController extends Controller
{
	function boothView(Request $req,$test,$id_arg,$th_arg){
        $user_name = $req->session()->get('user');
        $flea_id = $id_arg; //플리마켓 id
        $flea_th = $th_arg; //회차 id
        $booth_name = $test;//배치도 id

        DB::table('flea_ths')
            ->where('flea_id','=',$flea_id)
            ->where('th','=',$flea_th)
            ->update(['block_plan' => $booth_name]);

        $booth_name = DB::table('block_plans')
            ->where('id','=',$booth_name)
            ->get();
        $booth_name = $booth_name[0]->plan_name;

        //해당 배치도로 업데이트
        $booths = DB::table('booths')->where('booth_name','=',$booth_name)->where('user_name','=',$user_name['email'])->get();
        $plan = DB::table('block_plans')->where('plan_name','=',$booth_name)->where('user_id','=',$user_name['id'])->get();

        return view('contents/flea/booth')->with('user',$user_name)->with('booths',$booths)->with('booth_name',$booth_name);
//      if($req->session()->has('user')){
//          return view('booth');
//       }else{
//          return response('로그인 후 이용하세요');
//       }
   }

    function sellerSetView(Request $req, $booth_name, $th_id)
    {
        $user_name = Session::get('user');
        // return $booth_name;
        //return response($user_name);

        $sellers = DB::table('seller_applys')
            ->join('users', 'users.id', '=', 'seller_applys.user_id')
            ->select('users.id', 'users.name','users.attention_location','users.phone','users.age','seller_applys.booth_name','seller_applys.category')
            ->where('seller_applys.th_id','=',$th_id)->get();
        // return $sellers;
        
        $booths = DB::table('booths')->where('booth_name','=',$booth_name)->where('user_name','=',$user_name['email'])->get();


        // $goods = DB::table('goods_applys')
        //     ->join('goods', 'goods.id', '=', 'goods_applys.goods_id')
        //     ->join('seller_applys', 'goods_applys.user_id', '=', 'seller_applys.user_id')
        //     ->select('goods.name', 'goods.category','seller_applys.user_id','goods_applys.price')
        //     ->get();
            
        $goods = DB::select('select i.filename,g.name,g.category,sa.user_id,ga.price from images i,goods_applys ga, goods g,seller_applys sa where i.goods_id = g.id and g.id = ga.goods_id and sa.user_id = ga.user_id and sa.th_id = ga.th_id;');
        
        // $myshop_id = DB::table('myshops')->where('user_id','=',$user_name['id'])->get();
        // $my_list = DB::table('goods')
        //     ->join('images', 'goods.id', '=', 'images.goods_id')
        //     ->select('goods.id','goods.name','goods.myshop_id','images.filename','images.id as image_id')
        //     ->where('myshop_id','=',$myshop_id[0]->id)->get();


        $terms = DB::table('users')
            ->join('myshops', 'users.id', '=', 'myshops.user_id')
            ->join('seller_applys', 'users.id', '=', 'seller_applys.user_id')
            ->select('users.id', 'users.age','seller_applys.category','myshops.max_sellpoint','myshops.min_sellpoint','myshops.join_count')->get();
        
        $terms2Q = DB::table('survey_examples')
                    ->join('survey_quastions','survey_quastions.id','=','survey_examples.parent_id')
                    ->select('survey_quastions.id','survey_quastions.text')->distinct('survey_quastions.id')
                    ->where('survey_quastions.th_id','=',$th_id)->get();
        $terms2E = DB::table('survey_examples')
                    ->join('survey_quastions','survey_quastions.id','=','survey_examples.table_id')
                    ->select('survey_examples.parent_id','survey_quastions.id','survey_quastions.text')
                    ->where('survey_quastions.th_id','=',$th_id)->get();
        
        $seller_answers = DB::table('survey_answers')->where('th_id','=',$th_id)->get();
        
        $user_mail = $user_name['email'];
        
        //return $goods;
        
        return view('contents.flea.flea_seller_set')
            ->with('booths',$booths)->with('sellers',$sellers)
             ->with('goods',$goods)->with('termes',$terms)->with('user',$user_name)->with('mail',$user_mail)
             ->with('booth_name',$booth_name)->with('th_id',$th_id)->with('terms2Q', $terms2Q)->with('terms2E', $terms2E)
             ->with('seller_answers',$seller_answers);
    }

    // 새 그룹 생성시에 저장하는 구문
    function newSave(Request $req){
        $planList = $req->get('plan_text');
        $user_name = $req->session()->get('user');
        $user_name = $req->get('id');

//        DB::table('block_plan')->insert(
//            array('plan_name' => $planList, 'user_id' => $user_name['id'])
//        );
        DB::insert('insert into block_plans (plan_name, user_id,created_at,updated_at) values (?, ?,?,?)',
            array($planList, $user_name,date("Y-m-d H:i:s"),date("Y-m-d H:i:s")));
            
        $block_plan = DB::table('block_plans')->where('plan_name','=',$planList)->where('user_id','=',$user_name)->get();

        $result = $block_plan;
        $callback = $req->input('callback');
        echo $callback."(".json_encode($result).")";

        return;
    }

    //부스를 저장하는 구문
   function boothSave(Request $req){
        $user = $req->session()->get('user');
        $user_name = $req->get('user_name');
        $booth_name = $req->get('booth_name');
        $t_top = $req->get('t_top');
        $t_left = $req->get('t_left');
        Session::put('booth_name',$booth_name);

        DB::table('booths')->where('user_name','=',$user_name)->where('booth_name','=',$booth_name)->delete();

        $boothArr = $req->input('boothArr');
        $boothtype = $req->input('boothType');
        for($count = 0, $len = count($boothArr); $count < $len ; $count++){
            $booths = new Booth;
            for($count2 = 0, $len2 = count($boothArr[$count]); $count2 < $len2 ; $count2++){
                $booths->top       = floor($boothArr[$count]['top']-$t_top);
                $booths->left       = floor($boothArr[$count]['left']-$t_left);
                $booths->width      = $boothArr[$count]['width'];
                $booths->height      = $boothArr[$count]['height'];
                $booths->booth_name   = $booth_name;
                $booths->user_name   = $user_name;
                $booths->type       = $boothtype[$count]['type'];
                $booths->value      = $boothtype[$count]['text'];

                $booths->save();
            }
        }
        $result = $req->input('boothArr');
        $callback = $req->input('callback');
        echo $callback."(".json_encode($result).")";

        return;
   }

   function sellerSave(Request $req){
        $boothArr = $req->input('boothArr');
        //$user_name = $req->get('user_name');
        $user_name = $req->input('user_mail');
        $booth_name = $req->input('booth_name');
        $th_id = $req->input('th_id');

        $booths = DB::table('booths')->where('booth_name','=',$booth_name)->where('user_name','=',$user_name)->get();
        //$booths = preg_replace('/\\\u([0-9a-f]+)/', '&#x$1;', $booths);

        for($i = 0, $len = count($boothArr); $i < $len ; $i++){
            if($boothArr[$i]['id'] == $booths[$i]->id){
                if($boothArr[$i]['seller'] != 'null'){
                    DB::table('booths')
                        ->where('id','=',$boothArr[$i]['id'])
                        ->update(array('user_id' => $boothArr[$i]['seller']));
                }
                else {
                    DB::table('booths')
                        ->where('id','=',$boothArr[$i]['id'])
                        ->update(array('user_id' => null));
                }
            }
        }
        
        // return $user = $req->session()->get('user');
        // $user_id = $req->session()->get('user')->id;
        $recommendInfo = DB::table('recommend_infos')/*->where('buyer_id','=',$user_id)*/->get();
        $booth = DB::table('booths')->where('booth_name','=','영진')->get();
        
        $pickOutCategory = array();
        $settedSeller = DB::table('myshops')->join('users','users.id','=','myshops.user_id')
                                            ->join('goods','goods.myshop_id','=','myshops.id')
                                            ->join('goods_applys','goods.id','=','goods_applys.goods_id')
    	                                    ->select('goods.category','users.id as user_id',
    	                                             'myshops.id as myshop_id','goods_applys.th_id')->get();
        
        $applySeller = array();
        for($i = 0; $i < count($boothArr);$i++){
            for($j = 0; $j < count($settedSeller);$j++){
                if($boothArr[$i]['seller'] == $settedSeller[$j]->user_id){
                    $applySeller[$i] = $settedSeller[$j];
                }
            }
        }
        
        // return $applySeller;
        
        // for($i = 0, $count1 = 0, $length = count($recommendInfo); $i < $length; $i++){
            
        //     for($j = 0; $j < count($applySeller); $j++){
        //         if($recommendInfo[$i]->main_use_buy_category == $applySeller[$j]->category){
        //             $pickOutCategory["user_".$recommendInfo[$i]->buyer_id][$count1] = array(
        //                 "seller_id" =>$applySeller[$j]->user_id,
        //                 "category"  =>$applySeller[$j]->category,
        //                 "myshop_id"  =>$applySeller[$j]->myshop_id,
        //                 "th_id"  =>$th_id,
        //                 "modified_date" => date('Y-m-d H:i:s')
        //             );
        //             $count1++;
        //         }    
        //     }
        //     $count1 = 0;
        // }
        
        // // return $settedSeller;
        // // return $pickOutCategory;
        // foreach($pickOutCategory as $key => $value){
        //     $count = 0;
        //     if(!file_exists("user_recommend/alarm_user_".explode('_',$key)[1].".json")){
        //         $json = array(
        //             $key => array($value[0])
        //         );
        //     }else{
        //         $json = json_decode( file_get_contents("user_recommend/alarm_user_".explode('_',$key)[1].".json"),true);
        //         // return $json['user_5'];
        //         for($i = 0; $i < count($json[$key]); $i++){
        //             $json[$key][$i]['modified_date'] = date('Y-m-d H:i:s');
        //         }
        //         array_push($json[$key],$value[0]);
        //         unlink("user_recommend/alarm_user_".explode('_',$key)[1].".json");
        //     }
        //     file_put_contents("user_recommend/alarm_user_".explode('_',$key)[1].".json", json_encode($json));
        //     // return $value;
        // }
        
        // return $pickOutCategory;
        // return $recommendInfo;
        // return $booth;
        
        $result = "success";
        $callback = $req->input('callback');
        echo $callback."(".json_encode($result).")";
        
        // $result = $pickOutCategory;
        // $callback = $req->input('callback');
        // echo $callback."(".json_encode($result).")";
    }

    // 수정 맞게 해야됨
   function planList(Request $req){
        $flea_id = Session::get('flea_id');
        $flea_th = Session::get('flea_th');

        $user_name = $req->session()->get('user');
        $user_id = $user_name['id'];
        $plan = DB::table('block_plans')->where('user_id','=',$user_id)->get();

        return view('contents/flea/flea_plan_list')->with('user_plans',$plan)->with('user_info',$user_name)->with('user',$user_name)
            ->with('flea_id',$flea_id)->with('flea_th',$flea_th);
    }

//    function setPlan(Request $req){
//	    $flea_id = $req->get('flea_id');
//	    $flea_th = $req->get('flea_th');
//	    $flea_th = 2;
//
////        DB::table('flea_ths')
////            ->where('flea_id','=',$flea_id)
////            ->where('th','=',$flea_th)
////            ->update(['block_plan' => 2]);
////
////        $result = $req->input('flea_id');
////        $callback = $req->input('callback');
////        echo $callback."(".json_encode($result).")";
////
////        return;
//    }
    
    // 배치도 삭제
    function delPlan(Request $req){
        $plan_text = $req->get('plan_text');
        $user_id = $req->get('id');

        DB::table('block_plans')->where('plan_name', '=', $plan_text)->
        where('user_id', '=', $user_id)->delete();

        $result = $req->input('boothArr');
        $callback = $req->input('callback');
        echo $callback."(".json_encode($result).")";

        return;
    }

    function areaSet(Request $req, $booth_name, $th_id){
        
        $userId = Session::get('user')['id'];
        $userEmail = Session::get('user')['email'];
        $booth_name = $booth_name;
        // return $userId;
        // return $booth_name;
        $boothInfo = DB::table('booths')->join('block_plans','booths.booth_name','=','block_plans.plan_name')
    	                                ->select('booths.id','booths.user_name','booths.user_id','booths.top','booths.left','booths.width','booths.height','booths.type')
    	                                ->where('block_plans.user_id','=',$userId)->where('block_plans.plan_name','=',$booth_name)->where('booths.user_name','=',$userEmail)->get();
    	                                
        // return $boothInfo;
        
        return view('contents.flea.booth_area_set')
            ->with('boothInfo',$boothInfo)->with('booth_name',$booth_name)
            ->with('th_id',$th_id);
    }
    
    function categorySave(Request $req){
        $boothArr = $req->input('boothArr');
        $boothInfo = DB::table('booths')->get();
        $boothModel = new Booth;
        
        for($i = 0, $length1 = count($boothInfo); $i < $length1; $i++){
            for($j = 0, $length2 = count($boothArr); $j < $length2; $j++){
                // print_r($boothInfo[$i]->id);
                // print_r($boothArr[$j]);
                if($boothArr[$j]['booth_id'] == $boothInfo[$i]->id){
                    $boothFind = Booth::find($boothArr[$j]['booth_id']);
                    $boothFind->category = $boothArr[$j]['category'];
                    $boothFind->save();
                }
            }
        }
        
        $result = 'success';
        $callback = $req->input('callback');
        echo $callback."(".json_encode($result).")";
    }
}
?>