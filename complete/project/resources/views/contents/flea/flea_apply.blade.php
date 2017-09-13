@extends('layouts.app')
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<style>
  #flea_apply{
    /*border:1px solid black;*/
    width:800px;
    height:1200px;
    margin:auto;
    font-family:'interparkM','interparkMEot';
  }
  .info_text{
    margin:auto;
    margin-top: 170px;
    font-size: 30px;
    font-family: 'interparkM','interparkMEot';
    margin-bottom: 50px;
    /*padding:20px;*/
    padding-top:8px;
    border:2px solid #f94a4a;
    border-radius:5px;
    width:400px;
    height:60px;
    background-color: /*#cc0a2d*/white;
    color: #f94a4a;
    text-align:center;
    box-shadow:5px 5px 10px #848484;
  }
  .info_text_goods{
    margin:auto;
    font-size: 30px;
    font-family: 'interparkM','interparkMEot';
    margin-bottom: 50px;
    padding-top:8px;
    width:100%;
    height:60px;
    background-color: #f94a4a;
    color: white;
    text-align:center;
  }
  .seller_info_input{
    margin: 0 auto;
    border:2px solid #f94a4a;
    width:100%;
    background-color:white;
    border-radius:6px;
    padding:20px;
    font-size:24px;
    box-shadow:5px 5px 10px #848484;
  }
  div.seller_goods {
    font-size:20p;
    margin: 0 auto;
    margin-top: 20px;
    width : 100%;
    border:2px solid #f94a4a;
    border-radius:6px;
    background-color:white;
    box-shadow:5px 5px 10px #848484;
  }

  div.seller_goods div.info_text{
    padding-top : 10px;
    padding-bottom: 10px;
  }
  .goods_list{
    height:500px;
    overflow-y: auto;
  }
  .goods_add{
    text-align: center;
    padding: 5px 3px;
    margin:20px 100px 10px 100px;
    font-size: 20px;
    border:2px solid #57b3f9;
    border-radius: 5px;
    color:#57b3f9;
    box-shadow:3px 3px 6px #848484;
  }

  .goods_my_list{
    width:800px;
    float:left;

    margin : 0 auto;
    margin-top:30px;
    margin-left:25px;
    height: 400px;
    overflow-y:auto;
    overflow-x:hidden;
  }
  .goods_info{
    width:800px;
    float:left;

    margin : 10px auto;
    margin-left:25px;
    padding:10px;
    font-size:24px;
  }
  .my_goods{
    width:180px;
    height:210px;
    font-size:20px;
    float:left;
  }
  .goods_img{
    width:160px;
    height:150px;
    margin:5px;
  }
  .add_list{
    width:700px;
    height:150px;
    margin:5px auto;
  }
  div.apply_button {
      text-align: center;
      margin-top: 10px;
  }
  .add_list > img {
      margin:4px;
      margin-left:20px;
      width:140px;
      height:140px;
      float:left;
  }
    .add_list > p {
        font-size:20px;
        margin: 10px;
        margin-left:30px;
        width:400px;
        float:left;
    }
    .add_list > h4{
        margin-top:65px;
    }
    .my_goods > p{
      margin:0;
      padding:0;
      text-align:center;
    }
    
    li{
      list-style:none;
    }
    .survey_preview{
      margin:0 auto; width:90%; height:80px;
      margin-top:40px;
    }
    .survey_q_preview{
      width:99%; height:30px; line-height:30px;
    }
    .survey_e_preview{
      border-top:1px solid #c9c9c9;
      width:99%; 
      height:30px;
      line-height:30px;
    }
    .survey_e_preview:last-child{
      border-bottom:1px solid #c9c9c9;
    }

    #survey_body{
      width:98%;
      height:auto; 
      min-height: 400px; 
      overflow: auto; 
    }
    
    .seller_reseach{
      font-size:20px;
      margin: 0 auto;
      margin-top: 30px;
      width : 100%;
      border:2px solid #f94a4a;
      border-radius:6px;
      background-color:white;
      box-shadow:5px 5px 10px #848484;
    }
    
    .info_text_research{
      margin:auto;
      font-size: 30px;
      font-family: 'interparkM','interparkMEot';
      margin-bottom: 50px;
      padding-top:8px;
      width:100%;
      height:60px;
      background-color: #f94a4a;
      color: white;
      text-align:center;
    }

    #save_btn{
      margin-top:20px;
      margin-bottom:60px;
      width:180px; 
      height:60px;
      background-color: #f94a4a;
      color:white;
      font-size:25px;
      box-shadow:5px 5px 10px #848484;
    }
</style>

