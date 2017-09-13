<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@extends('layouts.app')

<style>
    #mileage_main{
        width:1010px;
        height:600px;
        margin:0 auto;
    }
    #mileage_category{
        width:160px;
        height:560px;
        float:left;
        margin-left:20px;
        margin-top:10px;
        padding-left:5px;
        text-align: center;
    }

    #mileage_category_con{
        width:200px;
        height:120px;
        margin-right:0;
        float:right;
    }

    #mileage_contents{
        width:830px;
        height:560px;
        float:left;
        border:2px solid black;
        border-left:0;
        padding-left:20px;
        padding-top:20px;
        background-color:white;
    }

    .mileage_button{
        float:right;
        width:160px;
        height:60px;
        border:2px solid black;
        border-right:0;
        border-radius:5px 0 0 5px;
        font-size:22px;
        padding-top:15px;
        margin-bottom : -2px;
        background-color: white;
    }

    .con_div{
        width:180px;
        height:270px;
        border:2px solid black;
        border-radius:5px;
        margin-right:20px;
        margin-bottom:10px;
        float:left;
    }
    .con_img{
        width:140px;
        height:140px;
        border:1px solid black;
        margin:0 auto;
        margin-top:10px;
        margin-bottom:5px;
    }
    .con_text{
        width:140px;
        height:36px;
        margin:0 auto;
        font-size:24px;
        text-align: center;
    }
    #price{
        width:120px;
        margin:0 auto;
        height:30px;
        font-size:18px;
        text-align: center;
    }

    .con_button{
        width:100px;
        height:35px;
        border-radius: 5px;
        margin:0 auto;
        font-size:18px;
        text-align: center;
        padding-top:7px;
        background-color:indianred;
        color:white;
    }

    #my_mileage{
        width:1010px;
        height:40px;
        text-align: right;
        margin:0 auto;
    }
    .point{
        width:100px;
        height:50px;
        float:right;
        padding:5px;
        font-weight: bold;
    }
    .point > p{
        margin:0;
        padding:0;
    }

    #test{
        margin-right:0;
        margin-top:-2px;
        float:right;
        width:200px;
        height:442px;
        border-right:2px solid black;
    }
    #m_title{
        height:50px;
    }
</style>

<script>
    $(document).ready(function(){
        //쿠폰 리스트 만들어주기

        //리스트 정보를 담고있는 배열
        var button_name = new Array('メイン広告','通知広告','選択広告','広告優先権');
        var button_price = new Array(1000,1200,500,2000);

        //버튼 색상 변경
        $('#seller_btn').css('background-color','white');

        for(var i=0;i<button_name.length;i++){
            var button = "<div class='con_div'><div class='con_img'><img src='{{asset('/img/icon/')}}/m_"+(i+1)+".jpg' style='width:100%;height:100%;'></div>" +
                "<div class='con_text'>"+button_name[i]+"</div><div id='price'>"+button_price[i]+"</div><div id='btn_"+i+"' class='con_button'>購入</div></div>";
            $('#mileage_contents').append(button);
            $('#btn_'+i).click(function(){
                if(confirm($(this).prev().prev().text()+"を購入しますか？")){
                    $.ajax({
                        type:'POST',
                        url:'/mileage/buy',
                        data: {
                            text:$(this).prev().prev().text(),
                            price:$(this).prev().text(),
                            buyer:'seller'
                        },
                        dataType : 'jsonp',
                        success : function(result){
                            if(result['error']) {
                                alert(result['error']);
                                return;
                            }
                            alert('購入完了!');
                            $('#s_point').text(result['calc']);
                        },
                        error : function(){
                            alert('エラーが発生しました。');
                        }
                    })
                }
            })
        }

        $('#buyer_btn').click(function(){
            window.location.href = '/mileage/mileagebuyer';
        })
    })
</script>

@section('content')
    <div id="m_title">

    </div>
    <div id="my_mileage">
        <div class="point" style="background-color:lightgoldenrodyellow;"><p>購入ポイント</p><p id="b_point">{{$user_info[0]->b_mileage}}</p></div>
        <div class="point" style="background-color:lightcyan;"><p>出店ポイント</p><p id="s_point">{{$user_info[0]->s_mileage}}</p></div>
    </div>
    <div id="mileage_main">
        <div id="mileage_category">
            <div id="mileage_category_con">
                <div class="mileage_button" id="seller_btn">
                    出店者広告
                </div>
                <div class="mileage_button" id="buyer_btn" style="border-right:2px solid black;">
                    割引券
                </div>
            </div>
            <div id="test"></div>
        </div>

        <div id="mileage_contents">

        </div>

    </div>

@endsection