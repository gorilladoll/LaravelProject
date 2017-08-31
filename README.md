# LaravelProject
Laravelフレームワークを習うための練習

MylabController,BoardController,resourece/view/mylab/create/mylabcreate.blade.phpなどの機能を実装しました。
===============================

라라벨 프레임워크 파일시스템
Route::get('storage/{filename}',function($filename){
  $path = storage_path('public',$filename);
  if(!File::exists($path)){
    abort(404);
  }
  $file = File::get($path);
  $type = File::mineType($path);

  $response = Response::make($file,200);
  $response->header('Content-type',$type);

  return $response;
});

무조건 사용하여야 함 , 이렇게 사용하지 않을 시 직접 컨트롤러 이용
