$(document).ready(function(){
  $(".bxslider").bxSlider({
    "mode" : "horizontal",       //기본이 horizontal,option
    "speed" : 500,             //기본이 500  , 이미지 변환 속도
    "slideMargin" : 1,
    "auto" : "true",             //자동 변환 여부
    "pager" : "false",
    "captions" : "false",        //이미지 title 속성 공개 여부
    "autocontrols" : "false",    //정지 , 시작 컨트롤 노출
    "slideWidth" : "500px",      //박스 슬라이드의 크기 지정 4K까지 사용가능
    "adabtiveHeight" : "true",   //적응형 높이

  });
});
