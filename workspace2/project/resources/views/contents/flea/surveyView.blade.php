
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://surveyjs.azureedge.net/0.12.16/survey.jquery.min.js"></script>
    <style>
        .wrapper{
            margin: 0 auto;
            width: 800px;
            height: 700px;
            border: 1px solid black;
            border-radius: 5px;
        }
        .survey_header{
            margin: 0 auto;
            width: 95%;
            height: 15%;
        }
        .survey_body{
            margin: 0 auto;
            width: 99%;
            height: 70%;
            overflow: scroll;
        }
        .survey_footer{
            margin: 0 auto;
            width: 95%;
            height: 15%;
        }
        hr{
            border: 1px solid #a0a0a0;
        }

        li{
            list-style: none;
        }
        .survey_lists{
            margin: 0 auto;
            width: 700px;
            height: 0 auto;
            border: 1px solid black;
            border-radius: 5px;
        }
        .survey_q{
            border-bottom: 1px solid black;
        }
        .survey_ex{
            border-bottom: 1px solid black;
        }
        .survey_ex:last-child{
            border-bottom: 0px;
        }
        .apply{
            margin-left: 88%;
            margin-top: 7%;
        }
        .select

    </style>
    <script>


        $(document).ready(function(){

            // Survey.Survey.cssType = "bootstrap";

            // var surveyJSON = {pages:[{elements:[{type:"radiogroup",choices:["item1","item2","item3"],name:"question6"},{type:"radiogroup",choices:["item1","item2","item3"],name:"question1"}],name:"page1"},{name:"page2"}]};

            // function sendDataToServer(survey) {
            //     survey.sendResult('ae68c2c3-7e92-496a-95f0-a345e8c5d5b3');
            // }

            // var survey = new Survey.Model(surveyJSON);
            // $("#surveyContainer").Survey({
            //     model: survey,
            //     onComplete: sendDataToServer
            // });

            $('.apply').click(function(){
                var examList = Array();
                var finalQNum = $('.survey_q').last().attr('class');
                var qArr = finalQNum.split('_');
                    
                finalQNum = Number(qArr[2]);

                console.log("질문문항 개수 : " + (finalQNum+1));
                for(var i = 0; i < finalQNum+1; i++){
                    examList[i] = $('.example_'+i).val();
                }

                $.ajax({/*서버에 값 전달*/
                    url : 'http://localhost:8000/survey/apply',
                    data: {
                      boothArr : boothAttrArr
                    },
                    dataType : 'jsonp',
                    success : function(data){
                      console.log(data[0]['top']);
                      alert('저장이 완료되었습니다.');
                    },
                    error : function(){
                      console.log(boothAttrArr);
                      alert('에러가 발생하였습니다'); 
                    }
                });
            });

        });


    </script>
</head>
    
<body>
    <!-- <div id="surveyContainer"></div> -->

    <div class="wrapper">
        <div class="survey_header">
            <div class="text-center">판매자 설문조사</div>    
            <hr/>
        </div>
        <div class="survey_body">
        @for($i = 0; $i < count($quastionsJoin); $i++)
            <div class="survey_lists">
                <li class="survey_q q_{{$i}}">{{$quastionsJoin[$i]->text}}</li><br>
                @for($j = 0; $j < count($examplesJoin); $j++)
                    @if($quastionsJoin[$i]->id == $examplesJoin[$j]->parent_id)
                        <input type="radio" name="example_{{$i}}" class="survey_ex example_{{$i}}" value="{{$examplesJoin[$j]->text}}">{{$examplesJoin[$j]->text}}<br><br>
                    @endif
                @endfor
            </div> 
            <br/>  
        @endfor

        </div>
        <div class="survey_footer">
            <button class="btn btn-default apply">신청하기</button>    
        </div>        
    </div>


    
</body>
</html>