@extends('layouts.app')

@section('content')
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
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
            margin-top: 30px;
            margin-left: 0px;
            width: 100%;
            height: 60px;
            font-size: 30px;
            padding-top : 10px;
            border-bottom: 3px solid #E3E3E3;
            margin-bottom: 30px;
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
            })
        });
    </script>

    <div class="wrapper">
        <div class="flea_list_header"> 플리마켓 목록{{--<hr>--}}
        </div>

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