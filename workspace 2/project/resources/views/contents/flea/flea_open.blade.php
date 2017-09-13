<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


<style>
  #flea_detail {
    padding-top: 50px;
    width : 1000px;
    margin : 0 auto;
    /*border : 1px solid black;*/
  }

  
  
  .flea_survey{
    width:900px;
    height:300px;
    border : 2px solid #f94a4a;
    border-radius:5px;
    margin:0 auto;
    margin-top:40px;
    background-color:white;
    box-shadow: 4px 4px 8px #a3a3a3;
  }
  .flea_survey > p{
    padding:10px;
    font-size:20px;
    border-bottom: 2px solid #337ab7;
  }
  .flea_map{
    width:900px;
    height:470px;
    border : 2px solid #337ab7;
    margin:0 auto;
    margin-top:40px;
    border-radius:5px;
    background-color:white;
  }
  .flea_map > p{
    padding:10px;
    font-size:20px;
    border-bottom: 2px solid #337ab7;
  }
  .flea_buttons{
    text-align: center;
    width:900px;
    height:100px;
    margin : 0 auto;
    margin-top:40px;
  }
  #map{

    margin-left:5px;
    width: 99%;
    height:400px;
  }

  li{
        list-style: none;
    }

    #survey_body{
        margin: 0 auto;
        width: 95%;
        height: 300px;
        border: 1px solid #999a9b;
        border-radius: 5px;
        
    }

    #added_body{
        margin: 0 auto;
        width: 95%;
        height: 250px;
        border: 1px dotted #999a9b;
        border-radius: 5px;
        overflow: scroll;
    }

    #survey_add{
        width: 100%;
        height: 40px;
        border-radius: 5px;
        background-color: #ad2d2d;
        color: white;
    }
    
    .survey_lists{
        margin: 0 auto;
        margin-top: 10px;
        width: 95%;
        height: 0 auto;
        border: 1px solid #999a9b;
        border-radius: 5px;
    }
    
    /*#plusBtn{
        margin: 0 auto; 
        position: absolute; 
        width: 89.8%;
        height: 46px;
        top: 198px; 
        left: 30px;
    }*/

    .input-group{
        width: 100%;
        height: 40px;
    }

    .input-group:last-child{
        width: 100%;
        height: 40px;
        margin-bottom: 5px;
    }

    .survey_q{
        width: 99%;
        border: 1px solid #999a9b;
        border-radius: 5px;
        height: 80%;
        margin: 2px;
        margin-bottom: 5px;
        
    }
    .survey_ex{
        height: 100%;
        width: 99%;
        border: 1px solid #999a9b;
        border-radius: 5px;
        
    }

    #uninvoke_body{
      display: block;
    }

    #uninvoke_survey_header{
      text-align:center;
      color:white;
      font-size:25px;
      font-family:'interparkM';
      background-color:#f94a4a;
      border:0px;
      display: block;
    }

    #invoked_body{
      display: none;
      height: 80%;
      overflow: scroll;
    }

    #invoked_survey_header{
      text-align:center;
      color:white;
      font-size:25px;
      font-family:'interparkM';
      background-color:#f94a4a;
      border:0px;
      display: none;
    }
    .info_title{
      font-size:40px;
      padding:10px;
      text-align:center;
      background-color:#f94a4a;
      color:white;
      border-radius:20px 20px 0px 0px;
    }
    .flea_detailmain{
      border:2px solid #f94a4a;
      border-top:0;
      border-radius:20px;
      height:630px;
      width:1000;
      background-color:white;
      /*box-shadow:4px 4px 8px #adadad;*/
      box-shadow:5px 5px 10px #848484;
    }
    #poster_img{
      width:100%; 
      height:100%; 
      border-radius:5px; 
      /*margin-left:-5px;*/
    }
    
    .poster_img_div{
      margin-left:20px;
      margin-bottom:20px;
      width:400px; 
      height:500px; 
      border-radius:5px; 
      /*border:1px solid black;*/
      box-shadow:4px 4px 4px #7c7c7c;
      float:left;
      
    }
    
    #info {
      width:550px;
      margin-left:10px;
      font-size:20px;
      font-family:'interparkM';
      margin-top:5px;
      float:left;
      padding-left:20px;
    }
    
    .flea_info_division_line{
      width:95%;
      border-bottom:1px solid #bcbcbc;
      margin-top:-20px;
      margin-bottom:20px;
    }
    
    .steps_wrapper{
      margin:auto;
      margin-top:0px;
      width:1100px;
      height:200px;
      background-color:white;
      /*border:1px solid black;*/
      border-top:1px solid #e54747;
      border-bottom:1px solid #e54747;
      border-radius: 6px;
      box-shadow:5px 5px 10px #848484;
    }
    .steps_wrapper_center{
      width:900px;
      height:100%;
      margin:auto;
    }
    
    .steps{
      border:1px solid #7c7c7c;
      width:100%;
      height:60px;
      /*float:left;*/
      /*margin-top:50px;*/
      border-radius:8px;
      /*margin-right:10px;*/
      line-height:60px;
      text-align:center;
      font-size:40px;
      font-family:"CulDeSac";
      background-color:white;
      /*box-shadow:3px 3px 3px #7a7a7a;*/
      color:black;
    }
    
    .steps_contents:first-child .steps{
      border:0px;
      background-color:#f94a4a;
      color:white;
    }
    
    .division_line{
      margin:auto;
      width:1100px;
      border-bottom:1px solid #a3a3a3;
    }
    
    .steps_contents{
      
      width:24%;
      height:80px;
      margin-top:50px;
      margin-right:10px;
      float:left;
    }
    
    .steps_explain{
      /*border:1px solid black;*/
      margin-top:4px;
      width:100%;
      text-align:center;
      font-family:'interparkM';
      font-size:18px;
      color:#595959;
      /*text-shadow:3px 3px 1px #bcbcbc;*/
    }
    
    #flea_create_title{
      margin:auto; 
      margin-top:150px; 
      width:1100px; 
      height:60px; 
      text-align:center; 
      font-family:'interparkM'; 
      font-size:40px; 
      color:#f94a4a;
      /*text-shadow: 4px 4px 2px #bcbcbc;*/
      /*border-bottom:1px solid #878787;*/
      
    }
    
    .flea_content{
      width:500px;
      height:160px;
      /*border:1px solid black;*/
      background-color:white;
    }
            
    .flea_content textarea{
      width:100%;
      height:120px;
      resize:none;
      border-radius:5px;
    }
            
    #step_1_button_div{
      margin:0 auto;
      margin-top:30px;
      margin-bottom:60px;
      width:200px;
      height:70px;
    }
            
    #step_1_submit{
      width:100%;
      height:100%;
      font-size:30px;
      background-color:#f94a4a;
      font-family:'interparkM';
      color:white;
      border:0px;
      border-radius:5px;
      /*box-shadow:3px 3px 3px #bcbcbc;*/
      box-shadow:5px 5px 10px #848484;
    }
            
    
