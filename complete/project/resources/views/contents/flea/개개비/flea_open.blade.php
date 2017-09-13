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
    width:900px;
    height:400px;
    margin : 0 auto;
  }
  .flea_content > p{
    padding:10px;
    margin : 0;
    margin-top : 30px;
    font-size:20px;
    border-top:1px solid darkgray;
    border-left:1px solid darkgray;
    border-right:1px solid darkgray;
  }
  .flea_booth{
    width:900px;
    height:300px;
    border : 1px solid darkgray;
    margin:0 auto;
    margin-top:70px;
  }
  .flea_booth > p{
    padding:10px;
    font-size:20px;
    border-bottom: 1px solid darkgray;
  }
  .flea_map{
    width:900px;
    border : 1px solid darkgray;
    margin:0 auto;
    margin-top:20px;
  }
  .flea_map > p{
    padding:10px;
    font-size:20px;
    border-bottom: 1px solid darkgray;
  }
  .flea_buttons{
    text-align: center;
    width:300px;
    height:100px;
    margin : 0 auto;
    margin-top:20px;
  }
  #map{
    width: 99%;
    height:400px;
  }
  #booth_map{
    text-align: center;
  }

</style>

<script>
  $(document).ready(function(){

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
          //window.open("http://www.laravel.com", "_blank", "toolbar=yes, scrollbars=yes, resizable=yes, top=100,left=100,width=800, height=600");
          $("#survey_modal").modal('show');
      });

      $("#send_button").click(function(){
          alert($("#date_start").val())
      })
  })
</script>

@extends('layouts.app')

@section('content')
  <form action="{{url("/flea/new/")}}/" method="post">
  <div id='flea_detail'>
    <!-- 사진 및 소개 -->
    <div class="flea_detailmain">
            <!-- 대표 이미지 불러오기 -->
              <img src="{{asset('user_img/')}}/{{$flea_data[0]->image_name}}" style="margin-left:80px;width:400px; height:500PX;" alt="">
          <div id="info">
            {{--<p class="info_p">마켓명 : <input class="input_class" type="text"></p>--}}
            <h2 class="info_p">{{$flea_data[0]->flea_name}} {{$flea_id+1}} 회차</h2>
            <p class="info_p">날&nbsp;&nbsp;&nbsp;짜 : <input style="width:110px" id="date_start" type="text" name="date_start">
            ~ <input style="width:110px" id="date_end" type="text" name="date_end" value=""></p>
            {{--<p class="info_p">시&nbsp;&nbsp;&nbsp;간 : <input style="width:110px" id="time_start" type="text" name="start">--}}
              {{--~ <input style="width:110px" id="date_end" type="text" name="time_end" value=""></p>--}}
            {{--<p class="info_p">장&nbsp;&nbsp;&nbsp;소 : <input type="text" name="location" value=""></p>--}}
            <p class="info_p">주&nbsp;&nbsp;&nbsp;제 : <input type="text" name="category" value=""></p>
            <p class="info_p">참가비 : <input type="text" name="entry_fee" value=""></p>
            <p class="info_p">부스비 : <input type="text" name="booth_fee" value=""></p>
            <p class="info_p">커미션 : <input style="width:80px" type="text" name="com" value="">%</p>
            <p class="info_p">판매자 모집 종료 기간<br>
            <p class="info_p"><input style="width:110px" id="time_first" type="text" name="time_first">
              ~ <input style="width:110px" id="end_time_first" type="text" name="end_time_first" value=""></p>
            {{--<select name="time_first">--}}
              {{--<option>00</option><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option>--}}
              {{--<option>07</option><option>08</option><option>09</option><option>10</option><option>11</option><option>12</option>--}}
              {{--<option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option>--}}
              {{--<option>19</option><option>20</option><option>21</option><option>22</option><option>23</option>--}}
            {{--</select>--}}
            {{--<select name="time_second">--}}
              {{--<option>00</option><option>5</option><option>10</option><option>15</option><option>20</option><option>25</option>--}}
              {{--<option>30</option><option>35</option><option>40</option><option>45</option><option>50</option><option>55</option>--}}
            {{--</select>~--}}
              {{--<select name="end_time_first">--}}
                {{--<option>00</option><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option>--}}
                {{--<option>07</option><option>08</option><option>09</option><option>10</option><option>11</option><option>12</option>--}}
                {{--<option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option>--}}
                {{--<option>19</option><option>20</option><option>21</option><option>22</option><option>23</option>--}}
              {{--</select>--}}
              {{--<select name="end_time_second">--}}
                {{--<option>00</option><option>5</option><option>10</option><option>15</option><option>20</option><option>25</option>--}}
                {{--<option>30</option><option>35</option><option>40</option><option>45</option><option>50</option><option>55</option>--}}
              {{--</select>--}}
          </div>
    </div>

    <!-- 설명글 -->
    <div class="flea_content">
          <p>설명</p>
          <textarea name="flea_text" style="padding : 20px;width:100%;height:100%;resize:none;"></textarea>
    </div>

    <!-- 부스배치도 -->
    <div class="flea_booth">
      <p>질문등록</p>
      <div id="booth_map">
          <img src="https://cdn1.iconfinder.com/data/icons/freeline/32/add_cross_new_plus_create-512.png" style="width:150px;height:150px;margin-top:40px;">
      </div>
      <!-- 배치도 이름을 기록할 인풋 -->
      <input type="hidden" value="0" name="block_plan"> <!-- 초기값은 0 배치도 선택을 통해 업데이트 -->
      <input type="hidden" value='{{$flea_id}}' name="flea_th"> <!-- 플리마켓 몇회차인지 저장할 hidden -->
      <input type="hidden" value='{{$flea_data[0]->id}}' name="flea_id"> <!-- 플리마켓 id를 저장 -->
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
      <button class="btn btn-primary" type="submit" name="button" id="send_button">배치도 선택</button>
    </div>
  </div>
</form>

  <!---- modal ------>

  <div id="survey_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">모달</h4>
        </div>
        <div class="modal-body">



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

@endsection