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
    
    public function setAttribute(){
      return view("/mylab/create/mylab_create");
    }
    //show mylab create page

    public function createJson(Request $request){
      $main_text = $request->input('main_text');
      $wiget_clock_left = $request->input('clock_left');
      $wiget_clock_top = $request->input('clock_top');
      $wiget_text_left = $request->input('text_left');
      $wiget_text_top =  $request->input('text_top');
      $wiget_stiker_left = $request->input('stiker_left');
      $wiget_stiker_top = $request->input('stiker_top');
      $textbox_left = $request->input('textbox_left');
      $textbox_top = $request->input('textbox_top');
      $timeline_left = $request->input('timeline_left');
      $timeline_top = $request->input('timeline_top');
      $friends_left = $request->input('friends_left');
      $friends_top = $request->input('friends_top');
      //get datas that position value
      //from mylab_create page

      $jsonFile['clock'] = array('left' => (Int)$wiget_clock_left,
                                 'top' => (Int)$wiget_clock_top);
      $jsonFile['text'] = array('left' => (Int)$wiget_text_left,
                                'top' => (Int)$wiget_text_top);
      $jsonFile['stiker'] = array('left' => (Int)$wiget_stiker_left,
                                  'top' => (Int)$wiget_stiker_top);
      $jsonFile['textbox'] = array('left' => (Int)$textbox_left,
                                   'top' => (Int)$textbox_top);
      $jsonFile['timeline'] = array('left' => (Int)$timeline_left,
                                    'top' => (Int)$timeline_top);
      $jsonFile['friends'] = array('left' => (Int)$friends_left,
                                   'top' => (Int)$friends_top);
      //values make json style

      $jsonFile = json_encode($jsonFile,JSON_UNESCAPED_UNICODE+JSON_PRETTY_PRINT);
      //json encode pretty print

      $user = Session::get('user');
      //get session of logined user
      
      $user_id = $user['id'];
      //for make mylab
      
      $user_name = $user['name'];
      //for make mylab
      
      $introduce = $user_name."님의 개인 공방입니다";
      //for insert into value
      
      $jsonFileName = $user_name.'Lab.json';
      //for insert into value
      
      $jsonFileName_iconv = iconv("utf-8","euc-kr",$jsonFileName);
      //transefer name type beacause use diffrent OS
      
      $path = storage_path('app/userlab');
      //storage path
      
      $chmod = chmod($path,0777);
      $result = Storage::disk('userlab')->put($jsonFileName_iconv,$jsonFile);
      //make new file and storage userlab folder
      if($result){
        Myshop::create([
                  'title' => $main_text,
                  'introduce' => $introduce,
                  'jsonfile' => $jsonFileName,
                  'user_id' => $user_id
                  ]);
        echo "개인공방 제작이 완료되었습니다.";
        //save new data in database
      } else {
        echo "개인공방 제작에 실패하였습니다.";
      }
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function show(Request $request){
      try {
        $user = Session::get('user');
        $user = $user['name'];
        $user_name = $this->user->where('name',$user)->get();
        $json = $user."Lab.json";
        $jsonFileName = $this->myshop->where('jsonfile',$json)->get();
        //get mylab datas
        
        if(isset($jsonFileName[0])){
          $jsonfile = $jsonFileName[0]['jsonfile'];
          $iconv_name = iconv('utf-8','euc-kr',$jsonfile);
          //get jsonfile in userlab folder

          $content = Storage::disk('userlab')->get($iconv_name);
          $jsonDecode = json_decode($content,true);
          $clock = ['left' => $jsonDecode['clock']['left'],'top' => $jsonDecode['clock']['top']];
          $profile  = ['left' => $jsonDecode['text']['left'],'top' => $jsonDecode['text']['top']];
          $stiker  = ['left' => $jsonDecode['stiker']['left'],'top' => $jsonDecode['stiker']['top']];
          $textbox  = ['left' => $jsonDecode['textbox']['left'],'top' => $jsonDecode['textbox']['top']];
          $timeline  = ['left' => $jsonDecode['timeline']['left'],'top' => $jsonDecode['timeline']['top']];
          $friends  = ['left' => $jsonDecode['friends']['left'],'top' => $jsonDecode['friends']['top']];
          //decode json file


          $myshop = $this->myshop->where('user_id',$user_name[0]['id'])->get();
          $goods = $this->goods->where('myshop_id',$myshop[0]['id'])->get();

          $timeline_content = $this->board->where('myshop_id',$myshop[0]['id'])->orderby('id','desc')->get();
          
          $timeline_image = $this->image->where('image_category','timeline')->orderby('id','desc')->get();
          $goods_images = DB::table('goods')->select('images.filename')
                          ->join('myshops','myshops.id','=','goods.myshop_id')
                          ->join('images','images.goods_id','=','goods.id')
                          ->where([['goods.myshop_id',$myshop[0]['id']],['images.image_category','goods']])
                          ->orderby('images.id','desc')->get();

          $subscriptions = DB::table('myshops')->select('users.id','myshops.title','users.name')
                           ->join('subscriptions','myshops.id','=','subscriptions.myshop_id')
                           ->join('users','users.id','=','myshops.user_id')
                           ->where('subscriptions.user_id','=',$user_name[0]['id'])->get();
          //get datas that connected mylab

          return view("mylab/contents/lab/lab")->with([
            'user' => $user,
            'user_name' => $user_name[0],
            'myshop' => $myshop[0],
            'clock' => $clock,
            'profile' => $profile,
            'stiker' => $stiker,
            'textbox' => $textbox,
            'timeline' => $timeline,
            'friends' => $friends,
            'timeline_contents' => $timeline_content,
            'timeline_images' => $timeline_image,
            'subscriptions' => $subscriptions,
            'goods_images' => $goods_images,
          ]);
          //return datas;
        } else {
          return redirect('/mylab/create');
        }
      } catch (Exception $e) {
          return redirect('/mylab/create');
      }
    }

    public function userShow(Request $request,$user_id){
      //same that show
      //but diffrent thing is session
      $user = $request->session()->get('user');
      $user = $user['name'];
      $user_name = $this->user->where('id',$user_id)->get();
      $jsonFileName = $this->myshop->where('jsonfile',$user_name[0]['name']."Lab.json")->get();
      if(isset($jsonFileName[0])){
        $jsonfile = $jsonFileName[0]['jsonfile'];
        $iconv_name = iconv('utf-8','euc-kr',$jsonfile);
        $content = Storage::disk('userlab')->get($iconv_name);
        $jsonDecode = json_decode($content,true);
        $clock = ['left' => $jsonDecode['clock']['left'],'top' => $jsonDecode['clock']['top']];
        $profile  = ['left' => $jsonDecode['text']['left'],'top' => $jsonDecode['text']['top']];
        $stiker  = ['left' => $jsonDecode['stiker']['left'],'top' => $jsonDecode['stiker']['top']];
        $textbox  = ['left' => $jsonDecode['textbox']['left'],'top' => $jsonDecode['textbox']['top']];
        $timeline  = ['left' => $jsonDecode['timeline']['left'],'top' => $jsonDecode['timeline']['top']];
        $friends  = ['left' => $jsonDecode['friends']['left'],'top' => $jsonDecode['friends']['top']];


        $myshop = $this->myshop->where('user_id',$user_name[0]['id'])->get();

        $timeline_content = $this->board->where('myshop_id',$myshop[0]['id'])->orderby('id','desc')->get();
        $timeline_image = $this->image->orderby('id','desc')->get();

        $goods_images = DB::table('goods')->select('images.filename')
                        ->join('myshops','myshops.id','=','goods.myshop_id')
                        ->join('images','images.goods_id','=','goods.id')
                        ->where([['goods.myshop_id',$myshop[0]['id']],['images.image_category','goods']])
                        ->orderby('images.id','desc')->get();

        $subscriptions = DB::table('myshops')->select('users.id','myshops.title','users.name')
                         ->join('subscriptions','myshops.id','=','subscriptions.myshop_id')
                         ->join('users','users.id','=','myshops.user_id')
                         ->where('subscriptions.user_id','=',$user_name[0]['id'])->get();

        return view("mylab/contents/lab/lab")->with([
          'user' => $user,
          'user_name' => $user_name[0],
          'myshop' => $myshop[0],
          'clock' => $clock,
          'profile' => $profile,
          'stiker' => $stiker,
          'textbox' => $textbox,
          'timeline' => $timeline,
          'friends' => $friends,
          'timeline_contents' => $timeline_content,
          'timeline_images' => $timeline_image,
          'subscriptions' => $subscriptions,
          'goods_images' => $goods_images,
        ]);
      }
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