</style>

<script>
    $(document).ready(function(){

        var firstSurvey = "<div class='survey_lists'>";
            firstSurvey +="<input type='hidden' class='exampleLength' value='2'>";
            firstSurvey +="<div class='input-group'>";
            firstSurvey +="<input type='text' class='survey_q' placeholder='アンケート-1'>";
            firstSurvey +="</div>";
            firstSurvey +="<div class='input-group'>";
            firstSurvey +="<span class='input-group-addon'>1</span>";
            firstSurvey +="<input type='text' class='survey_ex' placeholder='質問リスト'>";
            firstSurvey +="</div>";
            firstSurvey +="<div class='input-group'>";
            firstSurvey +="<span class='input-group-addon'>2</span>";
            firstSurvey +="<input type='text' class='survey_ex' placeholder='質問リスト'>";
            firstSurvey +="</div>";
            firstSurvey +="</div>";


        $("#surveyAddBtn").click(function(){
            $("#myModal").modal();
        });

        $("#surveyViewBtn").click(function(){
            location.href="/surveyView/1";
        });

        $('#survey_add').click(function(){
            var survey ="<div class='input-group'>";
            var number = Number($('.input-group-addon').not('.clone').last().text()) + 1;
            survey += "<span class='input-group-addon' id='basic-addon1'>" + number + "</span>";
            survey += "<input type='text' class='survey_ex' placeholder='質問リスト'>";
            survey += "</div>";

            $('.survey_lists').not('.clone').append(survey);
            var exampleLength = Number($('.survey_lists').not('.clone').children('.exampleLength').attr('value'));
            $('.survey_lists').not('.clone').children('.exampleLength').attr('value',exampleLength + 1);
        });

        $('#apply').click(function(){
            var surveyClone = $('.survey_lists:eq(0)').clone(); 
            //적용하기 전 설문문항만 적용시키기위한 clone
            $('#added_body').append(surveyClone);
            $('#added_body').children('.survey_lists').addClass('clone');
            $('#added_body .survey_q').addClass('clone');
            $('#added_body .survey_ex').addClass('clone');
            $('.survey_q.clone').prop('readonly',true);
            $('.survey_ex.clone').prop('readonly',true);
            $('#added_body .input-group-addon').addClass('clone');

            $('#survey_body .survey_lists').remove();
            $('#survey_body').append(firstSurvey);

        });


        $('#confirm').click(function(){
            var surveryLength = $('#added_body .survey_lists').length;
            $('#invoked_body_hidden').attr('value',surveryLength);

            for(var i = 0, length = $('#added_body .survey_lists').length; i < length; i++){
              $('#added_body .survey_lists:eq('+i+') .survey_q').attr('name','quastion_'+i);
              $('#added_body .survey_lists:eq('+i+') .exampleLength').attr('name','exampleLength_'+i);
              console.log($('#added_body .survey_lists:eq('+i+') .survey_ex').length);
              for(var j = 0, length2 = $('#added_body .survey_lists:eq('+i+') .survey_ex').length; j < length2; j++){
                // alert(j);
                 $('#added_body .survey_lists:eq('+i+') .survey_ex:eq('+j+')').attr('name','example_'+i+'_'+j);
              }
            }
            var surveyList = $('#added_body .survey_lists');
            $('#invoked_body').append(surveyList);

            $('#invoked_body').show();
            $('#uninvoke_body').hide();
            $('#uninvoke_survey_header').hide();
            $('#invoked_survey_header').show();
        });        

        // $('#confirm').click(function(){
        //     var surveyArr = Array();
        //     for(var i = 0, length1 = $('#added_body .survey_lists').length; i < length1; i++){
        //         surveyArr[i] = {};
        //         surveyArr[i]['survey_q'] = String($('#added_body .survey_q:eq('+i+')').val());
        //         for(var j = 0, length2 = $('#added_body .survey_lists:eq('+i+') .survey_ex').length; j < length2; j++){
        //             surveyArr[i]['survey_ex_'+j] = String($('#added_body .survey_lists:eq('+i+') .survey_ex:eq('+j+')').val());
        //         }
        //     }

        //     console.log(surveyArr);
        //     console.log(surveyArr[0].length);
        //     $.ajax({/*서버에 값 전달*/
        //       url : 'http://localhost:8000/survey/register',
        //       data: {
        //         surveyArr : surveyArr
        //       },
        //       dataType : 'jsonp',
        //       success : function(data){
        //         console.log(data);
        //         alert('저장이 완료되었습니다.');
        //       },
        //       error : function(){
        //         alert('에러가 발생하였습니다'); 
        //       }
        //     });
        // });

        $('#accountViewBtn').click(function(){
            location.href="/account/view/1";
        });
 
        // 각 달력 date picker
        $( "#date_start" ).datepicker({
            dateFormat : "yy-mm-dd"
        });
        $( "#date_end" ).datepicker({
            dateFormat : "yy-mm-dd"
        });
        $( "#time_first" ).datepicker({
            dateFormat : "yy-mm-dd"
        });
        $( "#end_time_first" ).datepicker({
            dateFormat : "yy-mm-dd"
        });
  
        $("#booth_map").click(function(){
            alert('test');
        });

        $("#send_button").click(function(){
            // alert($("#date_start").val())
        });
        
        
    });