<script>
  $(document).ready(function(){
      $('.goods_add').click(function(){
          $('#goods_modal').modal('show');
      })
      var last_select = 0;
      var goods_arr = Array();

    @foreach($my_lists as $my_list)
      var list_div = "<div class='my_goods thumbnail' id='{{$my_list->id}}'><input type='hidden' value='{{$my_list->filename}}'><div class='thumbnail goods_img'><img style='width:100%;height:100%;' src='{{asset('storage/image/'.$my_list->filename)}}'></div><p>{{$my_list->name}}</p></div>";
      $('.goods_my_list').append(list_div);
    @endforeach
      $('.my_goods').click(function(){
        $('#'+last_select).css('background-color','white');
        $(this).css('background-color','lightgreen');
        last_select = $(this).attr('id');
      })

      $('#goods_applys').click(function(){
          for(var i=0;i<goods_arr.length;i++){
              if(goods_arr[i].goods_id == last_select){
                  alert('선택한 물품이 이미 등록된 물품입니다!');
                  return;
              }
          }

          var price = $('#g_price').val();
          var quantity = $('#g_quantity').val();
          var file_name = $('#'+last_select).children('input').val();
          var goods_name = $('#'+last_select).text();

          if(last_select == 0){
              alert('상품을 선택해 주세요!');
              return;
          }
          if(price == '' || quantity == ''){
              alert('가격과 수량을 다시 확인해 주세요!');
              return;
          }

          function goods(num,name,price,quantity,file_name){
              this.goods_id = num;
              this.goods_name = name;
              this.price = price;
              this.quantity = quantity;
              this.filename = file_name;
          }

          var goods = new goods(last_select,goods_name,price,quantity,file_name);
          goods_arr.push(goods);
          // console.log(goods_arr);

          $('#g_price').val('');
          $('#g_quantity').val('');
          $('#'+last_select).css('background-color','white');
          last_select = 0;
          $('#goods_modal').modal('hide');
          view_goods();
      })

      function view_goods(){
          // 이미 있는 리스트 초기화
          for(var i=0;i < $('.goods_list').children().length; i++){
              $('.goods_list').children().remove();
          }
          // 새로운 리스트 추가
          for(var i=0;i<goods_arr.length;i++){
              var goods_view = "<div id='goods_"+goods_arr[i].goods_id+"' class='add_list thumbnail'>"+
                  "<img src='{{asset('storage/image/')}}/"+goods_arr[i].filename+"'>" +
                  '<p>물품 이름 : '+goods_arr[i].goods_name+'</p>'+
                  '<p>판매 가격 :'+goods_arr[i].price+'</p>'+
                  '<p>판매 수량 :'+goods_arr[i].quantity+'</p>'+
                  "<h4 class='del_goods'>[삭제]</h4>"+
                  "</div>";
              $('.goods_list').append(goods_view);
          }
          $('.del_goods').click(function(){
              if(confirm('삭제하시겠습니까?')) {
                  var this_id = $(this).parent().attr('id');
                  var this_id = this_id.split('_');
                  var this_id = Number(this_id[1]);
                  for(var i=0;i<goods_arr.length;i++){
                      if(this_id == goods_arr[i].goods_id){
                          goods_arr.splice(i,1);
                          // console.log(goods_arr);
                          view_goods();
                          return;
                      }
                  }
              }
          })
      }

      $('#save_btn').click(function(){
//          alert($('#b_name').val());
//          alert($('#b_category').val());
//          alert($('#b_date_start').val());
//          alert($('#b_date_end').val());
          if($('#b_name').val() == ''){
              alert('부스명을 입력해 주세요!');
              return;
          }
          if($('#b_category').val() == ''){
              alert('주분류를 입력해 주세요!');
              return;
          }
          if($('#b_date_start').val() == '' || $('#b_date_end').val() == ''){
              alert('날짜를 입력해주세요!');
              return;
          }

          user = {{$user_id}};
          
          // 설문조사 신청값 저장
          var surveyArr = Array();
          
          function surveyObj(){
            this.q_id = 0;
            this.e_id = 0;
          }
          
          for(var i = 0, length = $('.survey_q_preview_value').length; i < length; i++){
            surveyArr[i] = new surveyObj();
            surveyArr[i].q_id = $('.survey_q_preview_value:eq('+i+')').val();
            surveyArr[i].e_id = $('.survey_e_preview_value:eq('+i+')').val();
          }
          
          console.log(surveyArr);

          $.ajax({
              url : '/fleamarket/sellerapply/mode/save',
              data: {
                  b_name : $('#b_name').val(),
                  b_category : $('#b_category').val(),
                  b_date1 : $('#b_date_start').val(),
                  b_date2 : $('#b_date_end').val(),
                  user_id : user,
                  flea_th : {{$flea_th}},
                  goods_arr : goods_arr,
                  surveyArr : surveyArr
              },
              dataType : 'jsonp',
              success : function(data){
                  alert('신청 완료!');
                  window.location.href = '/fleamarket/flea_page/{{$flea_th}}';
              },
              error : function(){
                  alert('에러가 발생하였습니다');
              }
          });
      })

      $('.seller_reseach').click(function(){

      })

      $( "#b_date_start" ).datepicker({
          dateFormat : "yy-mm-dd"
      });
      $( "#b_date_end" ).datepicker({
          dateFormat : "yy-mm-dd"
      });
      
      $('.survey_e_preview').click(function(){
        var splitClass = $(this).attr('class').split(' ');
        var getNesClass = splitClass[1];
        $('.'+getNesClass).attr('class','survey_e_preview '+getNesClass);
        $('.'+getNesClass).attr('background-color','white');
        $(this).css('background-color','#dbedff');
        $(this).attr('class','selected_e '+getNesClass);
        
        var idValue = $(this).attr('id');
        var idArr = idValue.split('_');
        var idQValue = idArr[1];
        var idEValue = idArr[2];
        
        $('#q_setValue_'+idQValue).val(idEValue);
        
        // alert($('#q_setValue_'+idQValue).val());
      });  
  
      $('.survey_e_preview').mouseover(function(){
        $(this).css('background-color','#dbedff');
      });
      
      $('.survey_e_preview').mouseout(function(){
        var splitClass = $(this).attr('class').split(' ');
        var getNesClass = splitClass[0];
        
        if(getNesClass == 'survey_e_preview'){
          $(this).css('background-color','white');  
        }
      });
  });
