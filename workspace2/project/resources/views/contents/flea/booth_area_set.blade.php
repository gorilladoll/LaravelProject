@extends('layouts.app')

@section('content')
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<style>
  #wrap{
    margin:0 auto;
    width:900px;
    height:800px;
  }
  #drawable_area{
    width: 600px; height: 500px;
    border: 2px solid black;
    float: left;
  }

  .drew_area{
    background-color: #86D5FF;
    opacity: 0.6;
    position: absolute;
  }

  .booth{
    position:absolute;
    border: 1px solid black;
    width: 100px; height: 100px;
    margin-top: 30px;
    margin-left: 30px;
  }

  .selected{
    background-color: #F39814;
  }

  #drew_area_list{
    float: right;
    width: 200px; height: 500px;
    border: 2px solid black;
  }

  .areaList{
    width: 98%;
    height: 50px;
    border: 1px solid black;
    background-color: white;
  }

  .selectedList{
    background-color: #F39814;
  }

  #listBtn{
    width: 70%;
  }

  .selectedArea{
    background-color: #2c7bf9;
  }
  #button_div{
    height:60px;
    width:400px;
    float:left;
  }
  #button_div2{
    height:60px;
    width:100px;
    float:right;
  }
  #send_button{
    width:100px;
    height:50px;
    border-radius: 5px;
    background-color:white;
  }
  #createArea{
    width:130px;
    height:50px;
    border-radius: 5px;
    background-color:white;
  }
  #selectArea{
    width:130px;
    height:50px;
    border-radius: 5px;
    background-color:white;
  }
</style>