</script>

@extends('layouts.app')

@section('content')

  <div  id="flea_create_title">フリマの開催手続き</div>
  <div class="steps_wrapper">
    <div class="steps_wrapper_center">
      <div class="steps_contents">
        <div class="steps"> step 1 </div>
        <div class="steps_explain">フリマの情報記入</div>
      </div>
      <div class="steps_contents">
        <div class="steps"> step 2 </div>
        <div class="steps_explain">アンケート登録</div>
      </div>
      <div class="steps_contents">
        <div class="steps"> step 3 </div>
        <div class="steps_explain">ブース配置図作成</div>
      </div>
      <div class="steps_contents"  style="margin-right:0px;">
        <div class="steps"> step 4 </div>
        <div class="steps_explain">開催完了</div>
      </div>
    </div>
  </div>
    
  <!--<div class="division_line"></div>-->
  

  <form action="/flea/new" class="form-inline" method="post">
    <input type="hidden" name="flea_id" value="{{$flea_num}}">
    <input type="hidden" name="flea_th" value="{{$flea_id}}">
    
    <div class="step_1">
      <div id='flea_detail'>
        <!-- 사진 및 소개 시작 -->
        <div class="flea_detailmain">
          <p class="info_title">{{$flea_data[0]->flea_name}}　第 {{$flea_id}} 回</p>
          <!-- 대표 이미지 불러오기 -->
          <div class="poster_img_div">
            <img src="{{asset('user_img/')}}/{{$flea_data[0]->image_name}}" id="poster_img">  
          </div>
          
          <div id="info">
            <p class="info_p">フリマの開催期間&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <input class="form-control" style="width:110px" id="date_start" type="text" name="date_start" value="2017-09-21">
            ~ <input style="width:110px" class="form-control" id="date_end" type="text" name="date_end" value="2017-09-23"></p>
            
            <p class="info_p">出店者募集期間&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <input class="form-control" style="width:110px" id="time_first" type="text" name="time_first"value="2017-09-13">
              ~ <input class="form-control" style="width:110px" id="end_time_first" type="text" name="end_time_first" value="2017-09-16"></p>

            <br/>
            <div class="flea_info_division_line"></div>

            <!-- <input style="width:110px" id="time_start" type="text" name="start"> -->
            <!-- <input style="width:110px" id="date_end" type="text" name="time_end" value=""></p> -->
            {{--<p class="info_p">場&nbsp;&nbsp;&nbsp;所 : <input type="text" class="form-control" name="location" value=""></p>--}}
            <br/>
            <p class="info_p" style="float:left; margin-right:105px;">テーマ&nbsp;&nbsp;&nbsp; : <input type="text" class="form-control" style="width:100px;" id="category" name="category" value="食べ物"></p>
            <p class="info_p">参加費 : <input type="text" class="form-control" name="entry_fee" style="width:100px;" value="5000"></p>
            <p class="info_p" style="float:left; margin-right:55px;">ブース費 : <input type="text" class="form-control" name="booth_fee" style="width:97px;" value="5000"></p>
            <p class="info_p">コミッション : <input style="width:80px" type="text" class="form-control" style="width:100px;" name="com" value="12"> %</p>

            <br/>
            <div class="flea_info_division_line"></div>
            
            <p class="info_p">開催時間&nbsp;&nbsp;&nbsp;
            <select id="start_time_hour" name="start_time_hour" class="btn btn-default">
              <script type="text/javascript">
                for(var i = 1; i <= 24; i++){
                  document.write("<option>"+i+"</option>");
                }  
              </script>
            </select>  : 
            <select id="start_time_min" name="start_time_min" class="btn btn-default">
              <option>00</option>
              <script type="text/javascript">
                for(var i = 5; i < 60; i+=5){
                  document.write("<option>"+i+"</option>");
                }  
              </script>
            </select>
            &nbsp;&nbsp;&nbsp;
            ~
            &nbsp;&nbsp;&nbsp;
            <select id="stop_time_hour" name="stop_time_hour" class="btn btn-default">
              <script type="text/javascript">
                for(var i = 1; i <= 24; i++){
                  document.write("<option>"+i+"</option>");
                }  
              </script>
            </select>  : 
            <select id="stop_time_min" name="stop_time_min" class="btn btn-default">
              <option>00</option>
              <script type="text/javascript">
                for(var i = 5; i < 60; i+=5){
                  document.write("<option>"+i+"</option>");
                }  
              </script>
            </select>
            
            <br/><br/>
            <div class="flea_info_division_line"></div>
            
            <div class="flea_content text-center">
              <p>説&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;明</p>
              <textarea name="flea_text">
