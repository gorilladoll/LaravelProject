@extends('layouts.app')
@section('content')
<head>
  <meta charset="utf-8">
  <title>부스배치도</title>

  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
    .wrapper{
      width: 1400px;
      height: 650px;
      margin-top:130px;
      margin-left:30px;
    }
    .draggable {
      margin:10px auto;
      border : 1px solid #d4d4d4;
      border-radius:5px;
      width: 800px;
      height: 600px;
    }

    .content{
      border : 2px solid #d4d4d4;
      border-radius:5px;
      width: 800px;
      height: 145px;
      margin:0 auto;
    }
    .booth{
      margin-left: 10px;
      margin-top: 5px;

      border-radius:5px;
      width: 88px;
      height: 88px;
      text-align:center;
      display:inline-block;
    }
    .booth_size50{
      margin-left: 15px;
      margin-top:8px;
      border : 1px solid #cc0a2d;
      border-radius:5px;
      width: 58px;
      height: 58px;
      text-align:center;
      display:inline-block;
    }
    .booth_size75{
      margin-left: 15px;
      margin-top: 8px;
      border : 1px solid #cc0a2d;
      border-radius:5px;
      width: 78px;
      height: 78px;
      text-align:center;
      display:inline-block;
    }
    .booth_size100{
      margin-left: 15px;
      margin-top: 8px;
      border : 1px solid #cc0a2d;
      border-radius:5px;
      width: 98px;
      height: 98px;
      text-align:center;
      display:inline-block;
    }

    .boothContent{
      border : 1px dotted #a4aaae;
      border-radius:5px;
      margin-left: 10px;
      margin-top: 10px;
      background-color:white;
      width: 78px;
      height: 78px;
      text-align:center;
    }
    .booth_su p {
      margin:2px;
    }
    .booth_su{
      width:150px;
      height:30px;
      float:left;
      border : 2px solid #d4d4d4;
      border-radius:5px;
      margin-left:21.4%;
    }
    .booth_del{
      margin-left:55px;
      width:88px;
      height:88px;
      text-align: center;
      border-radius:5px;
      display:inline-block;
    }
    .booth_footer{
      width:1400px;
      height:300px;
      margin-left:30px;
    }
    #finish{
      border : 2px solid #cc0a2d;
      border-radius:5px;
    }
    #reset{
      border-radius:5px;
    }
    .bar_btn{
      display:inline-block;
      margin-left:10px;
    }

    .dropdown{
      position:relative;
      display:inline-block;
    }

    .dropdown-content{
      background-color:white;
      display:none;
      position:absolute;
      top:85px;
      width:600px;
      left:-20px;
      height:118px;
      border:2px solid #cd0a0a;
      text-align: left;
      z-index: 50;
    }
    .dropdown:hover .dropdown-content{
      display:block;
    }
    .dropdown:hover .dropdown-mark{
      display:block;
    }
    .dropdown-mark{
      display:none;
      border-left:10px solid white;
      border-right:10px solid white;
      border-bottom:10px solid #cd0a0a;
      top:65px;
      left:10px;
      background-color:red;
      width:20px;
      height:20px;
      position:absolute;
    }

  </style>
  <script>
      $(function() {
          var boothObjArr = Array(); //객체 부스 넣는 배열
          var boothAttrArr = Array();
          var boothtype = Array(); //부스 타입
          var user_name = "{{$user['email']}}"; //유저 정보
          var table_left = Number($('.draggable').offset().left);
          var table_top = Number($('.draggable').offset().top);
          var booth_name2 = '{{$booth_name}}';
          var count_booth = 0;
          var booth_num = 1;

          $(document.body).on('click','#finish',function(){
              if(boothObjArr.length<1) {
                  alert('저장할 부스가 없습니다!');
                  return;
              }
              console.log(boothObjArr);
              for(var count = 0, count2 = 0, leng = boothObjArr.length; count < leng ; count++) {
                  //현재 작업장에 올려진 부스를 php에 넘기기에 알맞은 형태로 가공하기 위한 for문
                  boothAttrArr[count] = {
                      //객체에서 메소드를 제외한 좌표,넓이값만 저장하기 위한 연관배열
                      'top': 0,
                      'left': 0,
                      'width': 0,
                      'height': 0
                      //배치도의 기본 크기는 98
                  };
                  for (var attr in boothObjArr[count]) {//각 부스마다의 키값 추출
                      if (typeof(boothObjArr[count][attr]) == typeof('string')) break;
                      if (typeof(boothObjArr[count][attr]) == typeof(function () {
                          }))  break;
                      //부스객체에서 좌표값, 넓이값 이후, 메서드를 저장하려고 하면 break
                      if (typeof(boothAttrArr[count]) != typeof(Array())) {//값 저장을 위한 초기화
                          boothAttrArr[count] = Array();
                      }
                      boothAttrArr[count][attr] = Number(boothObjArr[count][attr]);
                    /*attr로 설정하고 넘기게 되면 자바스크립트에서는 연관배열(객체화)로 취급되어지지만 php로 넘어가는 순간 형식상 깨지는 현상 발생..... index로 넘기게 되면 값이 넘어가게 되지만 db입력 시에 논리적 모순 발생*/
                  }
              }
                  for(var count = 0, count2 = 0, leng = boothObjArr.length; count < leng ; count++){
                      //현재 작업장에 올려진 부스를 php에 넘기기에 알맞은 형태로 가공하기 위한 for문
                      boothtype[count] = {
                          //객체에서 메소드를 제외한 좌표,넓이값만 저장하기 위한 연관배열
                          'type' : 'null',
                          'text' : 'null'
                          //배치도의 기본 크기는 98
                      };
                      for(var attr in boothObjArr[count]){//각 부스마다의 키값 추출
                          if(typeof(boothObjArr[count][attr]) == typeof(function(){}))  break;
                          //부스객체에서 좌표값, 넓이값 이후, 메서드를 저장하려고 하면 break
                          if(typeof(boothtype[count]) != typeof(Array())){//값 저장을 위한 초기화
                              boothtype[count] = Array();
                          }
                          boothtype[count][attr] = boothObjArr[count][attr];
                        /*attr로 설정하고 넘기게 되면 자바스크립트에서는 연관배열(객체화)로 취급되어지지만 php로 넘어가는 순간 형식상 깨지는 현상 발생..... index로 넘기게 되면 값이 넘어가게 되지만 db입력 시에 논리적 모순 발생*/
                      }
              }
              table_left = Number($('.draggable').offset().left);
              table_top = Number($('.draggable').offset().top);
              $.ajax({/*서버에 값 전달*/
              url : '/booth/save',
              data: {
                  boothArr : boothAttrArr,
                  booth_name : '{{$booth_name}}', // 부스네임 임의 지정
                  user_name :user_name, // 유저네임 세션을 통해 가져옴
                  boothType : boothtype,
                  t_left : table_left,
                  t_top : table_top
              },
              dataType : 'jsonp',
              success : function(data){
                  console.log(data[0]['top']);
                  alert('저장이 완료되었습니다.');

                  window.location.href = '/fleamarket/main';
              },
              error : function(){
                  console.log(boothAttrArr);
                  alert('에러가 발생하였습니다1');
              }
          });
      });

          // 부스 초기화 기능
          $('#reset').click(function(){
              if(boothObjArr.length<1)
                  alert('초기화 할 부스가 없습니다!');
              else{
                  if(confirm("현재 배치된 부스들이 다 사라집니다. 정말 초기화 하시겠습니까?")){
                      if(confirm("알겠습니다. 만일을 대비해 한번 더 질문합니다. 정말 초기화 합니까?")){
                          $('.boothContent').remove();
                          for(var i=0 ,arrLength = boothObjArr.length; i<arrLength;i++){
                              boothObjArr.shift();
                          }
                          $('.booth_su_count').text('현재 부스수:'+Number(boothObjArr.length));
                      } else {
                      }
                  } else {
                  }
              }
          });

          // 부스 대
          $( ".booth_booth" ).draggable({
              grid: [10, 10],
              snap: true,
              stop:function(){

                  //현재 부스 수를 표시
                  $('.booth_su_count').text('현재 부스수:'+Number(boothObjArr.length+1 - cnt_booth()));
                  function boothObj(){/*부스 클래스*/
                      this.top    = 0;
                      this.left   = 0;
                      this.width  = 98; //기본 크기
                      this.height = 98;
                      this.booth;

                      this.getTop = function(){
                          return this.top;
                      }
                      this.getLeft = function(){
                          return this.left;
                      }
                      this.setTop = function(argTop){
                          this.top = argTop;
                      }
                      this.setLeft = function(argLeft){
                          this.left = argLeft;
                      }
                      this.setWidth = function(argWidth){
                          this.width = argWidth;
                      }
                      this.setHeight = function(argHeight){
                          this.height = argHeight;
                      }
                      this.getWidth = function(){
                          return this.width;
                      }
                      this.getHeight = function(){
                          return this.height;
                      }

                      this.getBooth = function(){
                          return this.booth;
                      }
                      this.setBooth = function(argBooth){
                          this.booth = argBooth;
                      }
                  }

                  var boothLeft     = Number($(this).offset().left);
                  var boothTop      = Number($(this).offset().top);
                  var boardLeft     = Number($('.draggable').offset().left);
                  var boardTop      = Number($('.draggable').offset().top);
                  var boardWidth    = Number($('.draggable').width());
                  var boothWidth    = Number($('.booth_size100').width());
                  var boardHeight   = Number($('.draggable').height());
                  var boothHeight   = Number($('.booth_size100').height());

                  // 쓰레기통의 값들
                  var garbageLeft   = Number($('.booth_del').offset().left);
                  var garbageTop    = Number($('.booth_del').offset().top);
                  var garbageWidth  = Number($('.booth_del').width());
                  var garbageHeight = Number($('.booth_del').height());

                /*작업영역에 완벽하게 들어가지 않았을 경우 원래자리로 초기화*/
                  if(boothLeft <= boardLeft ||
                      boothLeft >= boardLeft + boardWidth  - boothWidth ||
                      boothTop  <= boardTop  ||
                      boothTop  >= boardTop  + boardHeight - boothHeight){

                      $(this).css({
                          "top":"0px",
                          "left":"0px"
                      });
                      return;
                  }
                  //====================

                /*작업장에 올라와있는 부스 요소의 id속성 get 및 부스간 충돌 판정*/
                  if($('.boothContent').length){
                      for(var i = 0, length = boothObjArr.length; i < length; i++){
                          if((boothLeft+boothWidth) > boothObjArr[i].getLeft() &&
                              boothLeft < (boothObjArr[i].getLeft() + boothObjArr[i].getBooth().width()) &&
                              (boothTop+boothHeight) > boothObjArr[i].getTop() &&
                              boothTop < (boothObjArr[i].getTop() + boothObjArr[i].getBooth().height())){
                              $(this).css({
                                  "top":"0px",
                                  "left":"0px"
                              });
                              return;
                          }
                      }

                      var id = $('.boothContent').last().attr('id');
                      var idArr = id.split('_');
                      var idValue = Number(idArr[1])+1;
                  }else{
                      var idValue = 1;
                  }
                  //====================

                  var booth = "<div class='boothContent' id=content_" + idValue + "><img src='{{asset('/img/icon/')}}/test.png' style='width:100%;height:100%; border-radius: 5px;'></div>";
                  booth_num++;
                /*부스객체 추가, 부스도형 초기화 및 작업장에 부스 추가*/
                  $(".draggable").append(booth);
                  var boothObj = new boothObj();

                  boothObj.setBooth($('#content_'+idValue));
                  boothObj.setTop(boothTop);
                  boothObj.setLeft(boothLeft);

                  boothObjArr.push(boothObj);

                  $('#content_'+idValue).css({
                      "position":"absolute",
                      "top": boothTop-10,
                      "left": boothLeft-10,
                      "width" : 98,
                      "height" : 98
                  });

                  $(this).css({
                      "top":"0px",
                      "left":"0px"
                  });
                  //==================================



                /*작업장에 추가된 부스요소의 크기조절 및 draggable속성 추가 및 옵션설정*/
                  $('.boothContent').resizable({
                      start:function(){
                          //현재의 위치값과 배치도의 크기를 계산하여 배치도를 넘어가지 않게 함
                          var thisLeft     = Number($(this).offset().left);
                          var thisTop      = Number($(this).offset().top);
                          $(this).resizable( "option", "maxWidth", (boardWidth-thisLeft+boardLeft) );
                          $(this).resizable( "option", "maxHeight", (boardHeight-thisTop+boardTop) );
                      },
                      grid: [20,20],
                      minHeight: 28, //최소 부스 크기
                      minWidth: 28,  //최소 부스 크기
                      stop:function(){
                          // 간단한 사이즈 표시
                          var thisWidth    = Number($(this).width());
                          var thisHeight   = Number($(this).height());
                          var thisLeft     = Number($(this).offset().left);
                          var thisTop      = Number($(this).offset().top);

                          if(thisWidth <58){
                            thisWidth = 58;
                            $(this).css('width',thisWidth);
                          }
                          if(thisHeight <58){
                            thisHeight = 58;
                            $(this).css('height',thisHeight);
                          }

                          var id = $(this).attr('id');

                          for(var i = 0, length = boothObjArr.length; i < length; i++){
                              if(id == boothObjArr[i].getBooth().attr('id')){
                                  continue;
                              }
                              if((thisLeft+thisWidth) > boothObjArr[i].getLeft() &&
                                  thisLeft < ( boothObjArr[i].getLeft() + boothObjArr[i].getBooth().width()) &&
                                  (thisTop+thisHeight) > boothObjArr[i].getTop() &&
                                  thisTop < (boothObjArr[i].getTop() + boothObjArr[i].getBooth().height())){
                                  for(var i = 0, length = boothObjArr.length; i < length ; i++){

                                      if(id == boothObjArr[i].getBooth().attr('id')){
                                          window.alert('부스가 겹칩니다');
                                          $(this).css({
                                              "width":boothObjArr[i].getWidth(),
                                              "height":boothObjArr[i].getHeight()
                                          });
                                          return;
                                      }
                                  }
                              }
                          }

                          // 각 부스별 사이즈를 표시
                          for(var i = 0, length = boothObjArr.length; i < length ; i++){
                              if(id == boothObjArr[i].getBooth().attr('id')){
                                  boothObjArr[i].setWidth(thisWidth);
                                  boothObjArr[i].setHeight(thisHeight);
                                  //$(this).children('p').html('사이즈 : '+(thisWidth)+' X '+(thisHeight));
                              }
                          }

                      }
                  }).draggable({
                      grid: [10,10],
                      snap: true,
                      stop:function(){
                          var thisLeft     = Number($(this).offset().left);
                          var thisTop      = Number($(this).offset().top);
                          var thisWidth    = Number($(this).width());
                          var thisHeight   = Number($(this).height());

                          var id = $(this).attr('id');

                        /*부스간 충돌방지*/
                          for(var i = 0, length = boothObjArr.length; i < length; i++){
                              if(id == boothObjArr[i].getBooth().attr('id')){
                                  continue;
                              }
                              if((thisLeft+thisWidth) > boothObjArr[i].getLeft() &&
                                  thisLeft < ( boothObjArr[i].getLeft() + boothObjArr[i].getBooth().width()) &&
                                  (thisTop+thisHeight) > boothObjArr[i].getTop() &&
                                  thisTop < (boothObjArr[i].getTop() + boothObjArr[i].getBooth().height())){
                                  for(var i = 0, length = boothObjArr.length; i < length ; i++){

                                      if(id == boothObjArr[i].getBooth().attr('id')){
                                          $(this).css({
                                              "top":boothObjArr[i].getTop() -10,
                                              "left":boothObjArr[i].getLeft() -10
                                          });
                                          return;
                                      }
                                  }
                              }
                          }
                          //=========================

                          //==================================================
                          // 부스 삭제
                          if(thisLeft >= garbageLeft - 60 &&
                              thisLeft <= Number(garbageLeft + garbageWidth - thisWidth + 60) &&
                              thisTop  >= garbageTop - 60  &&
                              thisTop+50  <= garbageTop + 120){

                              for(var i = 0, length = boothObjArr.length; i < length ; i++){
                                  if(id == boothObjArr[i].getBooth().attr('id')){
                                      boothObjArr[i]='';
                                      $(this).remove();
                                      boothObjArr.sort();
                                      boothObjArr.shift();
                                      //현재 부스 수를 표시
                                      $('.booth_su_count').text('현재 부스수:'+Number(boothObjArr.length - cnt_booth()));
                                      return;
                                  }
                              }
                          }

                        /*작업장 안의 부스요소가 작업장을 벗어나는 것을 방지*/
                          if(thisLeft <= boardLeft ||
                              thisLeft >= Number(boardLeft + boardWidth - thisWidth) ||
                              thisTop  <= boardTop  ||
                              thisTop  >= boardTop + boardHeight - thisHeight + 10){

                              for(var i = 0, length = boothObjArr.length; i < length ; i++){

                                  if(id == boothObjArr[i].getBooth().attr('id')){
                                      $(this).css({
                                          "position":"absolute",
                                          "top":boothObjArr[i].getTop() -10,
                                          "left":boothObjArr[i].getLeft() -10
                                      });
                                      return;
                                  }

                              }
                          }else{    /*작업장을 벗어나지 않고 이동했을 경우 객체에 좌표초기화*/
                              for(var i = 0, length = boothObjArr.length; i < length ; i++){
                                  if(id == boothObjArr[i].getBooth().attr('id')){
                                      boothObjArr[i].setTop(thisTop);
                                      boothObjArr[i].setLeft(thisLeft);
                                  }
                              }
                          }
                      }
                  });
                  //===================
              }
          });

          //=============================== 부스 중

          $( ".booth_booth_75" ).draggable({
              grid: [10, 10],
              snap: true,
              stop:function(){

                  //현재 부스 수를 표시
                  $('.booth_su_count').text('현재 부스수:'+Number(boothObjArr.length+1 - cnt_booth()));
                  function boothObj(){/*부스 클래스*/
                      this.top    = 0;
                      this.left   = 0;
                      this.width  = 78; //기본 크기
                      this.height = 78;
                      this.booth;

                      this.getTop = function(){
                          return this.top;
                      }
                      this.getLeft = function(){
                          return this.left;
                      }
                      this.setTop = function(argTop){
                          this.top = argTop;
                      }
                      this.setLeft = function(argLeft){
                          this.left = argLeft;
                      }
                      this.setWidth = function(argWidth){
                          this.width = argWidth;
                      }
                      this.setHeight = function(argHeight){
                          this.height = argHeight;
                      }
                      this.getWidth = function(){
                          return this.width;
                      }
                      this.getHeight = function(){
                          return this.height;
                      }

                      this.getBooth = function(){
                          return this.booth;
                      }
                      this.setBooth = function(argBooth){
                          this.booth = argBooth;
                      }
                  }

                  var boothLeft     = Number($(this).offset().left);
                  var boothTop      = Number($(this).offset().top);
                  var boardLeft     = Number($('.draggable').offset().left);
                  var boardTop      = Number($('.draggable').offset().top);
                  var boardWidth    = Number($('.draggable').width());
                  var boothWidth    = Number($('.booth_size75').width());
                  var boardHeight   = Number($('.draggable').height());
                  var boothHeight   = Number($('.booth_size75').height());

                  // 쓰레기통의 값들
                  var garbageLeft   = Number($('.booth_del').offset().left);
                  var garbageTop    = Number($('.booth_del').offset().top);
                  var garbageWidth  = Number($('.booth_del').width());
                  var garbageHeight = Number($('.booth_del').height());

                  /*작업영역에 완벽하게 들어가지 않았을 경우 원래자리로 초기화*/
                  if(boothLeft <= boardLeft ||
                      boothLeft >= boardLeft + boardWidth  - boothWidth ||
                      boothTop  <= boardTop  ||
                      boothTop  >= boardTop  + boardHeight - boothHeight){

                      $(this).css({
                          "top":"0px",
                          "left":"0px"
                      });
                      return;
                  }
                  //====================

                  /*작업장에 올라와있는 부스 요소의 id속성 get 및 부스간 충돌 판정*/
                  if($('.boothContent').length){
                      for(var i = 0, length = boothObjArr.length; i < length; i++){
                          if((boothLeft+boothWidth) > boothObjArr[i].getLeft() &&
                              boothLeft < (boothObjArr[i].getLeft() + boothObjArr[i].getBooth().width()) &&
                              (boothTop+boothHeight) > boothObjArr[i].getTop() &&
                              boothTop < (boothObjArr[i].getTop() + boothObjArr[i].getBooth().height())){
                              $(this).css({
                                  "top":"0px",
                                  "left":"0px"
                              });
                              return;
                          }
                      }

                      var id = $('.boothContent').last().attr('id');
                      var idArr = id.split('_');
                      var idValue = Number(idArr[1])+1;
                  }else{
                      var idValue = 1;
                  }
                  //====================

                  var booth = "<div class='boothContent' id=content_" + idValue + "><img src='{{asset('/img/icon/')}}/test.png' style='width:100%;height:100%; border-radius: 5px;'></div>";
                  booth_num++;
                  /*부스객체 추가, 부스도형 초기화 및 작업장에 부스 추가*/
                  $(".draggable").append(booth);
                  var boothObj = new boothObj();

                  boothObj.setBooth($('#content_'+idValue));
                  boothObj.setTop(boothTop);
                  boothObj.setLeft(boothLeft);

                  boothObjArr.push(boothObj);

                  $('#content_'+idValue).css({
                      "position":"absolute",
                      "top": boothTop-10,
                      "left": boothLeft-10,
                      "width" : 78,
                      "height" : 78
                  });

                  $(this).css({
                      "top":"0px",
                      "left":"0px"
                  });
                  //==================================



                  /*작업장에 추가된 부스요소의 크기조절 및 draggable속성 추가 및 옵션설정*/
                  $('.boothContent').resizable({
                      start:function(){
                          //현재의 위치값과 배치도의 크기를 계산하여 배치도를 넘어가지 않게 함
                          var thisLeft     = Number($(this).offset().left);
                          var thisTop      = Number($(this).offset().top);
                          $(this).resizable( "option", "maxWidth", (boardWidth-thisLeft+boardLeft) );
                          $(this).resizable( "option", "maxHeight", (boardHeight-thisTop+boardTop) );
                      },
                      grid: [20,20],
                      minHeight: 28, //최소 부스 크기
                      minWidth: 28,  //최소 부스 크기
                      stop:function(){
                          // 간단한 사이즈 표시
                          var thisWidth    = Number($(this).width());
                          var thisHeight   = Number($(this).height());
                          var thisLeft     = Number($(this).offset().left);
                          var thisTop      = Number($(this).offset().top);

                          if(thisWidth <58){
                              thisWidth = 58;
                              $(this).css('width',thisWidth);
                              console.log($(this));
                          }
                          if(thisHeight <58){
                              thisHeight = 58;
                              $(this).css('height',thisHeight);
                          }

                          var id = $(this).attr('id');

                          for(var i = 0, length = boothObjArr.length; i < length; i++){
                              if(id == boothObjArr[i].getBooth().attr('id')){
                                  continue;
                              }
                              if((thisLeft+thisWidth) > boothObjArr[i].getLeft() &&
                                  thisLeft < ( boothObjArr[i].getLeft() + boothObjArr[i].getBooth().width()) &&
                                  (thisTop+thisHeight) > boothObjArr[i].getTop() &&
                                  thisTop < (boothObjArr[i].getTop() + boothObjArr[i].getBooth().height())){
                                  for(var i = 0, length = boothObjArr.length; i < length ; i++){

                                      if(id == boothObjArr[i].getBooth().attr('id')){
                                          window.alert('부스가 겹칩니다');
                                          $(this).css({
                                              "width":boothObjArr[i].getWidth(),
                                              "height":boothObjArr[i].getHeight()
                                          });
                                          return;
                                      }
                                  }
                              }
                          }

                          // 각 부스별 사이즈를 표시
                          for(var i = 0, length = boothObjArr.length; i < length ; i++){
                              if(id == boothObjArr[i].getBooth().attr('id')){
                                  boothObjArr[i].setWidth(thisWidth);
                                  boothObjArr[i].setHeight(thisHeight);
                                  $(this).children('p').html('사이즈 : '+(thisWidth)+' X '+(thisHeight));
                              }
                          }

                      }
                  }).draggable({
                      grid: [10,10],
                      snap: true,
                      stop:function(){
                          var thisLeft     = Number($(this).offset().left);
                          var thisTop      = Number($(this).offset().top);
                          var thisWidth    = Number($(this).width());
                          var thisHeight   = Number($(this).height());

                          var id = $(this).attr('id');

                          /*부스간 충돌방지*/
                          for(var i = 0, length = boothObjArr.length; i < length; i++){
                              if(id == boothObjArr[i].getBooth().attr('id')){
                                  continue;
                              }
                              if((thisLeft+thisWidth) > boothObjArr[i].getLeft() &&
                                  thisLeft < ( boothObjArr[i].getLeft() + boothObjArr[i].getBooth().width()) &&
                                  (thisTop+thisHeight) > boothObjArr[i].getTop() &&
                                  thisTop < (boothObjArr[i].getTop() + boothObjArr[i].getBooth().height())){
                                  for(var i = 0, length = boothObjArr.length; i < length ; i++){

                                      if(id == boothObjArr[i].getBooth().attr('id')){
                                          $(this).css({
                                              "top":boothObjArr[i].getTop() -10,
                                              "left":boothObjArr[i].getLeft() -10
                                          });
                                          return;
                                      }
                                  }
                              }
                          }
                          //=========================

                          //==================================================
                          // 부스 삭제

                          if(thisLeft >= garbageLeft - 60 &&
                              thisLeft <= Number(garbageLeft + garbageWidth - thisWidth + 60) &&
                              thisTop  >= garbageTop - 60  &&
                              thisTop+50  <= garbageTop + 120){

                              for(var i = 0, length = boothObjArr.length; i < length ; i++){
                                  if(id == boothObjArr[i].getBooth().attr('id')){
                                      boothObjArr[i]='';
                                      $(this).remove();
                                      boothObjArr.sort();
                                      boothObjArr.shift();
                                      //현재 부스 수를 표시
                                      $('.booth_su_count').text('현재 부스수:'+Number(boothObjArr.length - cnt_booth()));
                                      return;
                                  }
                              }
                          }

                          /*작업장 안의 부스요소가 작업장을 벗어나는 것을 방지*/
                          if(thisLeft <= boardLeft ||
                              thisLeft >= Number(boardLeft + boardWidth - thisWidth) ||
                              thisTop  <= boardTop  ||
                              thisTop  >= boardTop + boardHeight - thisHeight + 10){

                              for(var i = 0, length = boothObjArr.length; i < length ; i++){

                                  if(id == boothObjArr[i].getBooth().attr('id')){
                                      $(this).css({
                                          "position":"absolute",
                                          "top":boothObjArr[i].getTop() -10,
                                          "left":boothObjArr[i].getLeft() -10
                                      });
                                      return;
                                  }

                              }
                          }else{    /*작업장을 벗어나지 않고 이동했을 경우 객체에 좌표초기화*/
                              for(var i = 0, length = boothObjArr.length; i < length ; i++){
                                  if(id == boothObjArr[i].getBooth().attr('id')){
                                      boothObjArr[i].setTop(thisTop);
                                      boothObjArr[i].setLeft(thisLeft);
                                  }
                              }
                          }
                      }
                  });
                  //===================
              }
          });

          //======================= 부스 소
          $( ".booth_booth_50" ).draggable({
              grid: [10, 10],
              snap: true,
              stop:function(){

                  //현재 부스 수를 표시
                  $('.booth_su_count').text('현재 부스수:'+Number(boothObjArr.length+1 - cnt_booth()));
                  function boothObj(){/*부스 클래스*/
                      this.top    = 0;
                      this.left   = 0;
                      this.width  = 58; //기본 크기
                      this.height = 58;
                      this.booth;

                      this.getTop = function(){
                          return this.top;
                      }
                      this.getLeft = function(){
                          return this.left;
                      }
                      this.setTop = function(argTop){
                          this.top = argTop;
                      }
                      this.setLeft = function(argLeft){
                          this.left = argLeft;
                      }
                      this.setWidth = function(argWidth){
                          this.width = argWidth;
                      }
                      this.setHeight = function(argHeight){
                          this.height = argHeight;
                      }
                      this.getWidth = function(){
                          return this.width;
                      }
                      this.getHeight = function(){
                          return this.height;
                      }

                      this.getBooth = function(){
                          return this.booth;
                      }
                      this.setBooth = function(argBooth){
                          this.booth = argBooth;
                      }
                  }

                  var boothLeft     = Number($(this).offset().left);
                  var boothTop      = Number($(this).offset().top);
                  var boardLeft     = Number($('.draggable').offset().left);
                  var boardTop      = Number($('.draggable').offset().top);
                  var boardWidth    = Number($('.draggable').width());
                  var boothWidth    = Number($('.booth_size50').width());
                  var boardHeight   = Number($('.draggable').height());
                  var boothHeight   = Number($('.booth_size50').height());

                  // 쓰레기통의 값들
                  var garbageLeft   = Number($('.booth_del').offset().left);
                  var garbageTop    = Number($('.booth_del').offset().top);
                  var garbageWidth  = Number($('.booth_del').width());
                  var garbageHeight = Number($('.booth_del').height());

                  /*작업영역에 완벽하게 들어가지 않았을 경우 원래자리로 초기화*/
                  if(boothLeft <= boardLeft ||
                      boothLeft >= boardLeft + boardWidth  - boothWidth ||
                      boothTop  <= boardTop  ||
                      boothTop  >= boardTop  + boardHeight - boothHeight){

                      $(this).css({
                          "top":"0px",
                          "left":"0px"
                      });
                      return;
                  }
                  //====================

                  /*작업장에 올라와있는 부스 요소의 id속성 get 및 부스간 충돌 판정*/
                  if($('.boothContent').length){
                      for(var i = 0, length = boothObjArr.length; i < length; i++){
                          if((boothLeft+boothWidth) > boothObjArr[i].getLeft() &&
                              boothLeft < (boothObjArr[i].getLeft() + boothObjArr[i].getBooth().width()) &&
                              (boothTop+boothHeight) > boothObjArr[i].getTop() &&
                              boothTop < (boothObjArr[i].getTop() + boothObjArr[i].getBooth().height())){
                              $(this).css({
                                  "top":"0px",
                                  "left":"0px"
                              });
                              return;
                          }
                      }

                      var id = $('.boothContent').last().attr('id');
                      var idArr = id.split('_');
                      var idValue = Number(idArr[1])+1;
                  }else{
                      var idValue = 1;
                  }
                  //====================

                  var booth = "<div class='boothContent' id=content_" + idValue + "><img src='{{asset('/img/icon/')}}/test.png' style='width:100%;height:100%; border-radius: 5px;'></div>";
                  booth_num++;
                  /*부스객체 추가, 부스도형 초기화 및 작업장에 부스 추가*/
                  $(".draggable").append(booth);
                  var boothObj = new boothObj();

                  boothObj.setBooth($('#content_'+idValue));
                  boothObj.setTop(boothTop);
                  boothObj.setLeft(boothLeft);

                  boothObjArr.push(boothObj);

                  $('#content_'+idValue).css({
                      "position":"absolute",
                      "top": boothTop-10,
                      "left": boothLeft-10,
                      "width" : 58,
                      "height" : 58
                  });

                  $(this).css({
                      "top":"0px",
                      "left":"0px"
                  });
                  //==================================



                  /*작업장에 추가된 부스요소의 크기조절 및 draggable속성 추가 및 옵션설정*/
                  $('.boothContent').resizable({
                      start:function(){
                          //현재의 위치값과 배치도의 크기를 계산하여 배치도를 넘어가지 않게 함
                          var thisLeft     = Number($(this).offset().left);
                          var thisTop      = Number($(this).offset().top);
                          $(this).resizable( "option", "maxWidth", (boardWidth-thisLeft+boardLeft) );
                          $(this).resizable( "option", "maxHeight", (boardHeight-thisTop+boardTop) );
                      },
                      grid: [20,20],
                      minHeight: 28, //최소 부스 크기
                      minWidth: 28,  //최소 부스 크기
                      stop:function(){
                          // 간단한 사이즈 표시
                          var thisWidth    = Number($(this).width());
                          var thisHeight   = Number($(this).height());
                          var thisLeft     = Number($(this).offset().left);
                          var thisTop      = Number($(this).offset().top);

                          if(thisWidth <58){
                              thisWidth = 58;
                              $(this).css('width',thisWidth);
                          }
                          if(thisHeight <58){
                              thisHeight = 58;
                              $(this).css('height',thisHeight);
                          }

                          var id = $(this).attr('id');

                          for(var i = 0, length = boothObjArr.length; i < length; i++){
                              if(id == boothObjArr[i].getBooth().attr('id')){
                                  continue;
                              }
                              if((thisLeft+thisWidth) > boothObjArr[i].getLeft() &&
                                  thisLeft < ( boothObjArr[i].getLeft() + boothObjArr[i].getBooth().width()) &&
                                  (thisTop+thisHeight) > boothObjArr[i].getTop() &&
                                  thisTop < (boothObjArr[i].getTop() + boothObjArr[i].getBooth().height())){
                                  for(var i = 0, length = boothObjArr.length; i < length ; i++){

                                      if(id == boothObjArr[i].getBooth().attr('id')){
                                          window.alert('부스가 겹칩니다');
                                          $(this).css({
                                              "width":boothObjArr[i].getWidth(),
                                              "height":boothObjArr[i].getHeight()
                                          });
                                          return;
                                      }
                                  }
                              }
                          }

                          // 각 부스별 사이즈를 표시
                          for(var i = 0, length = boothObjArr.length; i < length ; i++){
                              if(id == boothObjArr[i].getBooth().attr('id')){
                                  boothObjArr[i].setWidth(thisWidth);
                                  boothObjArr[i].setHeight(thisHeight);
                                  $(this).children('p').html('사이즈 : '+(thisWidth)+' X '+(thisHeight));
                              }
                          }

                      }
                  }).draggable({
                      grid: [10,10],
                      snap: true,
                      stop:function(){
                          var thisLeft     = Number($(this).offset().left);
                          var thisTop      = Number($(this).offset().top);
                          var thisWidth    = Number($(this).width());
                          var thisHeight   = Number($(this).height());

                          var id = $(this).attr('id');

                          /*부스간 충돌방지*/
                          for(var i = 0, length = boothObjArr.length; i < length; i++){
                              if(id == boothObjArr[i].getBooth().attr('id')){
                                  continue;
                              }
                              if((thisLeft+thisWidth) > boothObjArr[i].getLeft() &&
                                  thisLeft < ( boothObjArr[i].getLeft() + boothObjArr[i].getBooth().width()) &&
                                  (thisTop+thisHeight) > boothObjArr[i].getTop() &&
                                  thisTop < (boothObjArr[i].getTop() + boothObjArr[i].getBooth().height())){
                                  for(var i = 0, length = boothObjArr.length; i < length ; i++){

                                      if(id == boothObjArr[i].getBooth().attr('id')){
                                          $(this).css({
                                              "top":boothObjArr[i].getTop() -10,
                                              "left":boothObjArr[i].getLeft() -10
                                          });
                                          return;
                                      }
                                  }
                              }
                          }
                          //=========================

                          //==================================================
                          // 부스 삭제

                          if(thisLeft >= garbageLeft - 60 &&
                              thisLeft <= Number(garbageLeft + garbageWidth - thisWidth + 60) &&
                              thisTop  >= garbageTop - 60  &&
                              thisTop+50  <= garbageTop + 120){

                              for(var i = 0, length = boothObjArr.length; i < length ; i++){
                                  if(id == boothObjArr[i].getBooth().attr('id')){
                                      boothObjArr[i]='';
                                      $(this).remove();
                                      boothObjArr.sort();
                                      boothObjArr.shift();
                                      //현재 부스 수를 표시
                                      $('.booth_su_count').text('현재 부스수:'+Number(boothObjArr.length - cnt_booth()));
                                      return;
                                  }
                              }
                          }

                          /*작업장 안의 부스요소가 작업장을 벗어나는 것을 방지*/
                          if(thisLeft <= boardLeft ||
                              thisLeft >= Number(boardLeft + boardWidth - thisWidth) ||
                              thisTop  <= boardTop  ||
                              thisTop  >= boardTop + boardHeight - thisHeight + 10){

                              for(var i = 0, length = boothObjArr.length; i < length ; i++){

                                  if(id == boothObjArr[i].getBooth().attr('id')){
                                      $(this).css({
                                          "position":"absolute",
                                          "top":boothObjArr[i].getTop() -10,
                                          "left":boothObjArr[i].getLeft() -10
                                      });
                                      return;
                                  }

                              }
                          }else{    /*작업장을 벗어나지 않고 이동했을 경우 객체에 좌표초기화*/
                              for(var i = 0, length = boothObjArr.length; i < length ; i++){
                                  if(id == boothObjArr[i].getBooth().attr('id')){
                                      boothObjArr[i].setTop(thisTop);
                                      boothObjArr[i].setLeft(thisLeft);
                                  }
                              }
                          }
                      }
                  });
                  //===================
              }
          })


          //================================ 장애물
          var object_num = 1;
          $( ".booth_object" ).draggable({
              grid: [10, 10],
              snap: true,
              stop:function(){

                  //현재 부스 수를 표시
                  $('.booth_su_count').text('현재 부스수:'+Number(boothObjArr.length - cnt_booth()));
                  function boothObj(){/*부스 클래스*/
                      this.top    = 0;
                      this.left   = 0;
                      this.width  = 78; //기본 크기
                      this.height = 78;
                      this.text = '장애물';
                      this.type = '지형';
                      this.booth;

                      this.getTop = function(){
                          return this.top;
                      }
                      this.getLeft = function(){
                          return this.left;
                      }
                      this.setTop = function(argTop){
                          this.top = argTop;
                      }
                      this.setLeft = function(argLeft){
                          this.left = argLeft;
                      }
                      this.setWidth = function(argWidth){
                          this.width = argWidth;
                      }
                      this.setHeight = function(argHeight){
                          this.height = argHeight;
                      }
                      this.getWidth = function(){
                          return this.width;
                      }
                      this.getHeight = function(){
                          return this.height;
                      }

                      this.getBooth = function(){
                          return this.booth;
                      }
                      this.setBooth = function(argBooth){
                          this.booth = argBooth;
                      }

                      this.getText = function(){
                          return this.text;
                      }
                      this.setText = function(argtext){
                          this.text = argtext;
                      }
                  }

                  var boothLeft     = Number($(this).offset().left);
                  var boothTop      = Number($(this).offset().top);
                  var boardLeft     = Number($('.draggable').offset().left);
                  var boardTop      = Number($('.draggable').offset().top);
                  var boardWidth    = Number($('.draggable').width());
                  var boothWidth    = Number($('.booth').width());
                  var boardHeight   = Number($('.draggable').height());
                  var boothHeight   = Number($('.booth').height());

                  // 쓰레기통의 값들
                  var garbageLeft   = Number($('.booth_del').offset().left);
                  var garbageTop    = Number($('.booth_del').offset().top);
                  var garbageWidth  = Number($('.booth_del').width());
                  var garbageHeight = Number($('.booth_del').height());

                /*작업영역에 완벽하게 들어가지 않았을 경우 원래자리로 초기화*/
                  if(boothLeft <= boardLeft ||
                      boothLeft >= boardLeft + boardWidth  - boothWidth ||
                      boothTop  <= boardTop  ||
                      boothTop  >= boardTop  + boardHeight - boothHeight){

                      $(this).css({
                          "top":"0px",
                          "left":"0px"
                      });
                      return;
                  }
                  //====================

                /*작업장에 올라와있는 부스 요소의 id속성 get 및 부스간 충돌 판정*/
                  if($('.boothContent').length){
                      for(var i = 0, length = boothObjArr.length; i < length; i++){
                          if((boothLeft+boothWidth) > boothObjArr[i].getLeft() &&
                              boothLeft < (boothObjArr[i].getLeft() + boothObjArr[i].getBooth().width()) &&
                              (boothTop+boothHeight) > boothObjArr[i].getTop() &&
                              boothTop < (boothObjArr[i].getTop() + boothObjArr[i].getBooth().height())){
                              $(this).css({
                                  "top":"0px",
                                  "left":"0px"
                              });
                              return;
                          }
                      }

                      var id = $('.boothContent').last().attr('id');
                      var idArr = id.split('_');
                      var idValue = Number(idArr[1])+1;
                  }else{
                      var idValue = 1;
                  }
                  //====================

                  var booth = "<div class='boothContent booth_object_set' id=content_" + idValue + "><img src='{{asset('/img/icon/')}}/ji.png' style='width:100%;height:76%; border-radius: 5px;'><p>장애물</p></div>";
                /*부스객체 추가, 부스도형 초기화 및 작업장에 부스 추가*/
                  object_num++;
                  $(".draggable").append(booth);
                  var boothObj = new boothObj();

                  boothObj.setBooth($('#content_'+idValue));
                  boothObj.setTop(boothTop);
                  boothObj.setLeft(boothLeft);

                  boothObjArr.push(boothObj);

                  $('#content_'+idValue).css({
                      "position":"absolute",
                      "top": boothTop-10,
                      "left": boothLeft-10,
                      "width" : 78,
                      "height" : 78
                  });

                  $(this).css({
                      "top":"0px",
                      "left":"0px"
                  });
                  //$('#content_'+idValue).css('background-color','lightblue');
                  //==================================



                /*작업장에 추가된 부스요소의 크기조절 및 draggable속성 추가 및 옵션설정*/
                  $('.boothContent').resizable({
                      start:function(){
                          //현재의 위치값과 배치도의 크기를 계산하여 배치도를 넘어가지 않게 함
                          var thisLeft     = Number($(this).offset().left);
                          var thisTop      = Number($(this).offset().top);
                          $(this).resizable( "option", "maxWidth", (boardWidth-thisLeft+boardLeft) );
                          $(this).resizable( "option", "maxHeight", (boardHeight-thisTop+boardTop) );
                      },
                      grid: [20,20],
                      minHeight: 28, //최소 부스 크기
                      minWidth: 28,  //최소 부스 크기
                      stop:function(){
                          // 간단한 사이즈 표시
                          var thisWidth    = Number($(this).width());
                          var thisHeight   = Number($(this).height());
                          var thisLeft     = Number($(this).offset().left);
                          var thisTop      = Number($(this).offset().top);

                          if(thisWidth <58){
                              thisWidth = 58;
                              $(this).css('width',thisWidth);
                          }
                          if(thisHeight <58){
                              thisHeight = 58;
                              $(this).css('height',thisHeight);
                          }

                          var id = $(this).attr('id');

                          for(var i = 0, length = boothObjArr.length; i < length; i++){
                              if(id == boothObjArr[i].getBooth().attr('id')){
                                  continue;
                              }
                              if((thisLeft+thisWidth) > boothObjArr[i].getLeft() &&
                                  thisLeft < ( boothObjArr[i].getLeft() + boothObjArr[i].getBooth().width()) &&
                                  (thisTop+thisHeight) > boothObjArr[i].getTop() &&
                                  thisTop < (boothObjArr[i].getTop() + boothObjArr[i].getBooth().height())){
                                  for(var i = 0, length = boothObjArr.length; i < length ; i++){

                                      if(id == boothObjArr[i].getBooth().attr('id')){
                                          window.alert('부스가 겹칩니다');
                                          $(this).css({
                                              "width":boothObjArr[i].getWidth(),
                                              "height":boothObjArr[i].getHeight()
                                          });
                                          return;
                                      }
                                  }
                              }
                          }

                          // 크기값 넣기
                          for(var i = 0, length = boothObjArr.length; i < length ; i++){
                              if(id == boothObjArr[i].getBooth().attr('id')){
                                  boothObjArr[i].setWidth(thisWidth);
                                  boothObjArr[i].setHeight(thisHeight);
                              }
                          }
                      }
                  }).draggable({
                      grid: [10,10],
                      snap: true,
                      stop:function(){
                          var thisLeft     = Number($(this).offset().left);
                          var thisTop      = Number($(this).offset().top);
                          var thisWidth    = Number($(this).width());
                          var thisHeight   = Number($(this).height());

                          var id = $(this).attr('id');

                        /*부스간 충돌방지*/
                          for(var i = 0, length = boothObjArr.length; i < length; i++){
                              if(id == boothObjArr[i].getBooth().attr('id')){
                                  continue;
                              }
                              if((thisLeft+thisWidth) > boothObjArr[i].getLeft() &&
                                  thisLeft < ( boothObjArr[i].getLeft() + boothObjArr[i].getBooth().width()) &&
                                  (thisTop+thisHeight) > boothObjArr[i].getTop() &&
                                  thisTop < (boothObjArr[i].getTop() + boothObjArr[i].getBooth().height())){
                                  for(var i = 0, length = boothObjArr.length; i < length ; i++){

                                      if(id == boothObjArr[i].getBooth().attr('id')){
                                          $(this).css({
                                              "top":boothObjArr[i].getTop() -10,
                                              "left":boothObjArr[i].getLeft() -10
                                          });
                                          return;
                                      }
                                  }
                              }
                          }
                          //=========================

                          //==================================================
                          // 부스 삭제

                          if(thisLeft >= garbageLeft - 60 &&
                              thisLeft <= Number(garbageLeft + garbageWidth - thisWidth + 60) &&
                              thisTop  >= garbageTop - 60  &&
                              thisTop+50  <= garbageTop + 120){

                              for(var i = 0, length = boothObjArr.length; i < length ; i++){
                                  if(id == boothObjArr[i].getBooth().attr('id')){
                                      boothObjArr[i]='';
                                      $(this).remove();
                                      boothObjArr.sort();
                                      boothObjArr.shift();
                                      //현재 부스 수를 표시
                                      $('.booth_su_count').text('현재 부스수:'+Number(boothObjArr.length - cnt_booth()));
                                      return;
                                  }
                              }
                          }

                        /*작업장 안의 부스요소가 작업장을 벗어나는 것을 방지*/
                          if(thisLeft <= boardLeft ||
                              thisLeft >= Number(boardLeft + boardWidth - thisWidth) ||
                              thisTop  <= boardTop  ||
                              thisTop  >= boardTop + boardHeight - thisHeight + 10){

                              for(var i = 0, length = boothObjArr.length; i < length ; i++){

                                  if(id == boothObjArr[i].getBooth().attr('id')){
                                      $(this).css({
                                          "position":"absolute",
                                          "top":boothObjArr[i].getTop() -10,
                                          "left":boothObjArr[i].getLeft() -10
                                      });
                                      return;
                                  }

                              }
                          }else{    /*작업장을 벗어나지 않고 이동했을 경우 객체에 좌표초기화*/
                              for(var i = 0, length = boothObjArr.length; i < length ; i++){
                                  if(id == boothObjArr[i].getBooth().attr('id')){
                                      boothObjArr[i].setTop(thisTop);
                                      boothObjArr[i].setLeft(thisLeft);
                                  }
                              }
                          }
                      }
                  });

                  //장애물의 값을 기억
                  $('#content_'+ idValue).click(function(){
                      var object_name = prompt('장애물의 이름을 입력하세요.');
                      if(object_name != '') {
                          $(this).children('p').text(object_name);
                          for (var i = 0; i < boothObjArr.length; i++) {
                              if (boothObjArr[i].booth.attr('id') == $(this).attr('id')) {
                                  boothObjArr[i].setText(object_name);
                              }
                          }
                      }
                  });
                  //===================
              }
          });

          //================================ 입구
          $( ".booth_entrance" ).draggable({
              grid: [10, 10],
              snap: true,
              stop:function(){

                  //현재 부스 수를 표시
                  $('.booth_su_count').text('현재 부스수:'+Number(boothObjArr.length - cnt_booth()));
                  function boothObj(){/*부스 클래스*/
                      this.top    = 0;
                      this.left   = 0;
                      this.width  = 78; //기본 크기
                      this.height = 78;
                      this.text = '입구';
                      this.type = '입구';
                      this.booth;

                      this.getTop = function(){
                          return this.top;
                      }
                      this.getLeft = function(){
                          return this.left;
                      }
                      this.setTop = function(argTop){
                          this.top = argTop;
                      }
                      this.setLeft = function(argLeft){
                          this.left = argLeft;
                      }
                      this.setWidth = function(argWidth){
                          this.width = argWidth;
                      }
                      this.setHeight = function(argHeight){
                          this.height = argHeight;
                      }
                      this.getWidth = function(){
                          return this.width;
                      }
                      this.getHeight = function(){
                          return this.height;
                      }

                      this.getBooth = function(){
                          return this.booth;
                      }
                      this.setBooth = function(argBooth){
                          this.booth = argBooth;
                      }

                      this.getText = function(){
                          return this.text;
                      }
                      this.setText = function(argtext){
                          this.text = argtext;
                      }
                  }

                  var boothLeft     = Number($(this).offset().left);
                  var boothTop      = Number($(this).offset().top);
                  var boardLeft     = Number($('.draggable').offset().left);
                  var boardTop      = Number($('.draggable').offset().top);
                  var boardWidth    = Number($('.draggable').width());
                  var boothWidth    = Number($('.booth').width());
                  var boardHeight   = Number($('.draggable').height());
                  var boothHeight   = Number($('.booth').height());

                  // 쓰레기통의 값들
                  var garbageLeft   = Number($('.booth_del').offset().left);
                  var garbageTop    = Number($('.booth_del').offset().top);
                  var garbageWidth  = Number($('.booth_del').width());
                  var garbageHeight = Number($('.booth_del').height());

                /*작업영역에 완벽하게 들어가지 않았을 경우 원래자리로 초기화*/
                  if(boothLeft <= boardLeft ||
                      boothLeft >= boardLeft + boardWidth  - boothWidth ||
                      boothTop  <= boardTop  ||
                      boothTop  >= boardTop  + boardHeight - boothHeight){

                      $(this).css({
                          "top":"0px",
                          "left":"0px"
                      });
                      return;
                  }
                  //====================

                /*작업장에 올라와있는 부스 요소의 id속성 get 및 부스간 충돌 판정*/
                  if($('.boothContent').length){
                      for(var i = 0, length = boothObjArr.length; i < length; i++){
                          if((boothLeft+boothWidth) > boothObjArr[i].getLeft() &&
                              boothLeft < (boothObjArr[i].getLeft() + boothObjArr[i].getBooth().width()) &&
                              (boothTop+boothHeight) > boothObjArr[i].getTop() &&
                              boothTop < (boothObjArr[i].getTop() + boothObjArr[i].getBooth().height())){
                              $(this).css({
                                  "top":"0px",
                                  "left":"0px"
                              });
                              return;
                          }
                      }

                      var id = $('.boothContent').last().attr('id');
                      var idArr = id.split('_');
                      var idValue = Number(idArr[1])+1;
                  }else{
                      var idValue = 1;
                  }
                  //====================

                  var booth = "<div class='boothContent booth_entrance_set' id=content_" + idValue + "><img src='{{asset('/img/icon/')}}/ipgu.png' style='width:100%;height:76%; border-radius: 5px;'><p>입구</p></div>";
                /*부스객체 추가, 부스도형 초기화 및 작업장에 부스 추가*/
                  $(".draggable").append(booth);
                  var boothObj = new boothObj();

                  boothObj.setBooth($('#content_'+idValue));
                  boothObj.setTop(boothTop);
                  boothObj.setLeft(boothLeft);

                  boothObjArr.push(boothObj);

                  $('#content_'+idValue).css({
                      "position":"absolute",
                      "top": boothTop-10,
                      "left": boothLeft-10,
                      "width" : 78,
                      "height" : 78
                  });

                  $(this).css({
                      "top":"0px",
                      "left":"0px"
                  });
                  //$('#content_'+idValue).css('background-color','lightyellow');
                  //==================================



                /*작업장에 추가된 부스요소의 크기조절 및 draggable속성 추가 및 옵션설정*/
                  $('.boothContent').resizable({
                      start:function(){
                          //현재의 위치값과 배치도의 크기를 계산하여 배치도를 넘어가지 않게 함
                          var thisLeft     = Number($(this).offset().left);
                          var thisTop      = Number($(this).offset().top);
                          $(this).resizable( "option", "maxWidth", (boardWidth-thisLeft+boardLeft) );
                          $(this).resizable( "option", "maxHeight", (boardHeight-thisTop+boardTop) );
                      },
                      grid: [20,20],
                      minHeight: 28, //최소 부스 크기
                      minWidth: 28,  //최소 부스 크기
                      stop:function(){
                          // 간단한 사이즈 표시
                          var thisWidth    = Number($(this).width());
                          var thisHeight   = Number($(this).height());
                          var thisLeft     = Number($(this).offset().left);
                          var thisTop      = Number($(this).offset().top);

                          if(thisWidth <58){
                              thisWidth = 58;
                              $(this).css('width',thisWidth);
                          }
                          if(thisHeight <58){
                              thisHeight = 58;
                              $(this).css('height',thisHeight);
                          }

                          var id = $(this).attr('id');

                          for(var i = 0, length = boothObjArr.length; i < length; i++){
                              if(id == boothObjArr[i].getBooth().attr('id')){
                                  continue;
                              }
                              if((thisLeft+thisWidth) > boothObjArr[i].getLeft() &&
                                  thisLeft < ( boothObjArr[i].getLeft() + boothObjArr[i].getBooth().width()) &&
                                  (thisTop+thisHeight) > boothObjArr[i].getTop() &&
                                  thisTop < (boothObjArr[i].getTop() + boothObjArr[i].getBooth().height())){
                                  for(var j = 0, length = boothObjArr.length; j < length ; j++){

                                      if(id == boothObjArr[j].getBooth().attr('id')){
                                          window.alert('부스가 겹칩니다');
                                          $(this).css({
                                              "width":boothObjArr[j].getWidth(),
                                              "height":boothObjArr[j].getHeight()
                                          });
                                          return;
                                      }
                                  }
                              }
                          }
                          // 크기값 넣기
                          for(var o = 0, length = boothObjArr.length; o < length ; o++){
                              if(id == boothObjArr[o].getBooth().attr('id')){
                                  boothObjArr[o].setWidth(thisWidth);
                                  boothObjArr[o].setHeight(thisHeight);
                              }
                          }
                      }
                  }).draggable({
                      grid: [10,10],
                      snap: true,
                      stop:function(){
                          var thisLeft     = Number($(this).offset().left);
                          var thisTop      = Number($(this).offset().top);
                          var thisWidth    = Number($(this).width());
                          var thisHeight   = Number($(this).height());

                          var id = $(this).attr('id');

                        /*부스간 충돌방지*/
                          for(var i = 0, length = boothObjArr.length; i < length; i++){
                              if(id == boothObjArr[i].getBooth().attr('id')){
                                  continue;
                              }
                              if((thisLeft+thisWidth) > boothObjArr[i].getLeft() &&
                                  thisLeft < ( boothObjArr[i].getLeft() + boothObjArr[i].getBooth().width()) &&
                                  (thisTop+thisHeight) > boothObjArr[i].getTop() &&
                                  thisTop < (boothObjArr[i].getTop() + boothObjArr[i].getBooth().height())){
                                  for(var i = 0, length = boothObjArr.length; i < length ; i++){

                                      if(id == boothObjArr[i].getBooth().attr('id')){
                                          $(this).css({
                                              "top":boothObjArr[i].getTop() -10,
                                              "left":boothObjArr[i].getLeft() -10
                                          });
                                          return;
                                      }
                                  }
                              }
                          }
                          //=========================

                          //==================================================
                          // 부스 삭제

                          if(thisLeft >= garbageLeft - 60 &&
                              thisLeft <= Number(garbageLeft + garbageWidth - thisWidth + 60) &&
                              thisTop  >= garbageTop - 60  &&
                              thisTop+50  <= garbageTop + 120){

                              for(var i = 0, length = boothObjArr.length; i < length ; i++){
                                  if(id == boothObjArr[i].getBooth().attr('id')){
                                      boothObjArr[i]='';
                                      $(this).remove();
                                      boothObjArr.sort();
                                      boothObjArr.shift();
                                      //현재 부스 수를 표시
                                      $('.booth_su_count').text('현재 부스수:'+Number(boothObjArr.length - cnt_booth()));
                                      return;
                                  }
                              }
                          }

                        /*작업장 안의 부스요소가 작업장을 벗어나는 것을 방지*/
                          if(thisLeft <= boardLeft ||
                              thisLeft >= Number(boardLeft + boardWidth - thisWidth) ||
                              thisTop  <= boardTop  ||
                              thisTop  >= boardTop + boardHeight - thisHeight + 10){

                              for(var i = 0, length = boothObjArr.length; i < length ; i++){

                                  if(id == boothObjArr[i].getBooth().attr('id')){
                                      $(this).css({
                                          "position":"absolute",
                                          "top":boothObjArr[i].getTop() -10,
                                          "left":boothObjArr[i].getLeft() -10
                                      });
                                      return;
                                  }

                              }
                          }else{    /*작업장을 벗어나지 않고 이동했을 경우 객체에 좌표초기화*/
                              for(var i = 0, length = boothObjArr.length; i < length ; i++){
                                  if(id == boothObjArr[i].getBooth().attr('id')){
                                      boothObjArr[i].setTop(thisTop);
                                      boothObjArr[i].setLeft(thisLeft);
                                  }
                              }
                          }
                      }
                  });

                  //입구 이름 지정
                  $('#content_'+ idValue).click(function(){
                      var object_name = prompt('입구의 이름을 정해주세요.');
                      if(object_name != '') {
                          $(this).children('p').text(object_name);
                          for (var i = 0; i < boothObjArr.length; i++) {
                              if (boothObjArr[i].booth.attr('id') == $(this).attr('id')) {
                                  boothObjArr[i].setText(object_name);
                              }
                          }
                      }
                  });
                  //===================
              }
          });

          //==========================================


          // 설정된 부스 불러오기(입구,지형)
          var idValue = 1;
          var booth_count = 0;
          @foreach($booths as $boothList)
          if('{{$boothList->type}}' != 'null'){
              function boothObj1() {/*부스 클래스*/
                  this.top = 0;
                  this.left = 0;
                  this.width = {{$boothList->width}}; //기본 크기
                  this.height = {{$boothList->height}};
                  this.type = '{{$boothList->type}}';
                  this.text = '{{$boothList->value}}';
                  this.user = '{{$boothList->user_id}}';
                  this.booth;

                  this.getTop = function () {
                      return this.top;
                  }
                  this.getLeft = function () {
                      return this.left;
                  }
                  this.setTop = function (argTop) {
                      this.top = argTop;
                  }
                  this.setLeft = function (argLeft) {
                      this.left = argLeft;
                  }
                  this.setWidth = function (argWidth) {
                      this.width = argWidth;
                  }
                  this.setHeight = function (argHeight) {
                      this.height = argHeight;
                  }
                  this.getWidth = function () {
                      return this.width;
                  }
                  this.getHeight = function () {
                      return this.height;
                  }

                  this.getBooth = function () {
                      return this.booth;
                  }
                  this.setBooth = function (argBooth) {
                      this.booth = argBooth;
                  }

                  this.getText = function(){
                      return this.text;
                  }
                  this.setText = function(argtext){
                      this.text = argtext;
                  }
              }

              var boothLeft = {{$boothList->left}}+table_left;
              var boothTop = {{$boothList->top}}+table_top;
              var boardLeft = Number($('.draggable').offset().left);
              var boardTop = Number($('.draggable').offset().top);
              var boardWidth = Number($('.draggable').width());
              var boothWidth = {{$boothList->width}};
              var boardHeight = Number($('.draggable').height());
              var boothHeight = {{$boothList->height}};


              // 쓰레기통의 값들
              var garbageLeft = Number($('.booth_del').offset().left);
              var garbageTop = Number($('.booth_del').offset().top);
              var garbageWidth = Number($('.booth_del').width());
              var garbageHeight = Number($('.booth_del').height());
              //====================

              if(boothLeft <= boardLeft ||
                  boothLeft >= boardLeft + boardWidth  - boothWidth ||
                  boothTop  <= boardTop  ||
                  boothTop  >= boardTop  + boardHeight - boothHeight){

                  $(this).css({
                      "top":"0px",
                      "left":"0px"
                  });
                  return;
              }
              //====================

            /*작업장에 올라와있는 부스 요소의 id속성 get 및 부스간 충돌 판정*/
              if($('.boothContent').length) {
                  for (var i = 0, length = boothObjArr.length; i < length; i++) {
                      if ((boothLeft + boothWidth) > boothObjArr[i].getLeft() &&
                          boothLeft < (boothObjArr[i].getLeft() + boothObjArr[i].getBooth().width()) &&
                          (boothTop + boothHeight) > boothObjArr[i].getTop() &&
                          boothTop < (boothObjArr[i].getTop() + boothObjArr[i].getBooth().height())) {
                          $(this).css({
                              "top": "0px",
                              "left": "0px"
                          });
                          return;
                      }
                  }
              }

              if ('{{$boothList->type}}' != 'null'){
                  var booth = "<div class='boothContent' id=content_" + idValue + "><p>{{$boothList->value}}</p></div>";
              } else{
                  var booth = "<div class='boothContent' id=content_" + idValue + "><p>부스" + idValue + "</p></div>";
              }

            /*부스객체 추가, 부스도형 초기화 및 작업장에 부스 추가*/
              $(".draggable").append(booth);
              var boothObj = new boothObj1();

              boothObj.setBooth($('#content_' + idValue));
              boothObj.setTop(boothTop);
              boothObj.setLeft(boothLeft);

              boothObjArr.push(boothObj);

              $('#content_' + idValue).css({
                  "position": "absolute",
                  "top": boothTop - 10,
                  "left": boothLeft - 10,
                  "height": boothHeight,
                  "width": boothWidth
              });


              min = 98;
              if ('{{$boothList->type}}' != 'null'){
                  if ('{{$boothList->type}}' == '입구'){
                      $('#content_' + idValue).css('background-color','lightyellow');
                      min = 38;
                  } else{
                      $('#content_' + idValue).css('background-color','lightblue');
                  }
              }
              idValue++;

              $('.boothContent').resizable({
                  start: function () {
                      //현재의 위치값과 배치도의 크기를 계산하여 배치도를 넘어가지 않게 함
                      var thisLeft = Number($(this).offset().left);
                      var thisTop = Number($(this).offset().top);
                      $(this).resizable("option", "maxWidth", (boardWidth - thisLeft + boardLeft));
                      $(this).resizable("option", "maxHeight", (boardHeight - thisTop + boardTop));
                  },
                  grid: [20, 20],
                  minHeight: 28, //최소 부스 크기
                  minWidth: 28,  //최소 부스 크기
                  stop: function () {
                      // 간단한 사이즈 표시
                      var thisWidth = Number($(this).width());
                      var thisHeight = Number($(this).height());
                      var thisLeft = Number($(this).offset().left);
                      var thisTop = Number($(this).offset().top);

                      var id = $(this).attr('id');

                      for (var i = 0, length = boothObjArr.length; i < length; i++) {
                          if (id == boothObjArr[i].getBooth().attr('id')) {
                              continue;
                          }
                          if ((thisLeft + thisWidth) > boothObjArr[i].getLeft() &&
                              thisLeft < ( boothObjArr[i].getLeft() + boothObjArr[i].getBooth().width()) &&
                              (thisTop + thisHeight) > boothObjArr[i].getTop() &&
                              thisTop < (boothObjArr[i].getTop() + boothObjArr[i].getBooth().height())) {
                              for (var i = 0, length = boothObjArr.length; i < length; i++) {

                                  if (id == boothObjArr[i].getBooth().attr('id')) {
                                      window.alert('부스가 겹칩니다');
                                      $(this).css({
                                          "width": boothObjArr[i].getWidth(),
                                          "height": boothObjArr[i].getHeight()
                                      });
                                      return;
                                  }
                              }
                          }
                          // 크기값 넣기
                          for(var i = 0, length = boothObjArr.length; i < length ; i++){
                              if(id == boothObjArr[i].getBooth().attr('id')){
                                  boothObjArr[i].setWidth(thisWidth);
                                  boothObjArr[i].setHeight(thisHeight);
                              }
                          }
                      }
                  }
              }).draggable({
                  grid: [10, 10],
                  snap: true,
                  stop: function () {
                      var thisLeft = Number($(this).offset().left);
                      var thisTop = Number($(this).offset().top);
                      var thisWidth = Number($(this).width());
                      var thisHeight = Number($(this).height());

                      var id = $(this).attr('id');

                    /*부스간 충돌방지*/
                      for (var i = 0, length = boothObjArr.length; i < length; i++) {
                          if (id == boothObjArr[i].getBooth().attr('id')) {
                              continue;
                          }
                          if ((thisLeft + thisWidth) > boothObjArr[i].getLeft() &&
                              thisLeft < ( boothObjArr[i].getLeft() + boothObjArr[i].getBooth().width()) &&
                              (thisTop + thisHeight) > boothObjArr[i].getTop() &&
                              thisTop < (boothObjArr[i].getTop() + boothObjArr[i].getBooth().height())) {
                              for (var i = 0, length = boothObjArr.length; i < length; i++) {

                                  if (id == boothObjArr[i].getBooth().attr('id')) {
                                      $(this).css({
                                          "top": boothObjArr[i].getTop() - 10,
                                          "left": boothObjArr[i].getLeft() - 10
                                      });
                                      return;
                                  }
                              }
                          }
                      }
                  }
              });
              //입구 이름 지정
              $('#content_' + (idValue-1)).click(function(){
                  var object_name = prompt('이름을 정해주세요.');
                  if(object_name != '') {
                      $(this).children('p').text(object_name);
                      for (var i = 0; i < boothObjArr.length; i++) {
                          if (boothObjArr[i].booth.attr('id') == $(this).attr('id')) {
                              boothObjArr[i].setText(object_name);
                          }
                      }
                  }
              });
          }else {

              // 일반 부스 불러오기
              function boothObj1() {/*부스 클래스*/
                  this.top = 0;
                  this.left = 0;
                  this.width = {{$boothList->width}}; //기본 크기
                  this.height = {{$boothList->height}};
                  this.user = '{{$boothList->user_id}}';
                  this.booth;

                  this.getTop = function () {
                      return this.top;
                  }
                  this.getLeft = function () {
                      return this.left;
                  }
                  this.setTop = function (argTop) {
                      this.top = argTop;
                  }
                  this.setLeft = function (argLeft) {
                      this.left = argLeft;
                  }
                  this.setWidth = function (argWidth) {
                      this.width = argWidth;
                  }
                  this.setHeight = function (argHeight) {
                      this.height = argHeight;
                  }
                  this.getWidth = function () {
                      return this.width;
                  }
                  this.getHeight = function () {
                      return this.height;
                  }

                  this.getBooth = function () {
                      return this.booth;
                  }
                  this.setBooth = function (argBooth) {
                      this.booth = argBooth;
                  }
              }

              var boothLeft = {{$boothList->left}}+table_left;
              var boothTop = {{$boothList->top}}+table_top;
              var boardLeft = Number($('.draggable').offset().left);
              var boardTop = Number($('.draggable').offset().top);
              var boardWidth = Number($('.draggable').width());
              var boothWidth = {{$boothList->width}};
              var boardHeight = Number($('.draggable').height());
              var boothHeight = {{$boothList->height}};


              // 쓰레기통의 값들
              var garbageLeft = Number($('.booth_del').offset().left);
              var garbageTop = Number($('.booth_del').offset().top);
              var garbageWidth = Number($('.booth_del').width());
              var garbageHeight = Number($('.booth_del').height());
              //====================

              if (boothLeft <= boardLeft ||
                  boothLeft >= boardLeft + boardWidth - boothWidth ||
                  boothTop <= boardTop ||
                  boothTop >= boardTop + boardHeight - boothHeight) {

                  $(this).css({
                      "top": "0px",
                      "left": "0px"
                  });
                  return;
              }
              //====================

            /*작업장에 올라와있는 부스 요소의 id속성 get 및 부스간 충돌 판정*/
              if ($('.boothContent').length) {
                  for (var i = 0, length = boothObjArr.length; i < length; i++) {
                      if ((boothLeft + boothWidth) > boothObjArr[i].getLeft() &&
                          boothLeft < (boothObjArr[i].getLeft() + boothObjArr[i].getBooth().width()) &&
                          (boothTop + boothHeight) > boothObjArr[i].getTop() &&
                          boothTop < (boothObjArr[i].getTop() + boothObjArr[i].getBooth().height())) {
                          $(this).css({
                              "top": "0px",
                              "left": "0px"
                          });
                          return;
                      }
                  }
              }

              if ('{{$boothList->type}}' != 'null') {
                  var booth = "<div class='boothContent' id=content_" + idValue + "><p>{{$boothList->value}}</p></div>";
              } else {
                  var booth = "<div class='boothContent' id=content_" + idValue + "><img src='{{asset('/img/icon/')}}/test.png' style='width:100%;height:100%; border-radius: 5px;'></div>";
              }

            /*부스객체 추가, 부스도형 초기화 및 작업장에 부스 추가*/
              $(".draggable").append(booth);
              var boothObj = new boothObj1();

              boothObj.setBooth($('#content_' + idValue));
              boothObj.setTop(boothTop);
              boothObj.setLeft(boothLeft);

              boothObjArr.push(boothObj);

              $('#content_' + idValue).css({
                  "position": "absolute",
                  "top": boothTop - 10,
                  "left": boothLeft - 10,
                  "height": boothHeight,
                  "width": boothWidth
              });


              if ('{{$boothList->type}}' != 'null') {
                  if ('{{$boothList->type}}' == '입구') {
                      $('#content_' + idValue).css('background-color', 'lightyellow');
                  } else {
                      $('#content_' + idValue).css('background-color', 'lightblue');
                  }
              }
              idValue++;

              $('.boothContent').resizable({
                  start: function () {
                      //현재의 위치값과 배치도의 크기를 계산하여 배치도를 넘어가지 않게 함
                      var thisLeft = Number($(this).offset().left);
                      var thisTop = Number($(this).offset().top);
                      $(this).resizable("option", "maxWidth", (boardWidth - thisLeft + boardLeft));
                      $(this).resizable("option", "maxHeight", (boardHeight - thisTop + boardTop));
                  },
                  grid: [20, 20],
                  minHeight: 58, //최소 부스 크기
                  minWidth: 58,  //최소 부스 크기
                  stop: function () {
                      // 간단한 사이즈 표시
                      var thisWidth = Number($(this).width());
                      var thisHeight = Number($(this).height());
                      var thisLeft = Number($(this).offset().left);
                      var thisTop = Number($(this).offset().top);

                      var id = $(this).attr('id');

                      for (var i = 0, length = boothObjArr.length; i < length; i++) {
                          if (id == boothObjArr[i].getBooth().attr('id')) {
                              continue;
                          }
                          if ((thisLeft + thisWidth) > boothObjArr[i].getLeft() &&
                              thisLeft < ( boothObjArr[i].getLeft() + boothObjArr[i].getBooth().width()) &&
                              (thisTop + thisHeight) > boothObjArr[i].getTop() &&
                              thisTop < (boothObjArr[i].getTop() + boothObjArr[i].getBooth().height())) {
                              for (var i = 0, length = boothObjArr.length; i < length; i++) {

                                  if (id == boothObjArr[i].getBooth().attr('id')) {
                                      window.alert('부스가 겹칩니다');
                                      $(this).css({
                                          "width": boothObjArr[i].getWidth(),
                                          "height": boothObjArr[i].getHeight()
                                      });
                                      return;
                                  }
                              }
                          }
                      }

                      // 각 부스별 사이즈를 표시
                      for (var i = 0, length = boothObjArr.length; i < length; i++) {
                          if (id == boothObjArr[i].getBooth().attr('id')) {
                              boothObjArr[i].setWidth(thisWidth);
                              boothObjArr[i].setHeight(thisHeight);
                              $(this).children('p').html('사이즈 : ' + (thisWidth + 2) + ' X ' + (thisHeight + 2));
                          }
                      }

                  }
              }).draggable({
                  grid: [10, 10],
                  snap: true,
                  stop: function () {
                      var thisLeft = Number($(this).offset().left);
                      var thisTop = Number($(this).offset().top);
                      var thisWidth = Number($(this).width());
                      var thisHeight = Number($(this).height());

                      var id = $(this).attr('id');

                    /*부스간 충돌방지*/
                      for (var i = 0, length = boothObjArr.length; i < length; i++) {
                          if (id == boothObjArr[i].getBooth().attr('id')) {
                              continue;
                          }
                          if ((thisLeft + thisWidth) > boothObjArr[i].getLeft() &&
                              thisLeft < ( boothObjArr[i].getLeft() + boothObjArr[i].getBooth().width()) &&
                              (thisTop + thisHeight) > boothObjArr[i].getTop() &&
                              thisTop < (boothObjArr[i].getTop() + boothObjArr[i].getBooth().height())) {
                              for (var i = 0, length = boothObjArr.length; i < length; i++) {

                                  if (id == boothObjArr[i].getBooth().attr('id')) {
                                      $(this).css({
                                          "top": boothObjArr[i].getTop() - 10,
                                          "left": boothObjArr[i].getLeft() - 10
                                      });
                                      return;
                                  }
                              }
                          }
                      }
                  }
              });
          }
          booth_count++
          @endforeach
          $('.booth_su_count').text('현재 부스수:'+booth_count);


          //========= 부스 바 //
          $('#booth_bar').click(function(){
              console.log(boothObjArr);
          })

          function cnt_booth(){
              count_booth = 0;
              for(var i=0; i<boothObjArr.length; i++){
                  if(boothObjArr[i].text){
                      count_booth++;
                  }
              }
              return count_booth;
          }

      });
  </script>
