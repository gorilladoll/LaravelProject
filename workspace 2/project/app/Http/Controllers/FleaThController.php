<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\flea_th;
use Session;
use App\SurveyQuastion;
use App\SurveyExample;
use App\SurveyAnswer;

class FleaThController extends Controller
{
    function createFlea(Request $req,$flea){
        $user_id = $req->session()->get('user');
        $user_id = $user_id['id'];

        $group_name = $flea;

        $flea_data = DB::table('fleamarkets')->where('host_id','=',$user_id)->where('flea_name','=',$group_name)->get();
        $idNum = json_decode($flea_data, true);
        $flea_id = DB::table('flea_ths')->where('flea_id','=',$idNum[0]['id'])->count();
        $flea_id++;
        //return $flea_id;
        return view('contents.flea.flea_open')->with('flea_data',$flea_data)->with('user_id',$user_id)
                                              ->with('group_name',$group_name)->with('flea_id',$flea_id)
                                              ->with('flea_num',$flea_data[0]->id);
        //return $flea_data;
    }

    
    function newFleaBackup(Request $req){
        // return $user_id = $req->get('user_id');
        $start_date = $req->get('date_start');
        $end_date = $req->get('date_end');
        $start_time_hour = $req->get('start_time_hour');
        $start_time_min = $req->get('start_time_min');
        $stop_time_hour = $req->get('stop_time_hour');
        $stop_time_min = $req->get('stop_time_min');
        $category = $req->get('category');
        $entry_fee = $req->get('entry_fee');
        $booth_fee = $req->get('booth_fee');
        $com = $req->get('com');
        $text = $req->get('flea_text');

        $flea_id = (int)$req->get('flea_id');

        $time = $req->get('time_first');
        $apply_start = "$time";
        $time3 = $req->get('end_time_first');
        $apply_end = "$time3";

        $flea_th = $req->get('flea_th'); //현재 몇회차인지

        // 설문조사 등록된거 불러와서 배열화
        $surveyLength = $req->get('invoked_body_hidden');
        $surveyArr = array();
        for($i =0; $i < $surveyLength; $i++){
            $surveyArr[$i] = array();
            $exampleLength = $req->get('exampleLength_'.$i);
            $surveyArr[$i]['quastion'] = $req->get('quastion_'.$i);
            for($j = 1; $j <= $exampleLength; $j++){
                $surveyArr[$i][$j] = $req->get('example_'.$i.'_'.($j - 1));
            }
        }


        // return $surveyArr;
        

        // return $test = DB::table('goods')->limit(1)->orderBy('id','DESC')->get();


        $a = 0;
        for($i = 0, $length = count($surveyArr); $i < $length; $i++){
            $surveyQuastion = new SurveyQuastion;
            $surveyQuastion->th_id = $flea_th;
            $surveyQuastion->text = $surveyArr[$i]['quastion'];
            $surveyQuastion->save();
            $lastSurveyQ = DB::table('survey_quastions')->limit(1)->orderBy('id','DESC')->get();
            
            foreach($surveyArr[$i] as $key => $value){
            //  return $surveyArr[$i];
                if($key != "quastion"){
                    // return $key;
                    DB::insert('insert into survey_quastions(th_id, text, created_at, updated_at) values (?, ?,?,?)',
                    array($flea_th, $surveyArr[$i][$key], date("Y-m-d H:i:s"), date("Y-m-d H:i:s")));
                    $lastSurveyE = DB::table('survey_quastions')->limit(1)->orderBy('id','DESC')->get();
                    DB::insert('insert into survey_examples(table_id, parent_id, created_at, updated_at) values (?, ?,?,?)',
                    array($lastSurveyE[0]->id, $lastSurveyQ[0]->id, date("Y-m-d H:i:s"), date("Y-m-d H:i:s")));
                }
            }
        }

        $dateTest = date('h:i', strtotime($start_time_hour.":".$start_time_min));

        if(!$start_date || !$end_date || !$category || !$entry_fee || !$booth_fee || !$com || !$text ){
            echo "<script>alert('공백없이 입력해주세요!');
                    history.go(-1);</script>";
        }

        $FleaTh = new flea_th;

        $FleaTh->flea_id = $flea_id;
        $FleaTh->booth_quantity = 0;
        $FleaTh->start_year_month = date('Y-m',strtotime($start_date));
        $FleaTh->start_day = date('d',strtotime($start_date));
        $FleaTh->end_year_month = date('Y-m',strtotime($end_date));
        $FleaTh->end_day = date('d',strtotime($end_date));
        $FleaTh->start_time = date('h:i', strtotime($start_time_hour.":".$start_time_min));
        $FleaTh->end_time = date('h:i', strtotime($stop_time_hour.":".$stop_time_min));
        $FleaTh->entry_fee = $entry_fee;
        $FleaTh->booth_fee = $booth_fee;
        $FleaTh->commission = $com;

        $FleaTh->text = $text;
        $FleaTh->topic = $category;
        $FleaTh->th = $flea_th;
        $FleaTh->recruit_start_time = $apply_start;
        $FleaTh->recruit_end_time = $apply_end;
        $FleaTh->block_plan = 0;

        $FleaTh->save();



        //return redirect()->action('BoothController@planList', ['flea_id' => $flea_id,'flea_th' => $flea_th]);
        // echo "<script>alert('개최가 완료되었습니다.');
        //     location.href='/fleamarket/main';
        // </script>";
        // return 0;
        return redirect('/booth/open')->with('flea_th',$flea_th)->with('flea_id',$flea_id);
        //return $flea_id;
    }
    
