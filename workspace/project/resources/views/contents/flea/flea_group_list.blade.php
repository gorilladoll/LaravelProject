@extends('layouts.app')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>그룹 선택</title>


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
            $('.my_list').click(function(){
                window.location.href = '/group/create';
            })

            $('.ok').click(function(){
                if(select_color == 0){
                    alert("선택된 그룹이 없습니다!");
                    return;
                } else {
                    if(confirm("현재 선택된 그룹으로 진행하시겠습니까?")){
                        var user = '{{$user_id}}';
                        var name = $('#'+select_color).text();

                        //ajax 안됨 Get으로 처리할 것
                        window.location.href = '{{url("/flea/open")}}/'+name;
                    }
                }

            })

            $('.delete').click(function(){
                if(confirm("해당 그룹을 삭제하시겠습니까?")){
                    $.ajax({
                        /*서버에 값 전달*/
                        url: 'http://localhost:8000/group/del',
                        data: {
                            group_name: $('#'+select_color).text(),
                            user_id : 1
                        },
                        dataType: 'jsonp',
                        success: function (data) {

                        },
                        error: function () {
                            alert('에러가 발생하였습니다');
                            return;
                        }
                    });
                }
            })

            var group_ = 1;
            var select_color = 0;
            // 그룹 리스트 생성
            @foreach($lists as $list)
                var group_list = "<div class='my_list booth_select' id="+(group_)+"><h1>"+'{{$list->flea_name}}'+"</h1></div>";
                $('.group_list').append(group_list);

                $('#'+group_).click(function(){
                    //중복 실행 방지
                    if($(this).attr('id') == select_color){
                        return;
                    }
                    list_color($(this).attr('id'));
                })
                group_++;
            @endforeach

            function list_color(idArg){
                $('#'+select_color).css('background-color','lightgray');
                select_color = idArg;
                $('#'+select_color).css('background-color','lightgreen');
            }
        });
    </script>
</head>
<body>

<div class="group_wrap">
    <h2>그룹 관리</h2>
    <div class="group_list">
        <div class="my_list new_booth">
            <h1>신규 그룹 생성</h1>
        </div>
    </div>
    <div class="button">
        <button class="delete btn btn-default">삭제</button>
        <button class="ok btn btn-default">개최</button>
    </div>
</div>

</body>
    <br>
@endsection