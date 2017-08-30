<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Myshop;
use App\Board;
use App\Image;
use App\Goods;

class BoardController extends Controller
{
    //
    private $user;
    private $myshop;
    private $board;
    private $image;
    private $goods;

    public function __construct(){
      $this->user = new User();
      $this->myshop = new Myshop();
      $this->board = new Board();
      $this->image = new Image();
      $this->goods = new Goods();
    }

    public function create(Request $request){
      $user = $this->user->where('name',$request->session()->get('login'))->get();
      $user_id = $user[0]['id'];
      $myshop = $this->myshop->where('user_id',$user_id)->get();
      $myshop_id = $myshop[0]['id'];
      $content = $request->input('input_write');
      $picture = $request->file('img_upload');
      $pic_count = count($picture);

      if(isset($content)){
        $board = $this->board->create([
          'content' => $content,
          'user_id' => $user_id,
          'myshop_id' => $myshop_id
        ]);
        if($pic_count != 0 && $board){
          for($i = 0;$i < $pic_count;$i++){
            $picture_name = date("Y-m-d(H_i_s)").'_'.$picture[$i]->getClientOriginalName();
            if($picture[$i]->getClientOriginalExtension() == "jpg" || $picture[$i]->getClientOriginalExtension() == "png" ||
               $picture[$i]->getClientOriginalExtension() == "jpeg")
               {
                $result = $picture[$i]->move(storage_path('app/images'),$picture_name);
                if($result){
                  $image = $this->image->create([
                    'image_category' => "timeline",
                    'filename' => $picture_name,
                    'board_id' => $board->id,
                  ]);
                }
              }
            }
          }
        return redirect('/mylab/show');
      }
      else {
        return redirect('/mylab/show');
      }
    }

    public function createGoods(Request $reuqest){
      $name = $request->input('name');
      $category = $request->input('category');
      $user = $request->session()->get('login');
      $user_id = $this->user->where('name',$user);
      $myshop = $this->myshop->where('user_id',$user_id[0]['id']);
      $myshop_id = $myshop[0]['id'];
      $pictures = $request->file('img_upload');
      $pictures_count = count($pictures);

      if($pictures_count != 0){
        for($i = 0;$i < $pic_count;$i++){
          $picture_name = date("Y-m-d(H_i_s)").'_'.$picture[$i]->getClientOriginalName();
          if($picture[$i]->getClientOriginalExtension() == "jpg" || $picture[$i]->getClientOriginalExtension() == "png" ||
             $picture[$i]->getClientOriginalExtension() == "jpeg" || $picture[$i]->getClientOriginalExtension() == "gif")
             {
              $result = $picture[$i]->move(storage_path('app/images'),$picture_name);
              if($result){
                $image = $this->image->create([
                  'image_category' => $category_parent,
                  'filename' => $picture_name,
                  'user_id' => $user_id,
                ]);
              }
            }
          }
          if($category_parent == "made"){
            $goods = $this->goods->create([
              'name' => $content,
              'myshop_id' => $myshop_id,
              'image_id' => $image->id
              // 'category_id' =>
            ]);
          }
        }
      }

    // public function repley(Request $request){
    //   $board_id = $request->input('board_id');
    //   $content = $request->input('comment');
    //   $user_id = $this->user->where('name',$request->session()->get('login'));
    //   $myshop_id = $this->myshop->where('user_id',$user_id[0]);
    //
    //   if(isset($content)){
    //     Board::create([
    //       'content' => 'content',
    //       'user_id' => $user_id,
    //       'myshops_id' => $myshop_id,
    //       'board_id' => $board_id
    //     ]);
    //   } else {
    //     return redirect('/mylab/show');
    //   }
    // }


    public function goods(Request $request){
      $user = $request->session()->get('login');
      $user_info = $this->user->where('name',$user)->get();
      $myshop = $this->myshop->where('user_id',$user_info[0]['id'])->get();
      $goods = $this->goods->where('myshop_id',$myshop[0]['id'])->get();
      $category = $this->goods->select('category')->distinct()->get();
      $images = $this->image->get();


      return view('mylab/contents/lab/goods')->with([
        'user' => $user,
        'user_name' => $user_info[0],
        'goods' => $goods,
        'images' => $images,
        'category' => $category
      ]);
    }

    public function userGoods(Request $request,$user_id){
      $user = $request->session()->get('login');
      $user_name = $this->user->where('id',$user_id)->get();
      $myshop = $this->myshop->where('user_id',$user_name[0]['id'])->get();
      $goods = $this->goods->where('myshop_id',$myshop[0]['id'])->get();
      $category = $this->goods->select('category')->distinct()->where('myshop_id','=',$myshop[0]['id'])->get();
      $images = $this->image->get();


      return view('mylab/contents/lab/goods')->with([
        'user' => $user,
        'user_name' => $user_name[0],
        'goods' => $goods,
        'images' => $images,
        'category' => $category
      ]);
    }

    public function follow(Request $request){
      $user = $request->session()->get('login');
      $user_name = $this->user->where('name',$user)->get();
      $new_friends = $this->user->inRandomOrder()->take(5)->where('name','<>',$user)->get();
      $subscription_timelines = DB::table('boards')->select('myshops.lab_name','boards.id','boards.updated_at','boards.content')
                                ->join('myshops','myshops.id','=','boards.myshop_id')
                                ->join('subscriptions','subscriptions.myshop_id','=','myshops.id')
                                ->where('subscriptions.user_id','=',$user_name[0]['id'])->orderby('boards.id','desc')->get();
      $images = $this->image->get();
      return view('/mylab/contents/lab/lab_follow')->with([
        'user' => $user,
        'user_name' => $user_name[0],
        'new_friends' => $new_friends,
        'subscription_timelines' => $subscription_timelines,
        'images' => $images
      ]);
    }

    public function userFollow(Request $request,$user_id){
      $user = $request->session()->get('login');
      $user_name = $this->user->where('id',$user_id)->get();
      $new_friends = $this->user->inRandomOrder()->take(5)->where('name','<>',$user)->get();
      $subscription_timelines = DB::table('boards')->select('myshops.title','boards.id','boards.updated_at','boards.content')
                                ->join('myshops','myshops.id','=','boards.myshop_id')
                                ->join('subscriptions','subscriptions.myshop_id','=','myshops.id')
                                ->where('subscriptions.user_id','=',$user_name[0]['id'])->orderby('boards.id','desc')->get();
      $images = $this->image->get();
      return view('/mylab/contents/lab/lab_follow')->with([
        'user' => $user,
        'user_name' => $user_name[0],
        'new_friends' => $new_friends,
        'subscription_timelines' => $subscription_timelines,
        'images' => $images
      ]);
    }
}