<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>


  // 영역 그리기를 할 때 충돌 부분에서 모순발생 -> 영역간에 서로 침범시 그리는 것이 불가능 해야 하지만 특정 경우 그냥 그려지는 경우 발생
  // 충분히 유의하면서 시연할 수 있도록
  $(document).ready(function(){
    
    $('#send_button').click(function(){
      // alert("test");
      var perServerBoothArr = Array();
      for(var i = 0, length = boothArr.length; i < length; i++){
        perServerBoothArr[i] = {};
        perServerBoothArr[i]['booth_id'] = boothArr[i]['booth_id'];
        perServerBoothArr[i]['category'] = boothArr[i]['category'];
      }
      // console.log(perServerBoothArr);
      $.ajax({/*서버에 값 전달*/
        url : '/booth/categorySave',
        dataType : 'jsonp',
        data: {
          boothArr : perServerBoothArr
        },
        success : function(data){
          alert(data+' 저장이 완료되었습니다.');
          window.location.href="/fleamarket/sellerSet/{{$booth_name}}/th/{{$th_id}}";
        },
        error : function(){
          console.log(perServerBoothArr);
          alert('에러가 발생하였습니다');
        }
      }); 
    });
    
    $('#ui-widget-content').draggable({
      grid:[20,20]
    });
    var areaArr = Array();
    var boothArr = Array();
    var boothconstArr = Array();
    var area_drawing = false;
    var drawFail = false;
    var area_offset = {};
    var basicSize = 100;
    
    function boothObj(){/*부스 클래스*/
        this.booth;
        this.category;
        this.booth_id;  //db상의 booth컬럼 id
    }
    // var boothObj1 = new boothObj();
    // boothObj1.booth = $('#booth_1');
    // boothObj1.category = "1";
    // boothArr[0] = boothObj1;
    // var boothObj2 = new boothObj();
    // boothObj2.booth = $('#booth_2');
    // boothObj2.category = "2";
    // boothArr[1] = boothObj2;
    // var boothObj3 = new boothObj();
    // boothObj3.booth = $('#booth_3');
    // boothObj3.category = "3";
    // boothArr[2] = boothObj3;
    @for($i = 0, $length = count($boothInfo); $i < $length; $i++)
      boothconstArr[{{$i}}] = new boothObj();
    @endfor
    
    @for($i = 0, $length = count($boothInfo); $i < $length; $i++)
      
      var booth = "<div class='booth' id='booth_"+{{$i}}+"'></div>";
      $('#drawable_area').append(booth);
      var offset = $('#drawable_area').offset();
      
      $('#booth_'+{{$i}}).css('top',{{$boothInfo[$i]->top}}+offset.top);
      $('#booth_'+{{$i}}).css('left',{{$boothInfo[$i]->left}}+offset.left);
      $('#booth_'+{{$i}}).css('width',{{$boothInfo[$i]->width}});
      $('#booth_'+{{$i}}).css('height',{{$boothInfo[$i]->height}});
      
      boothconstArr[{{$i}}].booth = $('#booth_'+{{$i}});
      boothconstArr[{{$i}}].category = "";
      boothconstArr[{{$i}}].booth_id = {{$boothInfo[$i]->id}};
      boothArr[{{$i}}] = boothconstArr[{{$i}}];
    @endfor

    console.log(boothArr);
    
    
      
    

    function setAreaStyle(argTop,argLeft,argWidth,argHeight,argAreaId){//위치, 좌표값의 셋팅
      var style = "top:"+argTop+"px; left:"+argLeft+"px; width:"+argWidth+"px; height:"+argHeight+"px;";
      $("#area_"+argAreaId).attr("style",style);
    }    

    $(document.body).on('mousedown','#drawable_area',function(event){

      var offset = $("#drawable_area").offset();
      
      //마지막으로 추가된 요소의 id값 얻어서 그 다음 id 값으로 요소 생성하기위함
      if($('.drew_area').length){
        var id = $('.drew_area').last().attr('id');
        var idArr = id.split('_');
        area_offset['lastId'] = Number(idArr[1])+1;
      }else{
        area_offset['lastId'] = 0;
      }

      // div 요소 추가
      var drew_area = "<div class='drew_area' id='area_"+area_offset['lastId']+"'></div>";
      $("#drawable_area").append(drew_area);

      area_offset["start_x"] = event.clientX;
      area_offset["start_y"] = event.clientY;
      area_offset["boxing"] = true;

      setAreaStyle(area_offset["start_y"],area_offset['start_x'],0,0,area_offset['lastId']);      
      area_offset['element'] = $('area_'+area_offset['lastId']);
      $('area_'+area_offset['lastId']).draggable({
        grid:[10,10]
      });
    });

    $(document.body).mouseup(function(event){ //영역 밖에서 mouseup이 되었을 경우
      var offset = $("#drawable_area").offset();
      if((event.clientY > offset.top && event.clientY < offset.top + $("#drawable_area").height() &&
          event.clientX > offset.left && event.clientX < offset.left + $("#drawable_area").width()) ||
         (area_offset['width'] == undefined || area_offset['height'] == undefined)){
        //continue; 
      }else{
        drawFail = true;
        $('#area_'+area_offset['lastId']).remove();
      }
    });

    $(document.body).on('mouseup','#drawable_area',function(event,data){
      function areaObj(){
        this.id     = 0;
        this.top    = 0;
        this.left   = 0;
        this.width  = 0;
        this.height = 0;
        this.element;
        this.selectedList;
        this.selectedBooth = Array();
      }
      var areaObj = new areaObj();//객체 생성

      /* 변수 초기화 */
      var offset = $("#drawable_area").offset();
      var addListBtn;

      if((event.clientY > offset.top && event.clientY < offset.top + $("#drawable_area").height() &&
          event.clientX > offset.left && event.clientX < offset.left + $("#drawable_area").width()) ||
         (area_offset['width'] == undefined || area_offset['height'] == undefined)){
        //mouseup 했을 때 
        drawFail = false;
      }

      if(area_offset["boxing"]){

        if(area_offset["width"] == undefined || area_offset["height"] == undefined || area_offset["width"] <basicSize || area_offset["height"] < basicSize){
          //크기가 기본설정크기이상이 아닐 경우
          $('#area_'+area_offset['lastId']).remove();
          areaArr.pop();
          return;
        }

        areaObj.id      = area_offset['lastId'];
        areaObj.top     = area_offset['top'];
        areaObj.left    = area_offset['left'];
        areaObj.width   = area_offset['width'];
        areaObj.height  = area_offset['height'];
        areaObj.element = $('#area_'+area_offset['lastId']);
        areaArr.push(areaObj);
        
        if(drawFail){
          $('#area_'+area_offset['lastId']).remove();
          areaArr.pop();
        }

        for(var i = 0; i < areaArr.length; i++){ //충돌 방지
          if((areaArr[i]['top'] < area_offset['top'] && area_offset['top'] < areaArr[i]['top'] + areaArr[i]['height']) &&
             (areaArr[i]['left'] < area_offset['left'] && area_offset['left'] < areaArr[i]['left'] + areaArr[i]['width'])){
               //현재 생성한 영역의 top, left 좌표가 생성된 영역을 안쪽으로 침범하였을 경우
              $('#area_'+area_offset['lastId']).remove();
              areaArr.pop();
              return;
          }else{ //현재 생성한 영역이 이미 생성된 영역의 외부에서 감싸듯이 침범하였을 경우
            if(((area_offset['top'] < areaArr[i]['top'] && areaArr[i]['top'] < area_offset['top'] + area_offset['height']) ||
               (area_offset['top'] < areaArr[i]['top'] + areaArr[i]['height']  && areaArr[i]['top'] + areaArr[i]['height'] < area_offset['top'] + area_offset['height'])) &&
               ((area_offset['left'] < areaArr[i]['left'] && areaArr[i]['left'] < area_offset['left'] + area_offset['width']) ||
               (area_offset['left'] < areaArr[i]['left'] + areaArr[i]['width'] && areaArr[i]['left'] + areaArr[i]['width'] < area_offset['left'] + area_offset['width']))){
              $('#area_'+area_offset['lastId']).remove();
              areaArr.pop();
              return;
            }
          }
        }

        /*=====영역 안에 들어온 부스 선택 및 객체에 정보 저장 ======*/
        for(var i = 0; i < boothArr.length ; i++){ 
          if(boothArr[i].booth.width() < area_offset['width'] && boothArr[i].booth.height() < area_offset['height'] &&
             (area_offset['top'] < boothArr[i].booth.offset().top && boothArr[i].booth.offset().top < area_offset['top'] + area_offset['height']) && 
             (area_offset['left'] < boothArr[i].booth.offset().left && boothArr[i].booth.offset().left < area_offset['left'] + area_offset['width']) &&
             (area_offset['top'] < boothArr[i].booth.offset().top && boothArr[i].booth.offset().top + boothArr[i].booth.height() < area_offset['top'] + area_offset['height']) && 
             (area_offset['left'] < boothArr[i].booth.offset().left && boothArr[i].booth.offset().left + boothArr[i].booth.width() < area_offset['left'] + area_offset['width'])){
              boothArr[i].booth.attr('class','booth selected');
              areaArr[areaArr.length - 1].selectedBooth.push(boothArr[i]);
          }
        }

        /* 생성된 영역 list에 추가*/ 
        addListBtn = "<button class='areaList' id='listBtn_"+area_offset['lastId']+"'></button>";
        $('#drew_area_list').append(addListBtn);
        areaArr[areaArr.length - 1].selectedList = $('#listBtn_'+area_offset['lastId']);

        area_offset = {};
        area_offset["boxing"] = false;
        console.log(areaArr);
      }
    });

    $(document.body).on('mousemove','#drawable_area',function(event){
      var offset = $("#drawable_area").offset();
    
      if(area_offset["boxing"]){

          
          area_offset["end_x"] = event.clientX;
          area_offset["end_y"] = event.clientY;

          //mouse move할 때마다 사분면을 체크하여 해당 4분면에 맞게 좌표와 크기값 조정
          if((area_offset["end_x"]-area_offset["start_x"]) < 0 && (area_offset["end_y"]-area_offset["start_y"]) < 0){//1사분면

              area_offset["top"]    = area_offset["end_y"];
              area_offset["left"]   = area_offset["end_x"];
              area_offset["width"]  = area_offset["start_x"]-area_offset["end_x"];
              area_offset["height"] = area_offset["start_y"]-area_offset["end_y"];

          }else if((area_offset["end_x"]-area_offset["start_x"]) > 0 && (area_offset["end_y"]-area_offset["start_y"]) < 0){//2사분면
              area_offset["top"]    = area_offset["end_y"];
              area_offset["left"]   = area_offset["start_x"];
              area_offset["width"]  = area_offset["end_x"]-area_offset["start_x"];
              area_offset["height"] = area_offset["start_y"]-area_offset["end_y"];

          }else if((area_offset["end_x"]-area_offset["start_x"]) < 0 && (area_offset["end_y"]-area_offset["start_y"]) > 0){//3사분면
              area_offset["top"]    = area_offset["start_y"];
              area_offset["left"]   = area_offset["end_x"];
              area_offset["width"]  = area_offset["start_x"]-area_offset["end_x"];
              area_offset["height"] = area_offset["end_y"]-area_offset["start_y"];

          }else{//4사분면

              area_offset["top"]    = area_offset["start_y"];
              area_offset["left"]   = area_offset["start_x"];
              area_offset["width"]  = area_offset["end_x"]-area_offset["start_x"];
              area_offset["height"] = area_offset["end_y"]-area_offset["start_y"];
          }
          setAreaStyle(area_offset['top'],area_offset['left'],area_offset['width'],area_offset['height'],area_offset['lastId']);
      }
      return false;
    });

    /* 리스트 클릭됬는지 여부 확인 */ 
    $(document.body).on('click','.areaList',function(){
      $('.selectedList').attr('class', 'areaList');
      $(this).attr('class', 'areaList selectedList');
      $('.drew_area').attr('class', 'drew_area');
      for(var i = 0, length = areaArr.length; i < length; i++){
        if(areaArr[i].selectedList.attr('class') == 'areaList selectedList'){
          areaArr[i].element.attr('class','drew_area selectedArea');
        }
      }
    });

    /*리스트 클릭 후 카테고리 삽입 기능*/ 
    $(document.body).on('click','#categoryConfirm',function(){
      var id      = $('.selectedList').attr('id');
      // alert(id);
      var idArr   = id.split('_');
      var listId  = Number(idArr[1]);

      for(var i = 0, length1 = areaArr.length ; i < length1; i++){

        if(listId == areaArr[i].id){

          for(var j = 0, length2 = areaArr[i].selectedBooth.length; j < length2; j++){
            areaArr[i].selectedBooth[j].category = $('#listBtn').val();
          }
        }
      }
    });

    /* 값 저장 후 전송 */


  });

</script>

<br><br><br><br>
<div id="wrap">
  
  <div id="drawable_area">
    <!--<div style="width: 100px; height: 100px; background-color: blue;"></div>-->
    <!--<div class="booth" id="booth_1"></div>-->
    <!--<div class="booth" id="booth_2"></div>-->
    <!--<div class="booth" id="booth_3"></div>-->
  </div>
  
  <div id="drew_area_list" style="float:left;"> 
  
    <input type="text" id="listBtn" name="category" value="value">
    <button id="categoryConfirm">확인</button>
  </div>
  
  <div id="button_div2" style="float:left;">
    <button id="send_button">저장</button>
  </div>
</div>
@endsection