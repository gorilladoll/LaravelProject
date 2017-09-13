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
  #info {
    width:400px;
    float:right;
    margin-left:20px;
    font-size:20px;
    margin-top:50px;
  }
  .flea_content{
    margin-top : 30px;
    width:900px;
    height:400px;
    margin : 0 auto;
    background-color:white;
  }
  .flea_content > p{
    padding:10px;
    margin : 0;
    margin-top:50px;
    font-size:20px;
    border-top:2px solid #337ab7;
    border-left:2px solid #337ab7;
    border-right:2px solid #337ab7;
    border-bottom:0;
    border-radius:5px 5px 0 0;
  }
  .flea_content > textarea {
    border : 2px solid #337ab7;
    border-radius:0 0 5px 5px;
  }
  
  .flea_survey{
    width:900px;
    height:300px;
    border : 2px solid #337ab7;
    border-radius:5px;
    margin:0 auto;
    margin-top:40px;
    background-color:white;
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
      display: block;
    }

    #invoked_body{
      display: none;
      height: 80%;
      overflow: scroll;
    }

    #invoked_survey_header{
      display: none;
    }
    .info_title{
      font-size:40px;
      padding:10px;
      text-align:center;
      border-radius:20px 20px 0px 0px;
    }
    .flea_detailmain{
      border:2px solid #337ab7;
      border-top:0;
      border-radius:20px;
      background-color:white;
    }


</style>

