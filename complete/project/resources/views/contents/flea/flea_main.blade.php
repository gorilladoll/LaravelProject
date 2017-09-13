@extends('layouts.app')

@section('content')
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>


        hr{
            width: 100%;
            border: 1px solid black;
            margin-top: 0px;
        }
        .wrapper{
            margin: 0 auto;
            width: 1200px;
            height: 1500px;
            /*border: 1px solid black;*/
        }
        .flea_list_header{
            margin-top: 100px;
            font-size: 30px;
            font-family: 'interparkM';
            margin-bottom: 30px;
            padding:20px;
            /*border-bottom:2px solid #cc0a2d;*/
            background-color: /*#cc0a2d*/white;
            color: #cc0a2d;
            text-align:center;
        }
        .flea_list_body{
            /*border: 1px solid black;*/
            padding-left: 20px;
            margin-left: 0;
            width: 100%;
            height: 600px;
        }
        .flea_list_content{
            margin-left: 30px;
            margin-bottom : 20px;
            width: 340px;
            height: 580px;
            float: left;
            padding : 10px;
            padding-top : 20px;
            border: 1px solid #EBEBEB;
            border-radius: 4px;
            /*font-weight : bold;*/
            font-size : 15px;
            color : black;
        }
        
        .flea_list_content:hover {
            /*font-weight : bold;*/
            color : #FB4242;
            border: 1px solid #FB4242;
        }
        .flea_img{
            margin: 0px;
            width: 100%;
            height: 400px;
        }
        .flea_img img{
            width: 100%;
            height: 100%;
        }
        .flea_info{
            margin-left: 0px;
            /*border: 1px solid black;*/
            padding-top: 5px;
            width: 100%;
            height: 90px;
            /*border-bottom: 1px dotted black;*/
        }
        .flea_explain{
            margin: 0 auto;
            margin-top: 5px;
            width: 90%;
        }

        .flea_info_date, .flea_info_location, .flea_info_title{
            margin: 0 auto;
            margin-top: 5px;
            width: 90%;
        }

        .flea_info_title, .flea_info_location{
            height: 25px;
            border-bottom: 1px dotted black;
        }
        
        
    </style>

    <script>
        $(document).ready(function(){
            $('#group_list').click(function () {
                window.location.href = '{{url("/group/list")}}';
            });
            
            $("#group_create").click(function(){
                $("#group_modal").modal();
            });
            
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
    
    <div class="flea_list_header">FLEA MARKET LIST</div>
    
    <div class="wrapper">
        <div class="flea_list_body">
            @for($i = 0, $length = count($fleamarketInfo); $i < $length; $i++)
                <div class="flea_list_content">
                    <div class="flea_img"><a href='{{url("/fleamarket/flea_page/")}}/{{$fleamarketInfo[$i]->id}}'><img src="{{asset('user_img/')}}/{{$fleamarketInfo[$i]->image_name}}"></a></div>
                    <div class="flea_info text-center">
                        <div class="flea_info_title text-center">{{$fleamarketInfo[$i]->flea_name}} {{$fleamarketInfo[$i]->th}}회차</div>
                        <div class="flea_info_date text-left">일시 : {{$fleamarketInfo[$i]->start_year_month}}-{{$fleamarketInfo[$i]->start_day}} &nbsp&nbsp&nbsp&nbsp&nbsp 시간: {{$fleamarketInfo[$i]->start_time}} ~ {{$fleamarketInfo[$i]->end_time}}</div>
                        <div class="flea_info_location text-left">지역 : {{$fleamarketInfo[$i]->location}}</div>
                    </div>
                    <div class="flea_explain text-center">
                        {{$fleamarketInfo[$i]->text}}
                    </div>
                </div>
            @endfor
            <div style="margin:0 auto; width:500px; height:50px;" class="text-center">{{$fleamarketInfo->links()}}</div>
        </div>
    </div>
    
    <div class="modal fade" id="group_modal">
        <div class="modal-dialog">
            <style type="text/css">
                .modal-body{
                    width:100%;
                    height:400px;
                    
                }
                .my_list{
                    border:1px solid black;
                    font-family:'interparkM';
                    text-align:center;
                }
                .new_booth{
                    border:0px;
                    border-radius:5px;
                    margin-bottom:15px;
                    color:white;
                    background-color:#db2d20;
                    height:50px;
                    line-height:50px;
                    font-size:30px;
                }
                
            </style>
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button> <!--header의 x버튼-->
                    <h4 class="modal-title text-center">그룹 관리</h4>
                </div>
                
                <div class="modal-body">
                    <div class="group_list">
                        <div class="my_list new_booth text-center">
                            NEW GROUP CREATE
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button class="delete btn btn-default">삭제</button>
                    <button class="ok btn btn-default">개최</button>
                </div>
            </div>
        </div>
    </div>
    
    <button id="group_create"> ggg </button>
    
    <div class="flea_open_button" style="margin:0 auto; width:100%; margin-top:20px;">
        <div id="flea_list">지역
            <select>
                <option>서울특별시</option>
            </select>
            <select>
                <option>동대구</option>
            </select>
        </div>
        {{--<button onclick="location.href='/booth/open';">그룹선택</button>--}}
        <button class="btn btn-primary" id="group_list">개최하기</button>
    </div>

@endsection