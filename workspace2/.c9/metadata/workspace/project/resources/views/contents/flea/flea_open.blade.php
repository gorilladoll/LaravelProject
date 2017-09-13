{"changed":true,"filter":false,"title":"flea_open.blade.php","tooltip":"/project/resources/views/contents/flea/flea_open.blade.php","value":"<script src=\"https://code.jquery.com/jquery-3.2.1.js\"></script>\n<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\">\n<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\"></script>\n<script src=\"https://code.jquery.com/ui/1.12.1/jquery-ui.js\"></script>\n<link rel=\"stylesheet\" href=\"//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css\">\n\n\n<style>\n  #flea_detail {\n    padding-top: 50px;\n    width : 1000px;\n    margin : 0 auto;\n    /*border : 1px solid black;*/\n  }\n  #info {\n    width:400px;\n    float:right;\n    margin-left:20px;\n    font-size:20px;\n    margin-top:50px;\n  }\n  .flea_content{\n    margin-top : 30px;\n    width:900px;\n    height:400px;\n    margin : 0 auto;\n  }\n  .flea_content > p{\n    padding:10px;\n    margin : 0;\n    margin-top:50px;\n    font-size:20px;\n    border-top:2px solid #337ab7;\n    border-left:2px solid #337ab7;\n    border-right:2px solid #337ab7;\n    border-bottom:0;\n    border-radius:5px 5px 0 0;\n  }\n  .flea_content > textarea {\n    border : 2px solid #337ab7;\n    border-radius:0 0 5px 5px;\n  }\n  \n  .flea_survey{\n    width:900px;\n    height:300px;\n    border : 2px solid #337ab7;\n    border-radius:5px;\n    margin:0 auto;\n    margin-top:40px;\n  }\n  .flea_survey > p{\n    padding:10px;\n    font-size:20px;\n    border-bottom: 2px solid #337ab7;\n  }\n  .flea_map{\n    width:900px;\n    border : 2px solid #337ab7;\n    margin:0 auto;\n    margin-top:40px;\n    border-radius:5px;\n  }\n  .flea_map > p{\n    padding:10px;\n    font-size:20px;\n    border-bottom: 2px solid #337ab7;\n  }\n  .flea_buttons{\n    text-align: center;\n    width:900px;\n    height:100px;\n    margin : 0 auto;\n    margin-top:40px;\n  }\n  #map{\n    width: 99%;\n    height:400px;\n  }\n\n  li{\n        list-style: none;\n    }\n\n    #survey_body{\n        margin: 0 auto;\n        width: 95%;\n        height: 300px;\n        border: 1px solid #999a9b;\n        border-radius: 5px;\n        \n    }\n\n    #added_body{\n        margin: 0 auto;\n        width: 95%;\n        height: 250px;\n        border: 1px dotted #999a9b;\n        border-radius: 5px;\n        overflow: scroll;\n    }\n\n    #survey_add{\n        width: 100%;\n        height: 40px;\n        border-radius: 5px;\n        background-color: #ad2d2d;\n        color: white;\n    }\n    \n    .survey_lists{\n        margin: 0 auto;\n        margin-top: 10px;\n        width: 95%;\n        height: 0 auto;\n        border: 1px solid #999a9b;\n        border-radius: 5px;\n    }\n    \n    /*#plusBtn{\n        margin: 0 auto; \n        position: absolute; \n        width: 89.8%;\n        height: 46px;\n        top: 198px; \n        left: 30px;\n    }*/\n\n    .input-group{\n        width: 100%;\n        height: 40px;\n    }\n\n    .input-group:last-child{\n        width: 100%;\n        height: 40px;\n        margin-bottom: 5px;\n    }\n\n    .survey_q{\n        width: 99%;\n        border: 1px solid #999a9b;\n        border-radius: 5px;\n        height: 80%;\n        margin: 2px;\n        margin-bottom: 5px;\n        \n    }\n    .survey_ex{\n        height: 100%;\n        width: 99%;\n        border: 1px solid #999a9b;\n        border-radius: 5px;\n        \n    }\n\n    #uninvoke_body{\n      display: block;\n    }\n\n    #uninvoke_survey_header{\n      display: block;\n    }\n\n    #invoked_body{\n      display: none;\n      height: 80%;\n      overflow: scroll;\n    }\n\n    #invoked_survey_header{\n      display: none;\n    }\n    .info_title{\n      font-size:40px;\n      padding:10px;\n      text-align:center;\n      border-radius:20px 20px 0px 0px;\n    }\n    .flea_detailmain{\n      border:2px solid #337ab7;\n      border-top:0;\n      border-radius:20px;\n    }\n\n\n</style>\n\n<script>\n    $(document).ready(function(){\n        var firstSurvey = \"<div class='survey_lists'>\";\n            firstSurvey +=\"<input type='hidden' class='exampleLength' value='2'>\";\n            firstSurvey +=\"<div class='input-group'>\";\n            firstSurvey +=\"<input type='text' class='survey_q' placeholder='설문문항-1'>\";\n            firstSurvey +=\"</div>\";\n            firstSurvey +=\"<div class='input-group'>\";\n            firstSurvey +=\"<span class='input-group-addon'>1</span>\";\n            firstSurvey +=\"<input type='text' class='survey_ex' placeholder='문항보기'>\";\n            firstSurvey +=\"</div>\";\n            firstSurvey +=\"<div class='input-group'>\";\n            firstSurvey +=\"<span class='input-group-addon'>2</span>\";\n            firstSurvey +=\"<input type='text' class='survey_ex' placeholder='문항보기'>\";\n            firstSurvey +=\"</div>\";\n            firstSurvey +=\"</div>\";\n\n\n        $(\"#surveyAddBtn\").click(function(){\n            $(\"#myModal\").modal();\n        });\n\n        $(\"#surveyViewBtn\").click(function(){\n            location.href=\"/surveyView/1\";\n        });\n\n        $('#survey_add').click(function(){\n            var survey =\"<div class='input-group'>\";\n            var number = Number($('.input-group-addon').not('.clone').last().text()) + 1;\n            survey += \"<span class='input-group-addon' id='basic-addon1'>\" + number + \"</span>\";\n            survey += \"<input type='text' class='survey_ex' placeholder='문항보기'>\";\n            survey += \"</div>\";\n\n            $('.survey_lists').not('.clone').append(survey);\n            var exampleLength = Number($('.survey_lists').not('.clone').children('.exampleLength').attr('value'));\n            $('.survey_lists').not('.clone').children('.exampleLength').attr('value',exampleLength + 1);\n        });\n\n        $('#apply').click(function(){\n            var surveyClone = $('.survey_lists:eq(0)').clone(); \n            //적용하기 전 설문문항만 적용시키기위한 clone\n            $('#added_body').append(surveyClone);\n            $('#added_body').children('.survey_lists').addClass('clone');\n            $('#added_body .survey_q').addClass('clone');\n            $('#added_body .survey_ex').addClass('clone');\n            $('.survey_q.clone').prop('readonly',true);\n            $('.survey_ex.clone').prop('readonly',true);\n            $('#added_body .input-group-addon').addClass('clone');\n\n            $('#survey_body .survey_lists').remove();\n            $('#survey_body').append(firstSurvey);\n\n        });\n\n\n        $('#confirm').click(function(){\n            var surveryLength = $('#added_body .survey_lists').length;\n            $('#invoked_body_hidden').attr('value',surveryLength);\n\n            for(var i = 0, length = $('#added_body .survey_lists').length; i < length; i++){\n              $('#added_body .survey_lists:eq('+i+') .survey_q').attr('name','quastion_'+i);\n              $('#added_body .survey_lists:eq('+i+') .exampleLength').attr('name','exampleLength_'+i);\n              console.log($('#added_body .survey_lists:eq('+i+') .survey_ex').length);\n              for(var j = 0, length2 = $('#added_body .survey_lists:eq('+i+') .survey_ex').length; j < length2; j++){\n                // alert(j);\n                 $('#added_body .survey_lists:eq('+i+') .survey_ex:eq('+j+')').attr('name','example_'+i+'_'+j);\n              }\n            }\n            var surveyList = $('#added_body .survey_lists');\n            $('#invoked_body').append(surveyList);\n\n            $('#invoked_body').show();\n            $('#uninvoke_body').hide();\n            $('#uninvoke_survey_header').hide();\n            $('#invoked_survey_header').show();\n        });        \n\n        // $('#confirm').click(function(){\n        //     var surveyArr = Array();\n        //     for(var i = 0, length1 = $('#added_body .survey_lists').length; i < length1; i++){\n        //         surveyArr[i] = {};\n        //         surveyArr[i]['survey_q'] = String($('#added_body .survey_q:eq('+i+')').val());\n        //         for(var j = 0, length2 = $('#added_body .survey_lists:eq('+i+') .survey_ex').length; j < length2; j++){\n        //             surveyArr[i]['survey_ex_'+j] = String($('#added_body .survey_lists:eq('+i+') .survey_ex:eq('+j+')').val());\n        //         }\n        //     }\n\n        //     console.log(surveyArr);\n        //     console.log(surveyArr[0].length);\n        //     $.ajax({/*서버에 값 전달*/\n        //       url : 'http://localhost:8000/survey/register',\n        //       data: {\n        //         surveyArr : surveyArr\n        //       },\n        //       dataType : 'jsonp',\n        //       success : function(data){\n        //         console.log(data);\n        //         alert('저장이 완료되었습니다.');\n        //       },\n        //       error : function(){\n        //         alert('에러가 발생하였습니다'); \n        //       }\n        //     });\n        // });\n\n        $('#accountViewBtn').click(function(){\n            location.href=\"/account/view/1\";\n        });\n       \n    });\n\n    // if(!$('#invoked_body .survey_lists').length){\n    //   $('#invoked_body').hide();\n    //   $('#uninvoke_body').show();\n    //   $('#uninvoke_survey_header').show();\n    //   $('#invoked_survey_header').hide();\n    // }else{\n      \n    // }\n</script>\n\n<script>\n  $(document).ready(function(){\n\n      // 각 달력 date picker\n      $( \"#date_start\" ).datepicker({\n          dateFormat : \"yy-mm-dd\"\n      });\n      $( \"#date_end\" ).datepicker({\n          dateFormat : \"yy-mm-dd\"\n      });\n      $( \"#time_first\" ).datepicker({\n          dateFormat : \"yy-mm-dd\"\n      });\n      $( \"#end_time_first\" ).datepicker({\n          dateFormat : \"yy-mm-dd\"\n      });\n\n      $(\"#booth_map\").click(function(){\n          alert('test');\n      });\n\n      $(\"#send_button\").click(function(){\n          // alert($(\"#date_start\").val())\n      })\n  })\n</script>\n\n@extends('layouts.app')\n\n@section('content')\n  <form action=\"/flea/new\" class=\"form-inline\" method=\"post\">\n      <input type=\"hidden\" name=\"flea_id\" value=\"{{$flea_num}}\">\n      <input type=\"hidden\" name=\"flea_th\" value=\"{{$flea_id}}\">\n  <div id='flea_detail'>\n    <!-- 사진 및 소개 -->\n    <div class=\"flea_detailmain\">\n      <p class=\"bg-primary info_title\">{{$flea_data[0]->flea_name}} {{$flea_id}} 회차</p>\n            <!-- 대표 이미지 불러오기 -->\n              <img src=\"{{asset('user_img/')}}/{{$flea_data[0]->image_name}}\" style=\"margin-left:80px;width:400px; height:500PX;\" alt=\"\">\n          <div id=\"info\">\n            {{--<p class=\"info_p\">마켓명 : <input class=\"input_class\" type=\"text\"></p>--}}\n            \n\n            <p class=\"info_p\">날&nbsp;&nbsp;&nbsp;짜 : <input class=\"form-control\" style=\"width:110px\" id=\"date_start\" type=\"text\" name=\"date_start\">\n            ~ <input style=\"width:110px\" class=\"form-control\" id=\"date_end\" type=\"text\" name=\"date_end\" value=\"\"></p>\n\n            <!-- <input style=\"width:110px\" id=\"time_start\" type=\"text\" name=\"start\"> -->\n            <!-- <input style=\"width:110px\" id=\"date_end\" type=\"text\" name=\"time_end\" value=\"\"></p> -->\n            {{--<p class=\"info_p\">장&nbsp;&nbsp;&nbsp;소 : <input type=\"text\" class=\"form-control\" name=\"location\" value=\"\"></p>--}}\n            <p class=\"info_p\">주&nbsp;&nbsp;&nbsp;제 : <input type=\"text\" class=\"form-control\" name=\"category\" value=\"음식\"></p>\n            <p class=\"info_p\">참가비 : <input type=\"text\" class=\"form-control\" name=\"entry_fee\" value=\"5000\"></p>\n            <p class=\"info_p\">부스비 : <input type=\"text\" class=\"form-control\" name=\"booth_fee\" value=\"5000\"></p>\n            <p class=\"info_p\">커미션 : <input style=\"width:80px\" type=\"text\" class=\"form-control\" name=\"com\" value=\"12\">%</p>\n\n            <!-- <input id='timepicker' type='text' name='timepicker'/> -->\n\n            <p class=\"info_p\">개최 시간&nbsp;&nbsp;&nbsp;<br>\n            <select name=\"start_time_hour\" class=\"btn btn-default\">\n              <script type=\"text/javascript\">\n                for(var i = 1; i <= 24; i++){\n                  document.write(\"<option>\"+i+\"</option>\");\n                }  \n              </script>\n            </select>  : \n            <select name=\"start_time_min\" class=\"btn btn-default\">\n              <option>00</option>\n              <script type=\"text/javascript\">\n                for(var i = 5; i < 60; i+=5){\n                  document.write(\"<option>\"+i+\"</option>\");\n                }  \n              </script>\n            </select>\n\n            ~\n\n            <select name=\"stop_time_hour\" class=\"btn btn-default\">\n              <script type=\"text/javascript\">\n                for(var i = 1; i <= 24; i++){\n                  document.write(\"<option>\"+i+\"</option>\");\n                }  \n              </script>\n            </select>  : \n            <select name=\"stop_time_min\" class=\"btn btn-default\">\n              <option>00</option>\n              <script type=\"text/javascript\">\n                for(var i = 5; i < 60; i+=5){\n                  document.write(\"<option>\"+i+\"</option>\");\n                }  \n              </script>\n            </select>\n\n            <p class=\"info_p\">판매자 모집 종료 기간<br>\n            <p class=\"info_p\"><input class=\"form-control\" style=\"width:110px\" id=\"time_first\" type=\"text\" name=\"time_first\">\n              ~ <input class=\"form-control\" style=\"width:110px\" id=\"end_time_first\" type=\"text\" name=\"end_time_first\" value=\"\"></p>\n\n\n          </div>\n    </div>\n\n    <!-- 설명글 -->\n    <div class=\"flea_content\">\n          <p>설명</p>\n          <textarea name=\"flea_text\" style=\"padding : 20px;width:100%;height:350px;resize:none;\">테스트입니다~</textarea>\n    </div>\n\n\n    <!-- 부스배치도 -->\n    <div class=\"flea_survey\">\n      \n      <p id=\"uninvoke_survey_header\">질문등록</p>\n      <p id=\"invoked_survey_header\">질문등록</p>\n      <div id=\"uninvoke_body\" class=\"text-center\">\n          <img id=\"surveyAddBtn\" src=\"https://cdn1.iconfinder.com/data/icons/freeline/32/add_cross_new_plus_create-512.png\" style=\"width:150px;height:150px;margin-top:40px;\">\n      </div>\n      <div id=\"invoked_body\" class=\"text-center\">\n         <input type=\"hidden\" id=\"invoked_body_hidden\" name=\"invoked_body_hidden\" value=\"\">\n      </div>\n    </div>\n\n    <div class=\"modal fade\" id=\"myModal\">\n        <div class=\"modal-dialog\">\n        \n          <!-- Modal content-->\n          <div class=\"modal-content\">\n            <div class=\"modal-header\">\n              <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button> <!--header의 x버튼-->\n              <h4 class=\"modal-title text-center\">설문조사 등록</h4>\n            </div>\n            <div class=\"modal-body\">\n                <div id=\"survey_body\">\n                    <button type=\"button\" class=\"btn\" id=\"survey_add\">\n                        <span class=\"glyphicon glyphicon-plus-sign\"></span> \n                    </button>\n                    <div class='survey_lists'>\n                        <input type='hidden' class='exampleLength' value='2'>\n                        <div class='input-group'>\n                            <input type='text' class='survey_q'value='당신의 성별은?'> \n                            <!-- placeholder='설문문항-1' -->\n                        </div>\n                        <div class='input-group'>\n                            <span class='input-group-addon'>1</span>\n                            <input type='text' class='survey_ex' value=\"남자\">\n                            <!--placeholder='문항보기'-->\n                        </div>\n                        <div class='input-group'>\n                            <span class='input-group-addon'>2</span>\n                            <input type='text' class='survey_ex' value=\"여자\">\n                            <!--placeholder='문항보기'-->\n                        </div>\n                    </div>\n\n                </div>\n                <br>\n                <div id=\"added_body\">\n                    \n                </div>\n            </div>\n            <div class=\"modal-footer\">\n                <button type=\"button\" id=\"apply\" class=\"btn btn-default\">적용하기</button>\n                <button type=\"button\" id=\"confirm\" class=\"btn btn-default\" data-dismiss=\"modal\">확인</button>\n                <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">취소</button>\n            </div>\n          </div>\n          \n        </div>\n      </div>\n      \n    </div>\n\n\n    <!-- 지도 -->\n    <div class=\"flea_map\">\n      <p>지도</p>\n      <div id=\"map\">\n        <script>\n            //구글 맵 api\n            function initMap() {\n                var lat_value = {{$flea_data[0]->coordinate1}};\n                var lng_value = {{$flea_data[0]->coordinate2}};\n\n                var myLatLng = {lat: lat_value, lng: lng_value};\n\n                var map = new google.maps.Map(document.getElementById('map'), {\n                    zoom: 15,\n                    center: myLatLng\n                });\n\n                var marker = new google.maps.Marker({\n                    position: myLatLng,\n                    map: map,\n                    title: 'Hello World!'\n                });\n            }\n        </script>\n        <script async defer\n                src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyCpA9_rF-RU1DlFl7Bb5JiUYsieSobRj0Q&callback=initMap\">\n        </script>\n      </div>\n    </div>\n\n    <!-- 버튼 -->\n    <div class=\"flea_buttons\">\n      <!-- if문을 사용하여 로그인 전후와 본인이 작성한 것을 기준으로\n    나타내는 버튼을 다르게 나타가게함. -->\n      <button class=\"btn btn-primary btn-lg btn-block\" type=\"submit\" name=\"button\" id=\"send_button\">배치도 선택</button>\n    </div>\n  </div>\n</form>\n\n@endsection","undoManager":{"mark":-2,"position":0,"stack":[[{"start":{"row":403,"column":0},"end":{"row":404,"column":0},"action":"insert","lines":["",""],"id":2}]]},"ace":{"folds":[],"scrolltop":7260,"scrollleft":0,"selection":{"start":{"row":0,"column":0},"end":{"row":4,"column":84},"isBackwards":true},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":146,"state":"css-ruleset","mode":"ace/mode/php"}},"timestamp":1501810874000}