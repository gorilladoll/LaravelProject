<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
//use facades and request helpers

use Session;
use App\Myshop;
use App\User;
use App\Board;
use App\Goods;
use App\Image;
use App\Subscription;
//use for databases;

class MylabController extends Controller
{
    //
    private $myshop;
    private $user;
    private $board;
    private $goods;
    private $image;
    private $subscription;
    //use for databases;
    

    public function __construct(){
      $this->user = new User();
      $this->myshop = new Myshop();
      $this->board = new Board();
      $this->goods = new Goods();
      $this->image = new Image();
      $this->subscription = new Subscription();
      //use for privates;
    }
    
    public function setAttribute(Request $request){
      $user = $request->session()->get('user');
      $myshop = $this->myshop->where('user_id',$user['id'])->get();

      if(isset($myshop[0]) && $user['id'] == 7){
        return view("/mylab/contents/lab/test3_lab");
      }

      else if(isset($myshop[0]) && $user['id'] != 7){
        return redirect("/mylab/show");
      }

      else {
        return view("/mylab/create/mylab_create")->with([
          'user' => $user['name'],
          'user_name' => $user,
        ]);
      }
    }

    public function createMyshop(Request $request){
      $user = $request->session()->get('user');

      $this->myshop->lab_name       = $request->input('lab_name');
      $this->myshop->background_img = $request->input('background_img');
      $this->myshop->left_img       = $request->input('left_img');
      $this->myshop->center_img     = $request->input('center_img');
      $this->myshop->right_img      = $request->input('right_img');
      $this->myshop->font_style     = $request->input('font_style');
      $this->myshop->font_size      = $request->input('font_size');
      $this->myshop->font_color     = $request->input('font_color');
      $this->myshop->font_weight    = $request->input('font_weight');
      $this->myshop->user_id        = $user['id'];

      $success = $this->myshop->save();
      if($success){
        return "공방 생성이 완료되었습니다.";
      }
    }

    public function show(Request $request){
      $user = $request->session()->get('user');

      $myshop = $this->myshop->where('user_id',$user['id'])->get();
      $goods = $this->goods->where('myshop_id',$myshop[0]['id'])->get();

      $timeline_content = $this->board->where('myshop_id',$myshop[0]['id'])->orderby('id','desc')->get();

      $timeline_image = $this->image->where('image_category','timeline')->orderby('id','desc')->get();
      $goods_images = DB::table('goods')->select('images.filename')
                      ->join('myshops','myshops.id','=','goods.myshop_id')
                      ->join('images','images.goods_id','=','goods.id')
                      ->where([['goods.myshop_id',$myshop[0]['id']],['images.image_category','goods']])
                      ->orderby('images.id','desc')->get();

      $subscriptions = DB::table('myshops')->select('users.id','myshops.lab_name','users.name')
                       ->join('subscriptions','myshops.id','=','subscriptions.myshop_id')
                       ->join('users','users.id','=','myshops.user_id')
                       ->where('subscriptions.user_id','=',$user['id'])->get();
      //get datas that connected mylab

      return view("mylab/contents/lab/lab")->with([
        'user' => $user['name'],
        'user_name' => $user,
        'myshop'  => $myshop[0],
        'timeline_contents' => $timeline_content,
        'timeline_images' => $timeline_image,
        'subscriptions' => $subscriptions,
        'goods_image' => $goods_images,
      ]);
    }

    public function userShow(Request $request,$user_id){
      $user = $request->session()->get('user');
      $user_name = $this->user->where('id',$user_id)->get();

      $myshop = $this->myshop->where('user_id',$user_name[0]['id'])->get();
      $goods = $this->goods->where('myshop_id',$myshop[0]['id'])->get();

      $timeline_content = $this->board->where('myshop_id',$myshop[0]['id'])->orderby('id','desc')->get();

      $timeline_image = $this->image->where('image_category','timeline')->orderby('id','desc')->get();
      $goods_images = DB::table('goods')->select('images.filename')
                      ->join('myshops','myshops.id','=','goods.myshop_id')
                      ->join('images','images.goods_id','=','goods.id')
                      ->where([['goods.myshop_id',$myshop[0]['id']],['images.image_category','goods']])
                      ->orderby('images.id','desc')->get();

      $subscriptions = DB::table('myshops')->select('users.id','myshops.lab_name','users.name')
                       ->join('subscriptions','myshops.id','=','subscriptions.myshop_id')
                       ->join('users','users.id','=','myshops.user_id')
                       ->where('subscriptions.user_id','=',$user_name[0]['id'])->get();
      //get datas that connected mylab

      return view("mylab/contents/lab/lab")->with([
        'user' => $user,
        'user_name' => $user_name[0],
        'myshop'  => $myshop[0],
        'timeline_contents' => $timeline_content,
        'timeline_images' => $timeline_image,
        'subscriptions' => $subscriptions,
        'goods_image' => $goods_images,
      ]);
    }
    
    public function showAjaxData(Request $request){
      $user = $request->session()->get('user');
      $user_name = $this->user->where('id',$user->id)->get();
      $myshop = $this->myshop->where('user_id',$user_name[0]['id'])->get();
      
      return $myshop;
    }

    public function addGoods(Request $request){
    $user       = $request->session()->get('user');
    $user_id    = $this->user->where('name',$user['name'])->get();
    // 마이샵 테이블에 있는 유저아이디와 일치하는 마이샵 아이디를 가져와야함
    $myshop     = $this->myshop->where('user_id',$user_id[0]['id'])->get();
    $goods_name = $request->input('goods_name');        // 물품이름
    $category   = $request->input('category');          // 카테고리종류
    $img_file   = $request->file('goods_img_file');     // 이미지 이름

    // 쿼리빌더 goods 테이블에 값 넣기
    if(isset($goods_name) && isset($img_file)){
      $goods = $this->goods->create(
        [
          'name'        => $goods_name,
          'myshop_id'   => $myshop[0]['id'],
          'category'    => $category,
        ]
      );
      $picture_name = date("Y-m-d(H_i_s)").'_sell_'.$img_file->getClientOriginalName();
      if(($img_file->getClientOriginalExtension() == "jpg" || $img_file->getClientOriginalExtension() == "png" ||
         $img_file->getClientOriginalExtension() == "jpeg") && $goods)
         {
          $result = $img_file->move(storage_path('app/images'),$picture_name);
          if($result){
            $image = $this->image->create([
              'image_category' => 'goods',
              'filename' => $picture_name,
              'goods_id' => $goods->id,
            ]);
          }
        }
      }
    // 이전화면으로 돌아가기
    return redirect('/mylab/goods');
  }

    public function addFollow(Request $request,$user_id){
      $user_name = $request->session()->get('user');
      $user = $this->user->where('name',$user_name['name'])->get();
      //get data in mylab name = user name
      $myshop = $this->myshop->where('user_id',$user_id)->get();
      $myshop_id = $myshop[0]['id'];
      
      $subscriptions_reserch = $this->subscription->where([['user_id',$user[0]['id']],['myshop_id',$myshop_id]]);
      //for distinct check
      

      if($subscriptions_reserch != []){
        $this->subscription->create([
          'user_id' => $user[0]['id'],
          'myshop_id' => $myshop_id
        ]);
      }// insert data in subscriptions
      return redirect('/mylab/show');
    }
}
