@extends('layouts.app')

<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>

    
    #image_info{
    width:500px;
    height:350px;
    margin:0 auto;
  }
  .seller_info{
    margin-top:30px;
    height:430px;
    width:1000px;

  }
  .seller_info_input{
    margin-left:30px;
    width : 600px;
    height : 430px;
    float:right;
    display:inline-block;
  }
  .seller_info_img{
    width:340px;
    height:430px;
    float:left;
    display:inline-block;
  }
  #image_file{
    margin-left:20%;
  }
  #miribogi{
    width:100%;
    height:100%;
  }
  #image_view{
    width:100%;
    height:100%;
  }
  .info_td{
    margin-right:40px;
    margin-top:15px;
    font-size:20px;
  }
  .info_td_data {
    width:400px;
  }
  
  .flea_map {
    padding-top : 60px;
    width:1000px;
    float:left;
    position:relative;
  }
  .flea_map > p {
      font-size:24px;
  }
  #flea_map_input {
    width : 900px;
    margin : 0 auto;
    height : 600px;
    text-align: center;
  }
  #map{
    height:98%;
  }
  #floating-panel {
    position: absolute;
    top: 120px;
    left: 40%;
    z-index: 5;
    background-color: #fff;
    padding: 5px;
    border: 1px solid #999;
    text-align: center;
    font-family: 'Roboto','sans-serif';
    line-height: 30px;
    padding-left: 5px;
  }
  .group_button{
    margin-top:20px;
    width:150px;
    height:70px;
    font-size:20px;
  }
  .apply_button{
      width:1000px;
      margin-bottom:30px;
      float:left;
  }
    #create_fleagroup{
        width:1000px;
        height:1000px;
        margin : 0 auto;
    }
    .footer{
        margin-left:150px;
        float:left;
    }

</style>

<script>
    //구글 맵 api
    function initMap() {
        var myLatLng = {lat: 37.566535, lng: 126.97796919999996};

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: myLatLng
        });
        var geocoder = new google.maps.Geocoder();

        document.getElementById('submit').addEventListener('click', function() {
            geocodeAddress(geocoder, map);
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Hello World!'
        });
    }

    function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function(results, status) {
            if (status === 'OK') {
                resultsMap.setCenter(results[0].geometry.location);

                // 좌표값을 저장
                $('#location_1').val(results[0]['geometry']['location']['lat']());
                $('#location_2').val(results[0]['geometry']['location']['lng']());
                $('#location_get').val($('#address').val());

                var marker = new google.maps.Marker({
                    map: resultsMap,
                    position: results[0].geometry.location
                });
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpA9_rF-RU1DlFl7Bb5JiUYsieSobRj0Q&callback=initMap">
</script>
<script>


    $(document).ready(function(){
        $('.seller_info_img').click(function(){
            $('#image_modal').modal('show');
        })

        $('#image_save').click(function(){
            $('#image_view').attr('src', image_data);
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

@section('title', '플리마켓 그룹 생성')
@section('content')
<div class="info_text" style="margin-top:130px;">
  <h2><b>플리마켓 그룹 생성</b></h2>
</div>

<form enctype="multipart/form-data" action="/group/create/new" method="post">
<div id="create_fleagroup">
  <div class="seller_info">
    <!-- 사진등록 -> 팝업 -->
    <div class="seller_info_img">
      <img src="http://www.recetass.com/imgreceta/no.png" id="image_view">
    </div>
    <!-- 정보등록 -->
    <div class="seller_info_input">
          <div class="form-group">
            <label>플리마켓이름</label>
            <input class="info_td form-control" type="text" name="flea_name" value="테스트 플리마켓">
          </div>
          <div class="form-group">
            <label>개최지역</label>
            <input class="info_td form-control" type="text" name="location" value="대구">
          </div>
          <div class="form-group">
            <label>상세설명</label>
            <textarea class="info_td form-control" name="text" rows="10" style="resize:none;">테스트입니다</textarea>
          </div>
        <!-- 지역값을 저장 -->
        <input id="location_get" name="location_get" type="hidden" value="">
        <!-- 좌표값을 저장 -->
        <input id="location_1" name="location_1" type="hidden" value="">
        <input id="location_2" name="location_2" type="hidden" value="">
    </div>
  </div>
  <div class="flea_map">
    <p><b>지도</b></p>
    <div id="flea_map_input" class="thumbnail">

      <!-- 플롯창 -->
      <div id="floating-panel" class="thumbnail" style="z-index:2;">
        개최 장소를 검색해 주세요<br>
        <input id="address" type="textbox" class="form-control" value="">
        <input id="submit" class="btn btn-default" style="margin-top:10px;" type="button" value="위치찾기">
      </div>

      <!-- 지도 -->
      <div id="map"></div>


    </div>
  </div>

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
          <button id="image_save" type="button" class="btn btn-default">등록</button>
        </div>
      </div>

    </div>
  </div>
  <div class="apply_button">
    <input class="group_button btn btn-primary btn-lg btn-block" type="submit"value="그룹생성">
  </div>
</div>
</form>
@endsection
