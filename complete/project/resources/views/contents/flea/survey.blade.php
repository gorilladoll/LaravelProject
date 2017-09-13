<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
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
    
  </style>

  <script>
    $(document).ready(function(){
        var firstSurvey = "<div class='survey_lists'>";
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
                        
        });

        $('#apply').click(function(){
            var surveyClone = $('.survey_lists:eq(0)').clone();
            $('#added_body').append(surveyClone);
            $('#added_body').children('.survey_lists').addClass('clone');
            $('#added_body .input-group-addon').addClass('clone');

            $('#survey_body .survey_lists').remove();
            $('#survey_body').append(firstSurvey);
        });

        $('#confirm').click(function(){
            var surveyArr = Array();
            for(var i = 0, length1 = $('#added_body .survey_lists').length; i < length1; i++){
                surveyArr[i] = {};
                surveyArr[i]['survey_q'] = String($('#added_body .survey_q:eq('+i+')').val());
                for(var j = 0, length2 = $('#added_body .survey_lists:eq('+i+') .survey_ex').length; j < length2; j++){
                    surveyArr[i]['survey_ex_'+j] = String($('#added_body .survey_lists:eq('+i+') .survey_ex:eq('+j+')').val());
                }
            }

            console.log(surveyArr);
            console.log(surveyArr[0].length);
            $.ajax({/*서버에 값 전달*/
              url : 'http://localhost:8000/survey/register',
              data: {
                surveyArr : surveyArr
              },
              dataType : 'jsonp',
              success : function(data){
                console.log(data);
                alert('저장이 완료되었습니다.');
              },
              error : function(){
                alert('에러가 발생하였습니다'); 
              }
            });
        });

        $('#accountHostBtn').click(function(){
            location.href="/account/host/1";
        });

        $('#accountSellerBtn').click(function(){
            location.href="/account/seller";
        });
       
    });

</script>

</head>
<body>

<div class="container">
  <h2>설문조사 등록</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-primary btn-lg" id="surveyAddBtn">등록하기</button>
  <button type="button" class="btn btn-primary btn-lg" id="surveyViewBtn">설문조사 보기</button>
  <button type="button" class="btn btn-primary btn-lg" id="accountHostBtn">개최자 정산(롯데 플리마켓)</button>
  <button type="button" class="btn btn-primary btn-lg" id="accountSellerBtn">판매자 정산(롯데 플리마켓)</button>

  <!-- Modal -->
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
                <button class="btn" id="survey_add">
                    <span class="glyphicon glyphicon-plus-sign"></span> 
                </button>
                <div class='survey_lists'>
                    <div class='input-group'>
                        <input type='text' class='survey_q' placeholder='설문문항-1'>
                    </div>
                    <div class='input-group'>
                        <span class='input-group-addon'>1</span>
                        <input type='text' class='survey_ex' placeholder='문항보기'>
                    </div>
                    <div class='input-group'>
                        <span class='input-group-addon'>2</span>
                        <input type='text' class='survey_ex' placeholder='문항보기'>
                    </div>
                </div>

            </div>
            <br>
            <div id="added_body">
                
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" id="apply" class="btn btn-default">적용하기</button>
            <button type="button" id="confirm" class="btn btn-default">확인</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">취소</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

</body>
</html>

