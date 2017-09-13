@extends('layouts.app')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>배치도 선택</title>


    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <style>
        .group_wrap{
            margin:10px auto;
            width:700px;
            border: 1px solid black;
        }
        .group_wrap > h2 {
            border-bottom:1px solid darkgray;
            margin:0;
            padding:10px;
        }
        .group_list{
            overflow:auto;
            width:660px;
            height:400px;
            margin:10px auto;
            border: 1px solid black;
        }
        .button{
            width:150px;
            margin:10px auto;
        }
        .my_list{
            margin:20px auto;
            width:95%;
            height:90px;
            border-radius: 10px;
            background-color:lightgray;
            text-align: center;
        }
        .my_list > h1{
            padding: 25px;
        }
    </style>

    <script>
        //데이터 값 넘기고 받아와서 배열에 저장하는것 해야됨
        $(document).ready(function(){
            var plan_arr = Array(); // 배치도 리스트 값을 저장하는 배열
            var booth_select = 0;   // 어떤 배치도가 선택됬는지 저장할 변수
            var plan_list = 1;      // 새로운 배치도를 추가할 때 사용할 ID값

            // DB의 값을 가져와서 리스트를 생성한다.
            @foreach($user_plans as $user_plan)
                // 가져온 DB값으로 div를 추가
                var plan = "<div class='my_list booth_select' id="+plan_list+"><h1>"+'{{$user_plan->plan_name}}'+"</h1></div>";
                $('.group_list').append(plan);

                // 추가된 DIV의 정보를 담을 함수
                function plan_info(){
                    this.id_num;
                    this.text;
                    this.plan_id = {{$user_plan->user_id}}; // 어떤 유저의 것인지 입력

                    this.setId = function(IdArg){
                        this.id_num = IdArg;
                    }
                    this.getId = function(){
                        return this.id_num;
                    }
                    this.setText = function(textArg){
                        this.text = textArg;
                    }
                    this.getText = function(){
                        return this.text;
                    }
                }

                var test = new plan_info();

                // 생성된 함수를 배열에 넣고 setter로 값을 설정
                test.setText('{{$user_plan->plan_name}}');
                test.setId(plan_list);
                plan_arr.push(test);

                // 생성된 DIV에 click 함수 추가
                $('.booth_select').click(function(){
                    $('#'+booth_select).css('background-color','lightgray');
                    booth_select = $(this).attr('id');
                    $(this).css('background-color','lightgreen');
                });
                plan_list++;
            @endforeach

            // 신규 부스 생성 modal 출력
            $('.new_booth').click(function(){
                $('#'+booth_select).css('background-color','lightgray');
                booth_select = 0;
                $('#new_plan_text').val('');
                $('#new_plan').modal('show');
            });

            var plan_count = plan_arr.length+1; //신규 부스 카운트는 이미 있는거 +1부터

            // 배치도 생성
            $('#new_plan_create').click(function(){
                for (var i=0; i<plan_arr.length;i++){
                    if($('#new_plan_text').val() == plan_arr[i].getText()){
                        alert('이미 같은 이름이 있습니다!!');
                        return;
                    }
                }

                $.ajax({
                    /*서버에 값 전달*/
                    url: 'http://localhost:8000/booth/open/new',
                    data: {
                        plan_text: $('#new_plan_text').val(),
                        id: {{$user_info->id}}
                    },
                    dataType: 'jsonp',
                    success: function (data) {
                        alert('생성 완료!');
                    },
                    error: function () {
                        alert('에러가 발생하였습니다');
                        return;
                    }
                });

                $('#new_plan').modal('hide');
                var plan = "<div class='my_list booth_select' id=" + plan_count + "><h1>" + $('#new_plan_text').val() + "</h1></div>";
                $('.group_list').append(plan);

                function plan_info() {
                    this.id_num;
                    this.text;
                    this.plan_id = 'null';

                    this.setId = function (IdArg) {
                        this.id_num = IdArg;
                    }
                    this.getId = function () {
                        return this.id_num;
                    }
                    this.setText = function (textArg) {
                        this.text = textArg;
                    }
                    this.getText = function () {
                        return this.text;
                    }
                }

                var test = new plan_info();
                test.setText($('#new_plan_text').val());
                test.setId(plan_count);
                plan_arr.push(test);
                $('.booth_select').click(function () {
                    $('#' + booth_select).css('background-color', 'lightgray');
                    booth_select = $(this).attr('id');
                    $(this).css('background-color', 'lightgreen');
                });
                plan_count++;
            });

            //배치도 선택
            $('.ok').click(function(){
                if(booth_select == 0){
                alert("선택된 배치도가 없습니다!");
                return;
                }
                if(confirm("'"+$('#'+booth_select).children().text()+"' 선택한 배치도로 진행하시겠습니까?")){
                    var urltest = $('#'+booth_select).children().text();
                    window.location.href = '{{url("/booth/view/")}}/'+urltest;
                    // url로 배치도의 이름 값을 전달한다.
                }
            });

            // 배치도 삭제 구문
            $('.delete').click(function(){
                if(booth_select == 0) {
                    alert("선택된 배치도가 없습니다!");
                    return;
                }

                if(confirm($('#'+booth_select).children().text()+" 배치도를 삭제합니다. 괜찮습니까?")){
                    var select_id = $('#'+booth_select).attr('id'); //선택한 배치도의 ID값을 가져옴
                    for(var i=0; i<plan_arr.length; i++){
                        if(plan_arr[i].getId() == select_id){
                            $.ajax({/*서버에 값 전달*/
                                url : 'http://localhost:8000/booth/open/del',
                                data: {
                                    plan_text : plan_arr[i].getText(),
                                    id : {{$user_info->id}}
                                },
                                dataType : 'jsonp',
                                success : function(data){
                                    alert('삭제 완료');
                                },
                                error : function(){
                                    alert('에러가 발생하였습니다');
                                    return;
                                }
                            });
                        }
                    }
                    $('#'+booth_select).remove();
                }
            });
        });
    </script>
</head>
<body>

<div class="group_wrap">
    <h2>배치도 선택 및 생성</h2>
    <div class="group_list">
        <div class="my_list new_booth">
            <h1>신규 부스 생성</h1>
        </div>
    </div>
    <div class="button">
        <button class="delete btn btn-default">삭제</button>
        <button class="ok btn btn-default">완료</button>
    </div>
</div>

<div class="modal fade" id="new_plan" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">신규 부스 생성</h4>
            </div>
            <div class="modal-body">
                생성할 부스명을 입력하세요
                <input id="new_plan_text" style='width:100%' type="text">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">취소</button>
                <button type="button" id="new_plan_create" class="btn btn-primary">생성</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</body>
    <br>
@endsection