</head>
<body>

<div class="wrapper">
  <div class="content" class="btn-group">
    <h5 style="margin-left:15px; margin-top:15px;margin-bottom:5px; color:darkgray">배치 아이템</h5>

    <div id="booth_bar" class="booth dropdown" style="float:left; margin-left:40px;">
      <div class="dropdown-mark"></div>
      <img src='{{asset('/img/icon/')}}/booth.png' style='width:100%;height:76%; border-radius: 5px;'>
      <p>부스</p>
      <div class="dropdown-content"> <!-- 드롭다운 메뉴 -->
        <div class="booth_size50 booth_booth_50">
          <img src='{{asset('/img/icon/')}}/booth_50.png' style='width:100%;height:100%; border-radius: 5px;'>
        </div>
        <div class="booth_size75 booth_booth_75">
          <img src='{{asset('/img/icon/')}}/booth_75.png' style='width:100%;height:100%; border-radius: 5px;'>
        </div>
        <div class="booth_size100 booth_booth">
          <img src='{{asset('/img/icon/')}}/booth_100.png' style='width:100%;height:100%; border-radius: 5px;'>
        </div>
      </div>
    </div>
    <div class="booth booth_entrance" style="float:left;">
      <img src='{{asset('/img/icon/')}}/entrance.png' style='width:100%;height:76%; border-radius: 5px;'>
      <p>입구</p>
    </div>
    <div class="booth booth_object" style="float:left;">
      <img src='{{asset('/img/icon/')}}/ground.png' style='width:100%;height:76%; border-radius: 5px;'>
      <p>지형</p>
    </div>

    <div class="booth_del" style="float:left;">
      <img src='{{asset('/img/icon/')}}/del.png' style='width:100%;height:76%; border-radius: 5px;'>
      삭제
    </div>

    <div id="reset" class="bar_btn" style="width:90px; height:90px; float:left;text-align:center; ">
      <img src='{{asset('/img/icon/')}}/re.png' style='width:100%;height:76%; border-radius: 5px;'>
      초기화
    </div>
    <div id="img_add" class="bar_btn" style="width:90px; height:90px; float:left; text-align:center">
      <img src='{{asset('/img/icon/')}}/img.png' style='width:100%;height:76%; border-radius: 5px;'>
      이미지 첨부
    </div>
    <div id="finish" class="bar_btn" style="text-align:center; vertical-align: top;float:left; background-color:#cd0a0a; padding-top:32px; color:white;width:90px; height:90px; font-weight: bold;">제작완료</div>
  </div>

  <div class="draggable ui-widget-content">
    <img id="back_img" style="width:100%;height:100%;"> <!-- 이미지 -->
  </div>
  <div class="booth_su">
    <p class="booth_su_count">현재 부스수:0</p>
  </div>
</div>

<!--    작업 시작    -->

<script> //이미지 첨부 모달
    $(document).ready(function(){
        $('#img_add').click(function(){
            $('#image_modal').modal('show');
        })

        $('#image_save').click(function(){
            $('#back_img').attr('src', image_data);
            $('#image_modal').modal('hide');
        })

        $("#img_file").on('change', function(){
            readURL(this);
        });

        var image_data;
        // 이미지 미리보기
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#miribogi').attr('src', e.target.result);
                    image_data = e.target.result;
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    });
</script>

<div id="image_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">이미지 등록</h4>
      </div>
      <div class="modal-body">
        <div id="image_info" class="thumbnail"><img id="miribogi" src="/img/img.png"></div> <!-- 이미지가 표시될 영역 -->
        <div id="image_file"><input name="img_file" type="file" id="img_file"></div>
      </div>
      <div class="modal-footer">
        <button id="image_save" type="button" class="btn 1-default">등록</button>
      </div>
    </div>

  </div>
</div>

<!--    작업 끝    -->
<div class="booth_footer">

</div>

</body>
@endsection
