<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function (Request $req) {
//    return view('main')->with('user',false);
//});

Route::get('/alarmCheck','UserController@alarmCheck');

Route::get('/login', function () {
    return view('login');
});

Route::post('/authenticate','UserController@authenticate');

Route::get('/testdb','UserController@testdb');

Route::get('/page',function(){
	return view('page');
});

Route::get('/register',function(){
	return view('register');
});

Route::post('/regist','UserController@regist');

Route::get('/board/list','BoardController@boardList');

Route::get('/board/write', function(){
	return view('write');
});


/*==============================================부스관련==============================================*/

Route::get('/booth/view/{name}/{flea_id}/{flea_th}', 'BoothController@BoothView');

//Route::get('/booth/list/setplan', 'BoothController@setPlan');

Route::post('/booth/save', 'BoothController@BoothSave');

Route::get('/booth/sellersave', 'BoothController@sellerSave');

Route::post('/board/actionWrite','BoardController@boardWrite');

Route::get('/booth/open','BoothController@planList');

Route::get('/booth/open/new','BoothController@newSave');

Route::get('/booth/open/del','BoothController@delPlan');

Route::get('/booth/areaSet/{booth_name}/th/{th_id}','BoothController@areaSet');

Route::get('/booth/categorySave','BoothController@categorySave');

/*============================================================================================*/


// 무슨 플리마켓인지
Route::get('/surveyView/{flea_id}', 'SurveyController@loadSurvey');

// 설문조사 작성
Route::get('/survey/register', 'SurveyController@register');

// 설문조사 등록
Route::get('/survey/apply', 'SurveyController@surveyApply');


// 플리마켓 메인화면
Route::get('/', function () {
    return view('main');
});

// 개최하기
Route::get('/flea/open/{flea}', 'FleaThController@createFlea');

// 개최하기 db
Route::post('/flea/new', 'FleaThController@newFlea');

// 벼룩공방
Route::get('/lab', function(){
    return view('contents.lab.lab');
});

// 판매자 신청


// 판매자 부스 배치
// Route::get('fleamarket/seller_set', function(){
//     return view('contents.flea.flea_seller_set');
// });

// 티켓구매
Route::get('fleamarket/ticketbuy', function(){
    return view('contents.flea.flea_ticket');
});



// 그룹 리스트
Route::get('/group/list','GroupController@GroupList');

// 플리마켓 그룹생성페이지
Route::get('/group/create', function(){
    return view('contents.flea.flea_group_create');
});

// 그룹 생성
Route::post('/group/create/new', 'GroupController@SaveGroup');

// 그룹 삭제
Route::get('/group/del', 'GroupController@delGroup');

// 벼룩가이드


// 마일리지 샵
Route::get('mileage/mileageshop', 'MileageController@main');

Route::get('mileage/mileagebuyer', 'MileageController@buyershop');

Route::post('mileage/buy', 'MileageController@buyAction');


// 마이페이지
Route::get('mypage/main', function(){
    return view('contents.mypage.mypage_main');
});

// 개최자 마이페이지
Route::get('mypage/host', 'MypageController@viewMypage');

// 판매자 마이페이지
Route::get('mypage/seller', 'MypageController@viewSeller'); //추가

Route::post('mypage/seller/coupon','MypageController@useCoupon'); //추가

// 구매자 마이페이지
Route::get('mypage/buyer', 'MypageController@viewBuyer'); //추가

Route::post('mypage/buyer/coupon','MypageController@useBuyerCoupon'); //추가


//==================== 설문조사 ================
Route::get('/surveyView/{flea_id}', 'SurveyController@loadSurvey');

Route::get('/survey/register/{th_id}', 'SurveyController@register');

Route::get('/survey/apply', 'SurveyController@surveyApply');

//===================== 정산 =======================
Route::get('/account/host/{flea_id}', 'AccountController@hostAccountView');

Route::get('/account/host/{flea_id}/th/{th_id}', 'AccountController@hostAccountThView');

Route::get('/account/seller', 'AccountController@sellerAccountView');

Route::get('/account/seller/{flea_id}/th/{th_id}', 'AccountController@sellerAccountThView');


//===================== 플리마켓 ======================
Route::get('fleamarket/main', 'FleaThController@ViewFleamarkets');
// 판매자 신청

Route::get('fleamarket/sellerSet/{booth_name}/th/{th_id}','BoothController@sellerSetView');


// 티켓구매
Route::get('fleamarket/ticketbuy', function(){
    return view('contents.flea.flea_ticket');
});
// 플리마켓 보기
Route::get('/fleamarket/flea_page/{flea_id}', 'FleaThController@viewFleaTh');


// 플리마켓 댓글
Route::get('/fleamarket/flea_comment/input', 'FleaThController@commentInsert');

// 댓글 삭제
Route::get('/fleamarket/flea_comment/del', 'FleaThController@commentDel');


//Route::get('/','Auth\LoginController@show');
//Route Login Controller Show Login Page;

Route::get('/signup','Auth\LoginController@showSignup');
//Route Login Controller Show Signup Page

Route::post('/signup_confirm','Auth\LoginController@signupConfirm');
//Route Login Controller Show Signup Confirm And Logined

Route::post('/login_confirm','Auth\LoginController@loginConfirm');
// Route::post('/login_confirm','LoginsController@storeLogin');
//Route Login Controller Confirm Login And Logined Or Unlogin

Route::get('/logout','Auth\LoginController@Logout');
//Route Login Controller Logout

Route::get('/mylab/create','MylabController@setAttribute');

Route::get('/mylab/create/myshop',"MylabController@createMyshop");

Route::get('/mylab/show','MylabController@show');

Route::get('/mylab/showAjax','MylabController@showAjaxData');

Route::get('/mylab/user/lab/{user_id}','MylabController@userShow');

Route::get('/mylab/seller/add/{userid}','MylabController@addFollow');

Route::get('/mylab/goods','BoardController@goods');

Route::get('/mylab/follow','BoardController@follow');

Route::get('/mylab/user/goods/{user_id}','BoardController@userGoods');

Route::get('/mylab/user/follow/{user_id}','BoardController@userFollow');

Route::post('/board/create','BoardController@create');

Route::post('/mylab/goods/add','MylabController@addGoods');

Route::get('/storage/image/{filename}',function($filename){
  $path = storage_path("app/images/{$filename}");
  if(!File::exists($path)){
    abort(404);
  }
  $file = File::get($path);
  // $type = File::mineType($path);
  $response = Response::make($file,200);
  // $response->header('Content-type',$file);

  return $response;
});

Route::get('/storage/icon/{filename}',function($filename){
  $path = storage_path("app/userlab/{$filename}");
  if(!File::exists($path)){
    abort(404);
  }
  $file = File::get($path);
  // $type = File::mineType($path);
  $response = Response::make($file,200);
  // $response->header('Content-type',$file);

  return $response;
});

// 물품상세보기
Route::get('/mylab/goods/detail', 'BoardController@goodsDetail');

// 댓글입력
Route::get('/mylab/goods/comment', 'BoardController@goodsComments');

// 판매자 신청 페이지
Route::get('fleamarket/sellerapply/{th}', 'FleaThController@sellerApplyView');
// 판매자 신청 저장
Route::get('fleamarket/sellerapply/mode/save','FleaThController@applysSave');

//==================== 일정추가 ================
Route::get('/mypage/date/create','DateController@createDate');
Route::get('/mypage/date/alert','DateController@alertDate');
Route::get('/mypage/date/view','DateController@main');

//==================== 구매목록 ================
Route::get('/buylist/insert','BuylistController@insertBuylist');