<script>
    $(document).ready(function(){

        var firstSurvey = "<div class='survey_lists'>";
            firstSurvey +="<input type='hidden' class='exampleLength' value='2'>";
            firstSurvey +="<div class='input-group'>";
            firstSurvey +="<input type='text' class='survey_q' placeholder='설문문항-1'>";
            firstSurvey +="</div>";
            firstSurvey +="<div class='input-group'>";
            firstSurvey +="<span class='input-group-addon'>1</span>";
            firstSurvey +="<input type='text' class='survey_ex' placeholder='문항보기'>";
            firstSurvey +="</div>";
            firstSurvey +="<div class='input-group'>";
            firstSurvey +="<span class='input-group-addon'>2</span>";
            firstSurvey +="<input type='text' class='survey_ex' placeholder='문항보기'>";
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
            survey += "<input type='text' class='survey_ex' placeholder='문항보기'>";
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

  <style type="text/css">
    .steps_wrapper{
      margin:auto;
      margin-top:150px;
      width:850px;
      height:200px;
      /*border:1px solid black;*/
      /*border-bottom:1px solid #e54747;*/
    }
    .steps{
      border:1px solid #cccccc;
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
      box-shadow:1px 1px 2px #b7b7b7;
    }
    
    .steps_contents:first-child .steps{
      border:0px;
      background-color:#f94a4a;
      color:white;
    }
    
    .division_line{
      margin:auto;
      width:80%;
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
      width:100%;
      text-align:center;
      font-family:'interparkM';
      font-size:18px;
      color:#7c7c7c;
    }
  </style>
  <div class="steps_wrapper">
    <div class="steps_contents">
      <div class="steps"> step 1 </div>
      <div class="steps_explain">플리마켓 정보 입력</div>
    </div>
    <div class="steps_contents">
      <div class="steps"> step 2 </div>
      <div class="steps_explain">질문 등록</div>
    </div>
    <div class="steps_contents">
      <div class="steps"> step 3 </div>
      <div class="steps_explain">배치도 작성</div>
    </div>
    <div class="steps_contents"  style="margin-right:0px;">
      <div class="steps"> step 4 </div>
      <div class="steps_explain">개최 완료</div>
    </div>
    
  </div>
    
  <div class="division_line"></div>
  
  <form action="/flea/new" class="form-inline" method="post">
      <input type="hidden" name="flea_id" value="{{$flea_num}}">
      <input type="hidden" name="flea_th" value="{{$flea_id}}">
  <div id='flea_detail'>
    <!-- 사진 및 소개 -->
    <div class="flea_detailmain">
      <p class="bg-primary info_title">{{$flea_data[0]->flea_name}} {{$flea_id}} 회차</p>
            <!-- 대표 이미지 불러오기 -->
              <img src="{{asset('user_img/')}}/{{$flea_data[0]->image_name}}" style="margin-left:80px;width:400px; height:500PX;" alt="">
          <div id="info">
            {{--<p class="info_p">마켓명 : <input class="input_class" type="text"></p>--}}
            

            <p class="info_p">날&nbsp;&nbsp;&nbsp;짜 : <input class="form-control" style="width:110px" id="date_start" type="text" name="date_start">
            ~ <input style="width:110px" class="form-control" id="date_end" type="text" name="date_end" value=""></p>

            <!-- <input style="width:110px" id="time_start" type="text" name="start"> -->
            <!-- <input style="width:110px" id="date_end" type="text" name="time_end" value=""></p> -->
            {{--<p class="info_p">장&nbsp;&nbsp;&nbsp;소 : <input type="text" class="form-control" name="location" value=""></p>--}}
            <p class="info_p">주&nbsp;&nbsp;&nbsp;제 : <input type="text" class="form-control" name="category" value="음식"></p>
            <p class="info_p">참가비 : <input type="text" class="form-control" name="entry_fee" value="5000"></p>
            <p class="info_p">부스비 : <input type="text" class="form-control" name="booth_fee" value="5000"></p>
            <p class="info_p">커미션 : <input style="width:80px" type="text" class="form-control" name="com" value="12">%</p>

            <!-- <input id='timepicker' type='text' name='timepicker'/> -->

            <p class="info_p">개최 시간&nbsp;&nbsp;&nbsp;<br>
            <select name="start_time_hour" class="btn btn-default">
              <script type="text/javascript">
                for(var i = 1; i <= 24; i++){
                  document.write("<option>"+i+"</option>");
                }  
              </script>
            </select>  : 
            <select name="start_time_min" class="btn btn-default">
              <option>00</option>
              <script type="text/javascript">
                for(var i = 5; i < 60; i+=5){
                  document.write("<option>"+i+"</option>");
                }  
              </script>
            </select>

            ~

            <select name="stop_time_hour" class="btn btn-default">
              <script type="text/javascript">
                for(var i = 1; i <= 24; i++){
                  document.write("<option>"+i+"</option>");
                }  
              </script>
            </select>  : 
            <select name="stop_time_min" class="btn btn-default">
              <option>00</option>
              <script type="text/javascript">
                for(var i = 5; i < 60; i+=5){
                  document.write("<option>"+i+"</option>");
                }  
              </script>
            </select>

            <p class="info_p">판매자 모집 종료 기간<br>
            <p class="info_p"><input class="form-control" style="width:110px" id="time_first" type="text" name="time_first">
              ~ <input class="form-control" style="width:110px" id="end_time_first" type="text" name="end_time_first" value=""></p>


          </div>
    </div>

    <!-- 설명글 -->
    <div class="flea_content">
          <p>설명</p>
          <textarea name="flea_text" style="padding : 20px;width:100%;height:350px;resize:none;">테스트입니다~</textarea>
    </div>


    <!-- 부스배치도 -->
    <div class="flea_survey">
      
      <p id="uninvoke_survey_header">질문등록</p>
      <p id="invoked_survey_header">질문등록</p>
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
              <h4 class="modal-title text-center">설문조사 등록</h4>
            </div>
            <div class="modal-body">
                <div id="survey_body">
                    <button type="button" class="btn" id="survey_add">
                        <span class="glyphicon glyphicon-plus-sign"></span> 
                    </button>
                    <div class='survey_lists'>
                        <input type='hidden' class='exampleLength' value='2'>
                        <div class='input-group'>
                            <input type='text' class='survey_q'value='당신의 성별은?'> 
                            <!-- placeholder='설문문항-1' -->
                        </div>
                        <div class='input-group'>
                            <span class='input-group-addon'>1</span>
                            <input type='text' class='survey_ex' value="남자">
                            <!--placeholder='문항보기'-->
                        </div>
                        <div class='input-group'>
                            <span class='input-group-addon'>2</span>
                            <input type='text' class='survey_ex' value="여자">
                            <!--placeholder='문항보기'-->
                        </div>
                    </div>

                </div>
                <br>
                <div id="added_body">
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="apply" class="btn btn-default">적용하기</button>
                <button type="button" id="confirm" class="btn btn-default" data-dismiss="modal">확인</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">취소</button>
            </div>
          </div>
          
        </div>
      </div>
      
    </div>


    <!-- 지도 -->
    <div class="flea_map">
      <p>지도</p>
      <div id="map">
        <script>
            //구글 맵 api
            function initMap() {
                var lat_value = {{$flea_data[0]->coordinate1}};
                var lng_value = {{$flea_data[0]->coordinate2}};

                var myLatLng = {lat: lat_value, lng: lng_value};

                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 15,
                    center: myLatLng
                });

                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    title: 'Hello World!'
                });
            }
        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpA9_rF-RU1DlFl7Bb5JiUYsieSobRj0Q&callback=initMap">
        </script>
      </div>
    </div>

    <!-- 버튼 -->
    <div class="flea_buttons">
      <!-- if문을 사용하여 로그인 전후와 본인이 작성한 것을 기준으로
    나타내는 버튼을 다르게 나타가게함. -->
      <button class="btn btn-primary btn-lg btn-block" type="submit" name="button" id="send_button">배치도 선택</button>
    </div>
  </div>
</form>

@endsection