     function newFlea(Request $req){
        // return $user_id = $req->get('user_id');
        $start_date = $req->get('date_start');
        $end_date = $req->get('date_end');
        $start_time_hour = $req->get('start_time_hour');
        $start_time_min = $req->get('start_time_min');
        $stop_time_hour = $req->get('stop_time_hour');
        $stop_time_min = $req->get('stop_time_min');
        $category = $req->get('category');
        $entry_fee = $req->get('entry_fee');
        $booth_fee = $req->get('booth_fee');
        $com = $req->get('com');
        $text = $req->get('flea_text');

        $flea_id = (int)$req->get('flea_id');

        $time = $req->get('time_first');
        $apply_start = "$time";
        $time3 = $req->get('end_time_first');
        $apply_end = "$time3";

        $flea_th = $req->get('flea_th'); //현재 몇회차인지

        // 설문조사 등록된거 불러와서 배열화
        $surveyLength = $req->get('invoked_body_hidden');
        $surveyArr = array();
        for($i =0; $i < $surveyLength; $i++){
            $surveyArr[$i] = array();
            $exampleLength = $req->get('exampleLength_'.$i);
            $surveyArr[$i]['quastion'] = $req->get('quastion_'.$i);
            for($j = 1; $j <= $exampleLength; $j++){
                $surveyArr[$i][$j] = $req->get('example_'.$i.'_'.($j - 1));
            }
        }

        
        // return $surveyArr;
        

        // return $test = DB::table('goods')->limit(1)->orderBy('id','DESC')->get();


        // $a = 0;
        

        $FleaTh = new flea_th;

        $FleaTh->flea_id = $flea_id;
        $FleaTh->booth_quantity = 0;
        $FleaTh->start_year_month = date('Y-m',strtotime($start_date));
        $FleaTh->start_day = date('d',strtotime($start_date));
        $FleaTh->end_year_month = date('Y-m',strtotime($end_date));
        $FleaTh->end_day = date('d',strtotime($end_date));
        $FleaTh->start_time = date('h:i', strtotime($start_time_hour.":".$start_time_min));
        $FleaTh->end_time = date('h:i', strtotime($stop_time_hour.":".$stop_time_min));
        $FleaTh->entry_fee = $entry_fee;
        $FleaTh->booth_fee = $booth_fee;
        $FleaTh->commission = $com;

        $FleaTh->text = $text;
        $FleaTh->topic = $category;
        $FleaTh->th = $flea_th;
        $FleaTh->recruit_start_time = $apply_start;
        $FleaTh->recruit_end_time = $apply_end;
        $FleaTh->block_plan = 0;

        $FleaTh->save();
        
        $flea_th_info = DB::table('flea_ths')->select('id')->limit(1)->orderBy('id','DESC')->get();
        
        for($i = 0, $length = count($surveyArr); $i < $length; $i++){
            $surveyQuastion = new SurveyQuastion;
            // $surveyQuastion->th_id = $flea_th;
            $surveyQuastion->th_id = $flea_th_info[0]->id;
            $surveyQuastion->text = $surveyArr[$i]['quastion'];
            $surveyQuastion->save();
            $lastSurveyQ = DB::table('survey_quastions')->limit(1)->orderBy('id','DESC')->get();
            
            foreach($surveyArr[$i] as $key => $value){
            //  return $surveyArr[$i];
                if($key != "quastion"){
                    // return $key;
                    DB::insert('insert into survey_quastions(th_id, text, created_at, updated_at) values (?,?,?,?)',
                    array($flea_th_info[0]->id, $surveyArr[$i][$key], date("Y-m-d H:i:s"), date("Y-m-d H:i:s")));
                    $lastSurveyE = DB::table('survey_quastions')->limit(1)->orderBy('id','DESC')->get();
                    DB::insert('insert into survey_examples(table_id, parent_id, created_at, updated_at) values (?,?,?,?)',
                    array($lastSurveyE[0]->id, $lastSurveyQ[0]->id, date("Y-m-d H:i:s"), date("Y-m-d H:i:s")));
                }
            }
        }

        // $dateTest = date('h:i', strtotime($start_time_hour.":".$start_time_min));

        // if(!$start_date || !$end_date || !$category || !$entry_fee || !$booth_fee || !$com || !$text ){
        //     echo "<script>alert('공백없이 입력해주세요!');
        //             history.go(-1);</script>";
        // }
        

        //return redirect()->action('BoothController@planList', ['flea_id' => $flea_id,'flea_th' => $flea_th]);
        // echo "<script>alert('개최가 완료되었습니다.');
        //     location.href='/fleamarket/main';
        // </script>";
        // return 0;
        
        // $flea_id = Session::get('flea_id');
        // $flea_th = Session::get('flea_th');

        // $user_name = $req->session()->get('user');
        // $user_id = $user_name['id'];
        // $plan = DB::table('block_plans')->where('user_id','=',$user_id)->get();

        // return view('contents/flea/flea_plan_list')->with('user_plans',$plan)->with('user_info',$user_name)->with('user',$user_name)
        //     ->with('flea_id',$flea_id)->with('flea_th',$flea_th);
        
        // $result = array(
        //     'user_plans' => $plan,
        //     'user_info' => $user_name,
        //     'user' => $user_name,
        //     'flea_id' => $flea_id,
        //     'flea_th' => $flea_th
        // );
        
        // $result = "success";
        // $callback = $req->input('callback');
        // echo $callback."(".json_encode($result).")";
        
        return redirect('/booth/open')->with('flea_th',$flea_th)->with('flea_id',$flea_id);
        //return $flea_id;
        return;
    }

