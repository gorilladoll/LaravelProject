{"filter":false,"title":"mileage_discount.blade.php","tooltip":"/project/resources/views/contents/mileage/mileage_discount.blade.php","undoManager":{"mark":15,"position":15,"stack":[[{"start":{"row":32,"column":25},"end":{"row":32,"column":30},"action":"remove","lines":["black"],"id":2},{"start":{"row":32,"column":25},"end":{"row":32,"column":26},"action":"insert","lines":["r"]}],[{"start":{"row":32,"column":26},"end":{"row":32,"column":27},"action":"insert","lines":["e"],"id":3}],[{"start":{"row":32,"column":27},"end":{"row":32,"column":28},"action":"insert","lines":["d"],"id":4}],[{"start":{"row":32,"column":25},"end":{"row":32,"column":28},"action":"remove","lines":["red"],"id":5},{"start":{"row":32,"column":25},"end":{"row":32,"column":26},"action":"insert","lines":["b"]}],[{"start":{"row":32,"column":26},"end":{"row":32,"column":27},"action":"insert","lines":["l"],"id":6}],[{"start":{"row":32,"column":27},"end":{"row":32,"column":28},"action":"insert","lines":["a"],"id":7}],[{"start":{"row":32,"column":28},"end":{"row":32,"column":29},"action":"insert","lines":["c"],"id":8}],[{"start":{"row":32,"column":29},"end":{"row":32,"column":30},"action":"insert","lines":["k"],"id":9}],[{"start":{"row":32,"column":25},"end":{"row":32,"column":30},"action":"remove","lines":["black"],"id":10},{"start":{"row":32,"column":25},"end":{"row":32,"column":26},"action":"insert","lines":["r"]}],[{"start":{"row":32,"column":26},"end":{"row":32,"column":27},"action":"insert","lines":["e"],"id":11}],[{"start":{"row":32,"column":27},"end":{"row":32,"column":28},"action":"insert","lines":["d"],"id":12}],[{"start":{"row":32,"column":25},"end":{"row":32,"column":28},"action":"remove","lines":["red"],"id":13},{"start":{"row":32,"column":25},"end":{"row":32,"column":26},"action":"insert","lines":["b"]}],[{"start":{"row":32,"column":26},"end":{"row":32,"column":27},"action":"insert","lines":["l"],"id":14}],[{"start":{"row":32,"column":27},"end":{"row":32,"column":28},"action":"insert","lines":["a"],"id":15}],[{"start":{"row":32,"column":28},"end":{"row":32,"column":29},"action":"insert","lines":["c"],"id":16}],[{"start":{"row":32,"column":29},"end":{"row":32,"column":30},"action":"insert","lines":["k"],"id":17}],[{"start":{"row":0,"column":0},"end":{"row":204,"column":11},"action":"remove","lines":["<script src=\"https://code.jquery.com/jquery-3.2.1.js\"></script>","<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\">","<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\"></script>","@extends('layouts.app')","","<style>","    #mileage_main{","        width:1010px;","        height:600px;","        margin:0 auto;","    }","    #mileage_category{","        width:160px;","        height:560px;","        float:left;","        margin-left:20px;","        margin-top:10px;","        padding-left:5px;","        text-align: center;","    }","","    #mileage_category_con{","        width:200px;","        height:120px;","        margin-right:0;","        float:right;","    }","","    #mileage_contents{","        width:830px;","        height:560px;","        float:left;","        border:2px solid black;","        border-left:0;","        padding-left:20px;","        padding-top:20px;","        background-color:white;","    }","","    .mileage_button{","        float:right;","        width:160px;","        height:60px;","        border:2px solid black;","        border-right:0;","        border-radius:5px 0 0 5px;","        font-size:22px;","        padding-top:15px;","        margin-bottom : -2px;","        background-color: white;","    }","","    .con_div{","        width:180px;","        height:270px;","        border:2px solid black;","        border-radius:5px;","        margin-right:20px;","        margin-bottom:10px;","        float:left;","    }","    .con_img{","        width:140px;","        height:140px;","        border:1px solid black;","        margin:0 auto;","        margin-top:10px;","        margin-bottom:5px;","    }","    .con_text{","        width:180px;","        height:36px;","        margin:0 auto;","        padding-top:5px;","        font-size:18px;","        text-align: center;","    }","    #price{","        width:120px;","        margin:0 auto;","        height:30px;","        font-size:18px;","        text-align: center;","    }","","    .con_button{","        width:100px;","        height:35px;","        border-radius: 5px;","        margin:0 auto;","        font-size:18px;","        text-align: center;","        padding-top:7px;","        background-color:indianred;","        color:white;","    }","","    #my_mileage{","        width:1010px;","        height:40px;","        text-align: right;","        margin:0 auto;","    }","    .point{","        width:100px;","        height:50px;","        float:right;","        padding:5px;","        font-weight: bold;","    }","    .point > p{","        margin:0;","        padding:0;","    }","","    #test{","        margin-right:0;","        margin-top:-2px;","        float:right;","        width:200px;","        height:442px;","        border-right:2px solid black;","    }","    #m_title{","        height:50px;","    }","</style>","","<script>","    $(document).ready(function(){","        //쿠폰 리스트 만들어주기","","        //리스트 정보를 담고있는 배열","        var button_name = new Array('500원 에누리','1000원 에누리');","        var button_price = new Array(500,1000);","","        //버튼 색상 변경","        $('#seller_btn').css('background-color','white');","","        for(var i=0;i<button_name.length;i++){","            var button = \"<div class='con_div'><div class='con_img'><img src='{{asset('/img/icon/')}}/s_\"+(i+1)+\".jpg' style='width:100%;height:100%;'></div>\" +","                \"<div class='con_text'>\"+button_name[i]+\"</div><div id='price'>\"+button_price[i]+\"</div><div id='btn_\"+i+\"' class='con_button'>구매하기</div></div>\";","            $('#mileage_contents').append(button);","            $('#btn_'+i).click(function(){","                if(confirm($(this).prev().prev().text()+\"를 구매하시겠습니까?\")){","                    $.ajax({","                        type:'POST',","                        url:'/mileage/buy',","                        data: {","                            text:$(this).prev().prev().text(),","                            price:$(this).prev().text(),","                            buyer:'buyer'","                        },","                        dataType : 'jsonp',","                        success : function(result){","                            if(result['error']) {","                                alert(result['error']);","                                return;","                            }","                            alert('구매 완료!');","                            $('#b_point').text(result['calc']);","                        },","                        error : function(){","                            alert('에러가 발생하였습니다');","                        }","                    })","                }","            })","        }","","        $('#seller_btn').click(function(){","            window.location.href = '/mileage/mileageshop';","        })","    })","</script>","","","@section('content')","    <div id=\"m_title\">","","    </div>","    <div id=\"my_mileage\">","        <div class=\"point\" style=\"background-color:lightgoldenrodyellow;\"><p>구매자 포인트</p><p id=\"b_point\">{{$user_info[0]->b_mileage}}</p></div>","        <div class=\"point\" style=\"background-color:lightcyan;\"><p>판매자 포인트</p><p id=\"s_point\">{{$user_info[0]->s_mileage}}</p></div>","    </div>","    <div id=\"mileage_main\">","        <div id=\"mileage_category\">","            <div id=\"mileage_category_con\">","                <div class=\"mileage_button\" id=\"seller_btn\" style=\"border-right:2px solid black;\">","                    판매자 홍보","                </div>","                <div class=\"mileage_button\" id=\"buyer_btn\">","                    할인 쿠폰","                </div>","            </div>","            <div id=\"test\"></div>","        </div>","","        <div id=\"mileage_contents\">","","        </div>","","    </div>","","@endsection"],"id":19}]]},"ace":{"folds":[],"scrolltop":958,"scrollleft":0,"selection":{"start":{"row":79,"column":22},"end":{"row":79,"column":22},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":10,"state":"css-start","mode":"ace/mode/php"}},"timestamp":1503132776425,"hash":"00f057c9fee4131abd6e54d2263867299f6f8e1a"}