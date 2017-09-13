<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
//저장을 위한 파사드
use App\User;
use App\Myshop;
use App\Board;
use App\Image;
use App\Goods;
use App\GoodsComment;
//데이터 베이스 사용을 위한 변수들

class BoardController extends Controller{
  
    private $user;
    private $myshop;
    private $board;
    private $image;
    private $goods;
    private $goods_comment;
    //데이터 베이스 사용을 위하여 선언
    
    public function __construct(){
      $this->user           = new User();
      $this->myshop         = new Myshop();
      $this->board          = new Board();
      $this->image          = new Image();
      $this->goods          = new Goods();
      $this->goodsComment   = new GoodsComment();
    }
    //board controller 시작 이후부터 데이터베이스가 만들어지도록 설정
    
    public function create(Request $request){
      $user_name = $request->session()->get('user');
      $user = $this->user->where('name',$user_name['name'])->get();
      $user_id = $user[0]['id'];
      //유저 아이디를 불러오는 부분
      
      $myshop = $this->myshop->where('user_id',$user_id)->get();
      $myshop_id = $myshop[0]['id'];
      //마이샵 아이디를 불러오는 부분
      
      $content = $request->input('input_write');
      $picture = $request->file('img_upload');
      $pic_count = count($picture);
      //게시판에 입력한 값 그리고 파일을 불러오는 부분

      if(isset($content)){
        $board = $this->board->create([
          'content' => $content,
          'user_id' => $user_id,
          'myshop_id' => $myshop_id
        ]);
        //내용이 있을경우 데이터베이스에 내용부터 저장
        if($pic_count != 0 && $board){          //이미지 파일이 있으며, 내용이 있어 데이터베이스에 저장 된 경우
          for($i = 0;$i < $pic_count;$i++){     //이미지 갯수만큼 반복시킴
            $picture_name = date("Y-m-d(H_i_s)").'_'.$picture[$i]->getClientOriginalName();
            if($picture[$i]->getClientOriginalExtension() == "jpg" || $picture[$i]->getClientOriginalExtension() == "png" ||
               $picture[$i]->getClientOriginalExtension() == "jpeg")
               {//이미지 파일이 JPG, PNG, JPEG일 경우만 데이터베이스에 저장
                $result = $picture[$i]->move(storage_path('app/images'),$picture_name);
                //이미지 파일을 스토리지에 저장시킴
                if($result){
                    //스토리지에 잘 들어갔을 경우 데이터베이스에 기록
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

    public function createGoods(Request $request){
      $name = $request->input('name');
      $category = $request->input('category');
      //입력 받은 카테고리와 물품 이름
      $user = $request->session()->get('login');
      $user_id = $this->user->where('name',$user);
      //유저 아이디를 불러오기 위한 부분
      $myshop = $this->myshop->where('user_id',$user_id[0]['id']);
      $myshop_id = $myshop[0]['id'];
      //마이샵 아이디를 불러오기 위한 부분
      $pictures = $request->file('img_upload');
      $pictures_count = count($pictures);
      //업로드한 물품 이미지 부분

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
          //게시판 이미지 업로드 부분과 동일
          
          
          if($category_parent == "made"){
            $goods = $this->goods->create([
              'name' => $content,
              'myshop_id' => $myshop_id,
              'image_id' => $image->id
              // 'category_id' =>
            ]);
          }
          //카테고리 관련하여 저장 시키는 부분
        }
      }


    public function goods(Request $request){
      $user = $request->session()->get('user');
      $user_info = $this->user->where('name',$user['name'])->get();
      //유저의 정보를 가져오는 부분
      
      $myshop = $this->myshop->where('user_id',$user_info[0]['id'])->get();
      //마이샵 정보를 가져오는 부분
      
      $goods = $this->goods->where('myshop_id',$myshop[0]['id'])->get();
      //상품 정보를 가져오는 부분
      
      $category = $this->goods->select('category')->distinct()->get();
      //카테고리를 가져오는 부분
      
      $images = $this->image->get();
      //이미지 전체를 가져오는 부분

      return view('mylab/contents/lab/goods')->with([
        'user' => $user['name'],
        'user_name' => $user_info[0],
        'goods' => $goods,
        'images' => $images,
        'category' => $category
      ]);
      //받아온 값들을 view에 전송
    }

    //user 부분을 제외하고 goods 코드와 완전 동일
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
      $user = $request->session()->get('user');
      $user_name = $this->user->where('name',$user['name'])->get();
      //현재 유저를 받아오는 부분
      $new_friends = $this->user->inRandomOrder()->take(5)->where('name','<>',$user['name'])->get();
      //유저를 랜덤으로 가져오는 부분
      $subscription_timelines = DB::table('boards')->select('myshops.lab_name','boards.id','boards.updated_at','boards.content')
                                ->join('myshops','myshops.id','=','boards.myshop_id')
                                ->join('subscriptions','subscriptions.myshop_id','=','myshops.id')
                                ->where('subscriptions.user_id','=',$user_name[0]['id'])->orderby('boards.id','desc')->get();
      //친구의 글을 가져오는 부분
      $images = $this->image->get();
      return view('/mylab/contents/lab/lab_follow')->with([
        'user' => $user['name'],
        'user_name' => $user_name[0],
        'new_friends' => $new_friends,
        'subscription_timelines' => $subscription_timelines,
        'images' => $images
      ]);
    }

    //follow메소드와 유저를 제외하고 모두 동일
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
    
    
    // 물품상세보기
    public function goodsDetail(Request $req){
      
        $goods_id   = $req->input('goods_id');
        $goods      = $this->goods->where('id', $goods_id)->get();
        $myshop     = $this->myshop->where('id', $goods[0]['myshop_id'])->get();
        $username   = $this->user->where('id', $myshop[0]['user_id'])->get();
        $img_file   = $this->image->where('goods_id', $goods_id)->get();
        $comments   = $this->goodsComment->where('goods_id', $goods_id)->get();
        
        
        // 물품이름             $goods[0]['name']
        // 마이샵아이디         $goods[0]['myshop_id']
        // 물품이미지 파일이름  $img_file[0]['filename']
        // 물품 글쓴이 이름     $username[0]['name']
        
        $info = [
                   'user_name'    => $username[0]['name'],
                   'goods_id'     => $goods_id,
                   'goods_name'   => $goods[0]['name'],
                   'myshop_id'    => $goods[0]['myshop_id'],
                   'img_filename' => $img_file[0]['filename']
                   ];
                   
        if(!isset($comments)){
          // 배열에 넣는다
          //댓글 넣는대!! 쩔엉ㅎ.ㅎ
          $comments = null; 
          
          $result = [
                    'info' => $info, 
                    'comments' => $comments
                  ];
          
          echo json_encode($result);
        
        } else{
          
          $result = [
                    'info' => $info, 
                    'comments' => $comments,
                  ];
        
          echo json_encode($result);
          
        }
        
    }
    
    // 댓글입력
    public function goodsComments(Request $req){
      
      $user       = $req->session()->get('user');
      $user_id    = $user['id'];                    // 현재로그인중인 유저아이디
      $goods_id   = $req->input('goods_id');        // 물품아이디
      $text       = $req->input('comment');         // 댓글내용
      $starpoint  = $req->input('starpoint');       // 평점
      
      // goods_comment 테이블 값 넣기
      DB::table('goods_comments')->insert([
                                   'user_id'   => $user_id,
                                   'goods_id'  => $goods_id,
                                   'text'      => $text,
                                   'starpoint' => $starpoint,
                                   'created_at' => \Carbon\Carbon::now()
      ]);
      
      $result = [
                  'user_name' => $user['name'],
                  'text'      => $text
                ];
                
      echo json_encode($result);
    }
  
}



