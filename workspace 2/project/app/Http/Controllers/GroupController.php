<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Fleamarket;

class GroupController extends Controller
{
    function SaveGroup(Request $req){
        $name = $req->get('flea_name');
        $text = $req->get('text');
        $img = $req->file('img_file')->getClientOriginalName();

        $location = $req->get('location');
        $location_get = $req->get('location_get');
        $location_1 = $req->get('location_1');
        $location_2 = $req->get('location_2');

        $user_id = $req->session()->get('user');
        $user_id = $user_id['id'];

        $time = time();
        $imageName = $time.'_'.$req->file('img_file')->getClientOriginalName();

        if(!$name){
            echo "<script>alert('플리마켓 이름을 입력해주세요!');
                    history.go(-1);</script>";
        }
        if(!$text){
            echo "<script>alert('설명을 입력해주세요!');
                    history.go(-1);</script>";
        }
        if(!$img){
            echo "<script>alert('이미지를 첨부해주세요!');
                    history.go(-1);</script>";
        }
        if(!$location){
            echo "<script>alert('지역을 입력해주세요!');
                    history.go(-1);</script>";
        }
        if(!$location_get){
            echo "<script>alert('지도에 위치를 입력해주세요!');
                    history.go(-1);</script>";
        }

        if ($req->hasFile('img_file')) {
            if($req->file('img_file')->isValid()) {
                try {
                    $req->img_file->move(public_path('user_img'), $imageName);
                } catch (Illuminate\Filesystem\FileNotFoundException $e) {
                    echo 'error';
                }
            }
        }

        $Fleamarkets = new Fleamarket;

        $Fleamarkets->host_id = $user_id;
        $Fleamarkets->explain = $text;
        $Fleamarkets->flea_name = $name;
        $Fleamarkets->image_name = $imageName;
        $Fleamarkets->location = $location;
        $Fleamarkets->address = $location_get;
        $Fleamarkets->coordinate1 = $location_1;
        $Fleamarkets->coordinate2 = $location_2;

        $Fleamarkets->save();

        $list = DB::table('fleamarkets')->where('host_id','=',$user_id)->get();

        $user_id = $req->session()->get('user');
        $host_id = $user_id['id'];
        
        echo "<script>alert('그룹 생성이 완료되었습니다.');
                    location.href='/fleamarket/main';</script>";

        // return view('contents/flea/flea_group_list')->with('lists',$list)->with('user_id',$host_id);
    }

    function GroupList(Request $req){

        $user_id = $req->session()->get('user');
        $host_id = $user_id['id'];
        $list = DB::table('fleamarkets')->where('host_id','=',$host_id)->get();
        return view('contents/flea/flea_group_list')->with('lists',$list)->with('user_id',$host_id);
    }

    function delGroup(Request $req){
        $group_name = $req->get('group_name');
        $user_id = $req->get('user_id');

        DB::table('fleamarkets')->where('flea_name', '=', $group_name)->where('host_id', '=', $user_id)->delete();

        $result = $req->input('group_name');
        $callback = $req->input('callback');
        echo $callback."(".json_encode($result).")";

        return;
    }

    function flea_open(Request $req){

    }
}