    function viewFleaTh(Request $req,$flea_id){
        $user_id = $req->session()->get('user');
        $user_id = $user_id['id'];
        
        //판매자 신청을 이미 했는지 확인
        $applys = DB::table('seller_applys')->where('user_id','=',$user_id)->where('th_id','=',$flea_id)->count();
        
        //$flea_id 는 flea_ths 의 id값
        $flea = DB::table('flea_ths')->where('id','=',$flea_id)->get();
        $fleamarkets = DB::table('fleamarkets')->where('id','=',$flea[0]->flea_id)->get();
        $flea_user = DB::table('users')->where('id','=',$fleamarkets[0]->host_id)->get();

        $booth_name = DB::table('block_plans')->where('id','=',$flea[0]->block_plan)->get();

        $booth_name =  preg_replace('/\\\u([0-9a-f]+)/', '&#x$1;', $booth_name[0]->plan_name);

        $booths_join = DB::table('booths')
            ->join('users','users.id','=','booths.user_id')
            ->select('booth_name','user_name','top','left','width','height','user_id','type','value','category','name')
            ->where('booth_name','=',$booth_name)
            ->where('user_name','=',$flea_user[0]->email)
            ->get();

        $booths_join2 = DB::table('booths')->where('booth_name','=',$booth_name)->where('user_name','=',$flea_user[0]->email)->where('user_id','=',NULL)->get();
        

            // 배치된 판매자가 없을 경우 기본꺼 배치
        // if($booths_join < 1){
        //     $booths_join = DB::table('booths')->where('booth_name','=',$booth_name)->where('user_name','=',$flea_user[0]->email)->get();
        // } else {

        // }
        
        
        // 플리마켓,회차별 플리마켓 정보
        $flea_th = DB::table('flea_ths')->where('id','=',$flea_id)->get();
        $flea = DB::table('fleamarkets')->where('id','=',$flea_th[0]->flea_id)->get();

        //코멘트
        $comments = DB::table('comments')->where('flea_th_id','=',$flea_th[0]->id)->get();
        $comments = DB::table('comments')
           ->join('users', 'users.id', '=', 'comments.user_id')
           ->select('users.id as user_id','users.name','comments.id','comments.text','comments.date')->where('flea_th_id','=',$flea_th[0]->id)->get();

        //$booths_join = preg_replace('/\\\u([0-9a-f]+)/', '&#x$1;', $booths_join);

        $booths_user = DB::table('users')->get();

        // 조인 후 값 가져오기.
        // booths 테이블+유저 이름
        //return $booths_join2;
        //return view('contents.flea.flea_page')->with('booths',$booths);
        // return view('contents.test')->with('flea_th',$flea_th)->with('flea',$flea)->with('user_id',$user_id)
        //                                       ->with('comments',$comments)->with('booths',$booths_join)
        //                                       ->with('users',$booths_user)->with('flea_info',$fleamarkets)->with('booth_name',$booth_name)->with('applys',$applys)
        //                                       ->with('booths2',$booths_join2);
        return view('contents.flea.flea_page')->with('flea_th',$flea_th)->with('flea',$flea)->with('user_id',$user_id)
                                              ->with('comments',$comments)->with('booths',$booths_join)
                                              ->with('users',$booths_user)->with('flea_info',$fleamarkets)->with('booth_name',$booth_name)->with('applys',$applys)
                                              ->with('booths2',$booths_join2);
    }

