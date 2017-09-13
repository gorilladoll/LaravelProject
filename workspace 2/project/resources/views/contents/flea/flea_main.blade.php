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
            width: 1480px;
            height: 1400px;
            font-family: 'interparkM','interparkMEot';
            /*border: 1px solid black;*/
        }
        .flea_list_header{
            margin:auto;
            margin-top: 140px;
            font-size: 30px;
            font-family: 'interparkM','interparkMEot';
            margin-bottom: 50px;
            /*padding:20px;*/
            padding-top:8px;
            border:2px solid #cc0a2d;
            border-radius:5px;
            width:400px;
            height:60px;
            background-color: /*#cc0a2d*/white;
            color: #cc0a2d;
            text-align:center;
            box-shadow:5px 5px 10px #848484;
        }
        .flea_list_body{
            /*border: 1px solid black;*/
            /*padding-left: 20px;*/
            margin-left: 0;
            width: 100%;
            height: 1200px;
        }
        .flea_list_content{
            margin-left: 20px;
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
            background-color:white;
            font-family:'interparkM','interparkMEot';
            box-shadow: 3px 3px 10px #848484;
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
                    if(confirm("選んだグループでしますか?")){
                        var user = '{{$user_id}}';
                        var name = $('#'+select_color).text();

                        //ajax 안됨 Get으로 처리할 것
                        window.location.href = '{{url("/flea/open")}}/'+name;
                    }
                }

            })

            $('.delete').click(function(){
                if(confirm("選んだグループを削除しますか?")){
                    $.ajax({
                        /*서버에 값 전달*/
                        url: '/group/del',
                        data: {
                            group_name: $('#'+select_color).text(),
                            user_id : 1
                        },
                        dataType: 'jsonp',
                        success: function (data) {
                            alert('削除完了!');
                            $('#'+select_color).remove();
                        },
                        error: function () {
                            alert('エラー');
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
                $('#'+select_color).css('background-color','white');
                $('#'+select_color).css('color','black');
                select_color = idArg;
                $('#'+select_color).css('background-color','#db2d20');
                $('#'+select_color).css('color','white');
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
                        <div style='font-size:14px;' class="flea_info_title text-center">{{$fleamarketInfo[$i]->flea_name}} 第{{$fleamarketInfo[$i]->th}}回</div>
                        <div style='font-size:14px;' class="flea_info_date text-left">開催日 : {{$fleamarketInfo[$i]->start_year_month}}-{{$fleamarketInfo[$i]->start_day}} &nbsp&nbsp&nbsp&nbsp&nbsp 時間: {{$fleamarketInfo[$i]->start_time}} ~ {{$fleamarketInfo[$i]->end_time}}</div>
                        <div style='font-size:14px;' class="flea_info_location text-left">地域 : {{$fleamarketInfo[$i]->location}}</div>
                    </div>
                    <div style='font-size:14px;' class="flea_explain text-center">
                        {{$fleamarketInfo[$i]->text}}
                    </div>
                </div>
            @endfor
        </div>
        <div style="margin:0 auto; width:200px; height:80px;" class="text-center">{{$fleamarketInfo->links()}}</div>
    </div>
    
    <div class="modal fade" id="group_modal">
        <div class="modal-dialog">
            <style type="text/css">
                .modal-body{
                    width:100%;
                    height:400px;
                    overflow:scroll;
                }
                .my_list{
                    border:1px solid black;
                    font-family:'interparkM','interparkMEot';
                    text-align:center;
                    border-radius:5px;
                    margin-bottom:5px;
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
                    <h4 class="modal-title text-center">グループ管理</h4>
                </div>
                
                <div class="modal-body">
                    <div class="group_list">
                        <div class="my_list new_booth text-center">
                            NEW GROUP CREATE
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button class="delete btn btn-default">削除</button>
                    <button class="ok btn btn-default">開催</button>
                </div>
            </div>
        </div>
    </div>
    <style type="text/css">
        .flea_open_remocon{
            box-shadow: 0px -3px 3px #afafaf;
            width:100%;
            height:100px;
            top:91%;
            left:0px;
            position:fixed;
            border-top:1px solid #777777;
            background-color:white;
            
        }

        #flea_list{
             margin-top:20px;
             margin-left:30px;
             float:left;
             width:88%;
             font-size:20px;
             font-family:'interparkM','interparkMEot';
        }
        #flea_list select{
            border-radius:5px;
        }
        #group_create{
            margin-top:15px;
            width:160px;
            height:40px;
            background-color:#dd0404;
            border:0px;
            border-radius:5px;
            color:white;
            font-size:20px;
            font-family:'interparkM','interparkMEot';
            box-shadow:3px 3px 2px #8e8e8e;
        }
        #flea_find{
            background-color: #dd0404;
            border-radius:5px;
            border:0px;
            color:white;
            font-size:20px;
            box-shadow:3px 3px 2px #8e8e8e;
            /*border:2px solid #dd0404;*/
        }
    </style>
    
    <div class="flea_open_remocon">
        <div id="flea_list">地域 : 
            <select>
                <option>東京</option>
            </select>
            <select>
                <option>新宿</option>
            </select>
            &nbsp&nbsp
            <button id="flea_find"> 検索 </button>
        </div>
        <button style='font-size:16px;' id="group_create"> グループ作成・開催 </button>
    </div>

@endsection