</script>

@section('title', '판매자신청')
@section('content')
<div class="info_text">
  SELLER APPLY
</div>
<div id="flea_apply">
  <!-- 판매자 정보등록 -->
    <div class="seller_info_input">
      <div class='form-inline'>
      <label>부&nbsp;스&nbsp;명 &nbsp;&nbsp;&nbsp;: </label>
      <input style="width:160px;" class='form-control' type="text" id="b_name" value="테스트"><br>
      </div>
      <div class='form-inline'>
      <label>주&nbsp;분&nbsp;류 &nbsp;&nbsp;&nbsp;: </label>
      <input style="width:160px;" class='form-control' type="text" id="b_category" value="초콜릿"><br>
      </div>
      <div class='form-inline'>
      <label>희망&nbsp;날짜 : </label>
      <input style="width:163px;" class='form-control' type="text" id="b_date_start"> &nbsp;~&nbsp; <input style="width:160px;" class='form-control' type="text" id="b_date_end">
      </div>
    </div>

  <!-- 물품등록 -> 팝업 -->
  <div class="seller_goods">
    <div class="info_text_goods">
      플리마켓 참가 물품 리스트
    </div>
    <div class="goods_add">GOODS ADD</div>
    <div class="goods_list">

    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="goods_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">물품 등록</h4>
        </div>
        <div class="modal-body">
          <!-- 모달 내용 -->
          <div class="goods_my_list thumbnail">

          </div>
          <div class="goods_info thumbnail">
            <div class='form-inline'>
            판매가격 : <input type="text" class='form-control' id="g_price">
            </div>
            <div class='form-inline'>
            판매수량 : <input type="text" class='form-control' id="g_quantity">
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">취소</button>
          <button type="button" id="goods_applys" class="btn btn-primary">물품 등록</button>
        </div>
      </div>
    </div>
  </div>

  <!-- 설문조사 -->
  <div class="seller_reseach" style="overflow:auto;">
    <div class="info_text_research"> 설문조사 리스트</div>
    <div id="survey_body" >
      @for($i = 0, $length = count($surveyQ); $i < $length; $i++)
        <div class="survey_preview">
          <input type="hidden" class="survey_q_preview_value" value="{{$surveyQ[$i]->id}}" />
          <input type="hidden" class="survey_e_preview_value" id="q_setValue_{{$surveyQ[$i]->id}}" value="" />
          <li class="survey_q_preview" id="Q_{{$surveyQ[$i]->id}}">
            {{$surveyQ[$i]->text}}
          </li>
          @for($j = 0, $length2 = count($surveyE); $j < $length2; $j++)
            @if($surveyQ[$i]->id == $surveyE[$j]->parent_id)
              <li class="survey_e_preview survey_e_preview_{{$surveyQ[$i]->id}}" id="E_{{$surveyQ[$i]->id}}_{{$surveyE[$j]->id}}"> 
                &nbsp&nbsp <span class="e_num">{{$j+1}}</span> &nbsp&nbsp 
                {{$surveyE[$j]->text}}
              </li>    
            @endif
          @endfor
        </div>
      @endfor
    </div>
  </div>

  <!-- 신청버튼 -->
  <div class="apply_button" style="margin-bottom:40px;">
    <button id='save_btn' class="btn">APPLY</button>
  </div>
</div>
@endsection