    function ViewFleamarkets(Request $req){
        $fleamarketInfo = DB::table('fleamarkets')->join('flea_ths','flea_ths.flea_id','=','fleamarkets.id')
        ->select('fleamarkets.flea_name','flea_ths.id','flea_ths.th','flea_ths.start_year_month','flea_ths.start_day','flea_ths.start_time',
        'flea_ths.end_time','fleamarkets.image_name','fleamarkets.location','flea_ths.text')->orderBy('flea_ths.id', 'desc')->paginate(8);
        
        $user_id = $req->session()->get('user');
        $host_id = $user_id['id'];
        $list = DB::table('fleamarkets')->where('host_id','=',$host_id)->get();
        // return view('contents/flea/flea_group_list')->with('lists',$list)->with('user_id',$host_id);

        return view('contents.flea.flea_main')->with('fleamarketInfo',$fleamarketInfo)->with('lists',$list)->with('user_id',$host_id);
        //return $fleamarketInfo;
    }

    function commentInsert(Request $req){
        $user_id = $req->get('user_id');
        $flea_id = $req->get('flea_id');
        $text = $req->get('text');
        //$text = nl2br($text);
        $date = date("Y-m-d H:i:s");

//        $text = htmlspecialchars($text, ENT_QUOTES);
//        $text = str_replace("\r\n","<br/>",$text); //줄바꿈 처리
//        $text = str_replace("\u0020","&nbsp;",$text); // 스페이스바 처리


        DB::insert('insert into comments (flea_th_id, user_id,text,date) values (?, ?, ?, ?)', array($flea_id, $user_id,$text, $date));

        $result = $req->input('text');
        $callback = $req->input('callback');
        echo $callback."(".json_encode($result).")";

        return;
    }

    function commentDel(Request $req){
        $user_id = $req->get('user_id');
        $flea_id = $req->get('flea_id');
        $com_id = $req->get('com_id');

        DB::table('comments')->where('flea_th_id', '=', $flea_id)->where('user_id', '=', $user_id)
            ->where('id', '=', $com_id)->delete();

        $result = $req->input('com_id');
        $callback = $req->input('callback');
        echo $callback."(".json_encode($result).")";

        return;
    }
    