一緒に作るフリーマーケット！</textarea>
            </div>
          </div>

        </div>

        
      </div><!-- 사진 및 소개 끝 -->
  
      <!--구글 맵-->
      <!--<div class="flea_map">-->
      <!--  <p>지도</p>-->
      <!--  <div id="map">-->
      <!--    <script>-->
            <!--구글 맵 api-->
      <!--      function initMap() {-->
      <!--        var lat_value = {{$flea_data[0]->coordinate1}};-->
      <!--        var lng_value = {{$flea_data[0]->coordinate2}};-->
      <!--        var myLatLng = {lat: lat_value, lng: lng_value};-->

      <!--        var map = new google.maps.Map(document.getElementById('map'), {-->
      <!--            zoom: 15,-->
      <!--            center: myLatLng-->
      <!--        });-->

      <!--        var marker = new google.maps.Marker({-->
      <!--            position: myLatLng,-->
      <!--            map: map,-->
      <!--            title: 'Hello World!'-->
      <!--        });-->
      <!--      }-->
      <!--    </script>-->
      <!--    <script async defer-->
      <!--      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpA9_rF-RU1DlFl7Bb5JiUYsieSobRj0Q&callback=initMap">-->
      <!--    </script>-->
      <!--  </div>-->
      <!--</div>-->
      <div id="step_1_button_div">
        <button type="button" id="step_1_submit">NEXT</button>  
      </div>
      
    </div><!--step 1 종료-->
  
  <script type="text/javascript">
    
    $(document).ready(function(){
        $(".step_1").show();
        $(".step_2").hide();
        
        $("#step_1_submit").click(function(){

          $(".steps_contents:eq(0)").children(".steps").css('background-color','white');
          $(".steps_contents:eq(0)").children(".steps").css('color','black');
          $(".steps_contents:eq(0)").children(".steps").css('border','1px solid #cccccc');
          
          $(".steps_contents:eq(1)").children(".steps").css('background-color','#f94a4a');
          $(".steps_contents:eq(1)").children(".steps").css('color','white');
          $(".steps_contents:eq(1)").children(".steps").css('border','0px');
          $(".step_2").show();
          $(".step_1").hide();
        });
        
        
    });
  </script>
  
  <style type="text/css">
    .block_select{
      background-color:#f94a4a; 
      border:0px;
      width:300px;
      margin:auto;
      box-shadow: 3px 3px 4px #a3a3a3;
    }
  </style>
  
  <div class="step_2">
    <!--================질문 등록=================-->
    <div class="flea_survey">
      
      <p id="uninvoke_survey_header">質問登録</p>
      <p id="invoked_survey_header">質問登録</p>
      <div id="uninvoke_body" class="text-center">
          <img id="surveyAddBtn" src="https://cdn1.iconfinder.com/data/icons/freeline/32/add_cross_new_plus_create-512.png" style="width:150px;height:150px;margin-top:40px;">
      </div>
      <div id="invoked_body" class="text-center">
         <input type="hidden" id="invoked_body_hidden" name="invoked_body_hidden" value="">
      </div>
    </div>
    
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button> <!--header의 x버튼-->
              <h4 class="modal-title text-center">アンケート登録</h4>
            </div>
            <div class="modal-body">
                <div id="survey_body">
                    <button type="button" class="btn" id="survey_add">
                        <span class="glyphicon glyphicon-plus-sign"></span> 
                    </button>
                    <div class='survey_lists'>
                        <input type='hidden' class='exampleLength' value='2'>
                        <div class='input-group'>
                            <input type='text' class='survey_q'value='あなたの性別は?'> 
                            <!-- placeholder='アンケート-1' -->
                        </div>
                        <div class='input-group'>
                            <span class='input-group-addon'>1</span>
                            <input type='text' class='survey_ex' value="男">
                            <!--placeholder='문항보기'-->
                        </div>
                        <div class='input-group'>
                            <span class='input-group-addon'>2</span>
                            <input type='text' class='survey_ex' value="女">
                            <!--placeholder='문항보기'-->
                        </div>
                    </div>

                </div>
                <br>
                <div id="added_body">
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="apply" class="btn btn-default">適用</button>
                <button type="button" id="confirm" class="btn btn-default" data-dismiss="modal">確認</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
            </div>
          </div>
          
        </div>
      </div>