    // 판매자 신청
    function sellerApplyView(Request $req,$th){
        $user = Session::get('user');
        $flea_th = $th;
        
        $myshop_id = DB::table('myshops')->where('user_id','=',$user['id'])->count();
        //echo $myshop_id;
        if($myshop_id == 0){
            echo "<script>alert('마이샵을 생성해 주세요!');
                    history.go(-1);</script>";
        }
        
        $surveyQ = DB::table('survey_examples')
                    ->join('survey_quastions','survey_quastions.id','=','survey_examples.parent_id')
                    ->select('survey_quastions.id','survey_quastions.text')->distinct('survey_quastions.id')
                    ->where('survey_quastions.th_id','=',$th)->get();
        $surveyE = DB::table('survey_examples')
                    ->join('survey_quastions','survey_quastions.id','=','survey_examples.table_id')
                    ->select('survey_examples.parent_id','survey_quastions.id','survey_quastions.text')
                    ->where('survey_quastions.th_id','=',$th)->get();

        //myshops 에서 user id를 가져와서 my_list에 where에 유저 id값을 비교해서 맞는 걸 가져와야 함
        $myshop_id = DB::table('myshops')->where('user_id','=',$user['id'])->get();

        $my_list = DB::table('goods')
            ->join('images', 'goods.id', '=', 'images.goods_id')
            ->select('goods.id','goods.name','goods.myshop_id','images.filename','images.id as image_id')
            ->where('myshop_id','=',$myshop_id[0]->id)->get();

        //return $my_list;
        //return
        return view('contents.flea.flea_apply')->with('my_lists',$my_list)
                ->with('surveyQ',$surveyQ)->with('surveyE',$surveyE)
                ->with('user_id',$user['id'])->with('flea_th',$flea_th);
    }
    
    //판매자 신청 저장
    function applysSave(Request $req){
        $b_name = $req->get('b_name'); //부스 네임
        $b_category = $req->get('b_category'); //카테고리
        $b_date1 = $req->get('b_date1'); //희망날짜1
        $b_date2 = $req->get('b_date2'); //희망날짜2
        $user_id  = $req->get('user_id'); //유저 id
        $flea_th = $req->get('flea_th');  //플리 id
        $goods_arr = $req->get('goods_arr'); //굿즈 arr
        $surveyArr = $req->get('surveyArr');
        
        // 이전 정보 삭제
        DB::table('goods_applys')->where('th_id', '=', $flea_th)->where('user_id', '=', $user_id)->delete();
        DB::table('seller_applys')->where('th_id', '=', $flea_th)->where('user_id', '=', $user_id)->delete();
        DB::table('survey_answers')->where('th_id', '=', $flea_th)->where('user_id', '=', $user_id)->delete();

        // survey answer 저장
        for($i = 0; $i < count($surveyArr); $i++){
            DB::insert('insert into survey_answers (th_id, user_id, q_id, answer_id,created_at, updated_at) values (?, ?, ?, ?, ?, ?)',
                array($flea_th,$user_id,$surveyArr[$i]['q_id'],$surveyArr[$i]['e_id'],date("Y-m-d H:i:s"),date("Y-m-d H:i:s")));
        }

        // DB에 굿즈 정보 저장
        for($i = 0; $i < count($goods_arr); $i++){
            DB::insert('insert into goods_applys (th_id, goods_id,user_id,sales,price,quantity) values (?, ?, ?, ?, ?, ?)',
                array($flea_th, $goods_arr[$i]['goods_id'],$user_id, 0,$goods_arr[$i]['price'],$goods_arr[$i]['quantity']));
        }
        
        // 판매자 신청
        DB::insert('insert into seller_applys (th_id, user_id,accept,booth_name,category,start_day,end_day) values (?, ?, ?, ?, ?, ?, ?)',
            array($flea_th, $user_id,0,$b_name, $b_category,$b_date1,$b_date2));
        
        $result = $req->input('flea_th');
        $callback = $req->input('callback');
        echo $callback."(".json_encode($goods_arr).")";

    }
}