<script type="text/javascript">
  $(document).ready(function(){
    
    // $('.block_select').click(function(){
      
    //   var date_start = $('input[name=date_start]').val();
    //   var date_end = $('input[name=date_end]').val();
    //   var start_time_hour = $('select[name=start_time_hour]').val();
    //   var start_time_min = $('select[name=start_time_min]').val();
    //   var stop_time_hour = $('select[name=stop_time_hour]').val();
    //   var stop_time_min = $('select[name=stop_time_min]').val();
    //   var category = $('input[name=category]').val();
    //   var entry_fee = $('input[name=entry_fee]').val();
    //   var booth_fee = $('input[name=booth_fee]').val();
    //   var com = $('input[name=com]').val();
    //   var flea_text = $('textarea[name=flea_text]').val();
    //   var flea_id = $('input[name=flea_id]').val();
    //   var time_first = $('input[name=time_first]').val();
    //   var end_time_first = $('input[name=end_time_first]').val();
    //   var flea_th = $('input[name=flea_th]').val();
      
    //   // alert(date_start);
    //   // alert(date_end);
    //   // alert(start_time_hour);
    //   // alert(start_time_min);
    //   // alert(stop_time_hour);
    //   // alert(stop_time_min);
    //   // alert(category);
    //   // alert(entry_fee);
    //   // alert(booth_fee);
    //   // alert(com);
    //   // alert(flea_text);
    //   // alert(flea_id);
    //   // alert(time_first);
    //   // alert(end_time_first);
    //   // alert(flea_th);
    //   // var date_end = document.getElementsByName('date_end').value;
    //   // var start_time_hour = document.getElementsByName('start_time_hour').value;
    //   // var start_time_min = document.getElementsByName('start_time_min').value;
    //   // var stop_time_hour = document.getElementsByName('stop_time_hour').value;
    //   // var stop_time_min = document.getElementsByName('stop_time_min').value;
    //   // var category = document.getElementsByName('category').value;
    //   // var entry_fee = document.getElementsByName('entry_fee').value;
    //   // var booth_fee = document.getElementsByName('booth_fee').value;
    //   // var com = document.getElementsByName('com').value;
    //   // var flea_text = document.getElementsByName('flea_text').value;

    //   // var flea_id = document.getElementsByName('flea_id').value;

    //   // var time_first = document.getElementsByName('time_first').value;
    //   // var end_time_first = document.getElementsByName('end_time_first').value;

    //   // var flea_th = document.getElementsByName('flea_th').value;
      
    //   $.ajax({/*서버에 값 전달*/
    //     url : '/flea/new',
    //     type : 'post',
    //     data: {
    //       date_start : date_start,
    //       date_end : date_end,
    //       start_time_hour : start_time_hour,
    //       start_time_min : start_time_min,
    //       stop_time_hour : stop_time_hour,
    //       stop_time_min : stop_time_min,
    //       category : category,
    //       entry_fee : entry_fee,
    //       booth_fee : booth_fee,
    //       com : com,
    //       flea_text : flea_text,
    //       flea_id : flea_id,
    //       time_first : time_first,
    //       end_time_first : end_time_first,
    //       flea_th : flea_th
    //     },
    //     dataType : 'jsonp',
          
    //     success : function(data){
    //       console.log(data);
    //       alert('저장이 완료되었습니다.');

    //     },
    //     error : function(){
    //       alert('에러가 발생하였습니다'); 
    //     }
    //   });
    // });
  });
</script>

    <!-- 버튼 -->
    <div class="flea_buttons">
      
      <!-- if문을 사용하여 로그인 전후와 본인이 작성한 것을 기준으로
    나타내는 버튼을 다르게 나타가게함. -->
      <!--<button class="btn btn-primary btn-lg btn-block block_select" type="button" name="button" id="send_button">배치도 선택</button>-->
      <button class="btn btn-primary btn-lg btn-block block_select" name="button" id="send_button">NEXT</button>
    </div>
    
    
  </div>
  <!--step 2 종료-->
  
</div>
  
</form>

@endsection