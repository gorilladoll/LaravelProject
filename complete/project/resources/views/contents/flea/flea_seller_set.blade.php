@extends('layouts.app')

@section('title', '판매자배치')
@section('content')
<head>
    <meta charset="UTF-8">
    <title>판매자 배치</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>-->
    <style>

        li{
            list-style:none;
        }
        .wrap{
            margin:auto;
            width:1300px;
            height:1000px;
            margin-top:150px;
            /*border:1px solid black;*/
            font-family:'interparkM','interparkMEot';
        }
        .s_List{
            border : 2px solid #969696;
            border-radius:5px;
            width:250px;
            height:600px;
            float:left;
            background-color:white;
            box-shadow:5px 5px 10px #848484;
        }
        .s_set{
            margin-left:20px;
            border : 2px solid #969696;
            border-radius:5px;
            width:800px;
            height:600px;
            float:left;
            background-color:white;
            box-shadow:5px 5px 10px #848484;
        }
        .goods{
            border : 2px solid #969696;
            border-radius:5px;
            width:670px;
            height:250px;
            float:left;
            margin-top: 30px;
            background-color:white;
            box-shadow:5px 5px 10px #848484;
        }
        .s_info{
            border : 2px solid #969696;
            border-radius:5px;
            width:370px;
            height:250px;
            float:left;
            margin-left: 30px;
            margin-top: 30px;
            background-color:white;
            box-shadow:5px 5px 10px #848484;
        }
        .terms_wrap{
            margin-top:5px;
            margin-bottom: 5px;
            padding-bottom: 10px;
            border-bottom:2px solid #969696;
            border-radius:4px;
        }
        .terms1_wrap{
            width:100%;
         }
        #terms1{
            float:left;
        }
        .terms2_wrap{
            width:100%;
        }
        .seller_list{
            width:100%;
            height:445px;
            margin-top:20px;
            /*border-top : 2px solid #757575;*/
            border-radius:0 0 5px 5px;
            padding-top:5px;
        }
        .set_booth{
            width:98px;
            height:98px;
            border : 1px solid #757575;
            border-radius:5px;
            position:absolute;
            font-size:14px;
        }
        .set_booth_not{
            width:98px;
            height:98px;
            border: 1px solid #757575;
            border-radius:5px;
            position:absolute;
            text-align: center;
            font-size:14px;
        }
        .set_booth > p {
            margin:0;
            text-align: center;
            font-size:12px;
        }
        .sellers{
            margin:1px 1px;
            width:98%;
            height:30px;
            border: 1px solid #757575;
            border-radius:5px;
        }
        .sellers > p{
            text-align: center;
            margin:0 auto;
            padding:5px 0 0 0;
        }
        .goods_view{
            margin-top:20px;
            padding-left:10px;
        }
        .goods_view_center{
            width: 520px;
            height:130px;
            /*border: 1px solid #cc0a2d;*/
            border-radius:5px;
            margin-top : 0;
            float:left;
            overflow: hidden;
        }
        .goods_view_left{
            margin: 0 6px;
            width: 50px;
            height:130px;
            /*border: 1px solid #cc0a2d;*/
            border-radius:5px;
            float:left;
        }
        .goods_view_right{
            margin: 0 6px;
            width: 50px;
            height:130px;
            /*border: 1px solid #cc0a2d;*/
            border-radius:5px;
            float:left;
        }
        .goods_view_goods{
            width:121px;
            height:115px;
            margin:4px;
            /*border: 1px solid #cc0a2d;*/
            border-radius:5px;
            float:left;
            font-size:15px;
        }
        .goods_view_goods img{
            box-shadow:3px 3px 7px #848484;
            margin-bottom:100px;
            border-radius:3px;
        }
        
        .s_info_info{
            width:100px;
            height:30px;
            border-top:1px solid #969696;
            border-left:1px solid #969696;
            border-right:1px solid #969696;
            border-radius:5px 0 0 0;
            float:left;
            margin : 0;
            margin-top:10px;
            margin-left:12px;
            text-align: center;
            font-size:18px;
        }
        .s_info_survey{
            width:100px;
            height:30px;
            border-top:1px solid #969696;
            border-right:1px solid #969696;
            border-radius:0 5px 0 0;
            float:left;
            margin : 0;
            margin-top:10px;
            text-align: center;
            font-size:20px;
        }
        .s_info_content{
            width:100%;
            height:207px;
            border-top: 2px solid #969696;
            /*border-radius:0 5px 5px 5px;*/
            float:left;
            margin : 0;
            /*margin-left:12px;*/
        }
        .terms1_wrap{
            margin:4px;
            margin-top:10px;
            width:97%;
        }
        .terms2_wrap{
            margin:4px;
            width:97%;
        }
        
        #terms1{
            margin-left:10px;
            font-size:22px;
            height:30px;
            width:154px;
        }
        #terms2{
            margin-left:10px;
            font-size:22px;
            height:30px;
            width:150px;
            display:inline-block;
        }
        
        #terms1_1{
            display:inline-block;
            margin-right:25px;
        }
        #terms1_2{
            display:inline-block;
            margin-right:25px;
        }
        #terms1_3{
            display:inline-block;
        }
        .terms1_add_survey{
            width : 96%;
            margin-right : 10px;
            float:left;
            display: block;
            margin-bottom : 10px;
        }
        .terms1_add_text{
            display: inline-block;
            float:right;
            width:100px;
        }
        #terms1_body2{
            height:250px;
        }
        .terms_close{
            display:inline-block;
            margin-right:25px;
        }
        .info_css{
            list-style: none;
            font-size:20px;
        }
        .info_css_parent{
            padding:0;
            margin:10px 0px;
        }
        
        .survey_preview{
            width:90%; height:80px;
            margin-top:20px;
        }
        .survey_q_preview{
            width:99%; height:30px; line-height:30px;
        }
        .survey_e_preview{
            border-top:1px solid #c9c9c9;
            width:99%; 
            height:30px;
            line-height:30px;
        }
        .survey_e_preview:last-child{
            border-bottom:1px solid #c9c9c9;
        }
        .survey_e_preview:nth-child(even){
            background-color:#fcefef;
        }
        #terms2_body{
            width:98%; 
            height:auto; 
            min-height: 200px; 
            overflow: auto; 
            border-bottom:1px solid #dbdbdb;
        }
        
        #terms2_body2{
            width:98%;
            height:auto; 
            min-height: 400px; 
            overflow: auto; 
        }
        
        .added_quastions{
            width:100%; 
            height:40px; 
            line-height:40px; 
            font-size:15px; 
            margin-top:15px;
        }
        .added_q_content_1{
            margin-left:0px;
            width:72%; 
            height:100%; 
            border-bottom:1px dotted black; 
            float:left;
        }
        .added_q_content_2{
            margin-left:0px;
            width:27%; 
            height:100%; 
            border:1px solid #9e9e9e; 
            border-radius:5px; 
            float:left;   
        }
        #finish, #areaCreate, #auto_allocate{
            border : 2px solid #969696;
            border-radius:5px;
            margin-left: 20px; 
            width:120px; 
            height:70px; 
            font-weight: bold;
            box-shadow:5px 5px 10px #848484;
        } 

    </style>

    <script>
        $(document).ready(function(){

            var seller_select;        // 판매자 ID값 저장
            var seller_name;          // 판매자 이름 저장
            var boothArr = Array();   //부스 정보를 담을 배열
            var sListArray = Array(); //샐러 리스트
            var count = 1;            //부스의 번호를 매기기 위한 카운트
            var seller_color = null;  //판매자 리스트의 판매자명에 컬러 선택을 위한 변수
            var terms1Arr = Array();  //샐러 조건1 을 저장하기 위한 배열

            var table_left = Number($('.s_set').offset().left);
            var table_top = Number($('.s_set').offset().top);

            $('#areaCreate').click(function(){
                window.location.href="/booth/areaSet/{{$booth_name}}/th/{{$th_id}}";
            });


            //신청자 명단을 배열에 넣음
            @foreach ($sellers as $seller)
            var sellerId     =  {{$seller->id}};
            var sellerName   = '{{$seller->name}}';

            var location     = '{{$seller->attention_location}}';
            var phone        = '{{$seller->phone}}';
            var age          =  {{$seller->age}};
            var booth_name   = '{{$seller->booth_name}}';
            var category     = '{{$seller->category}}';

            function sellerInfo(){
                this.seller_id = sellerId;    //판매자 ID값
                this.seller_name = sellerName;//판매자 이름
                this.seller_in_booth = false; //판매자가 부스에 있는지 확인. 부스에 있는 판매자는 리스트에 생성하지 않는다.
                this.in_list = false;         //판매자가 리스트에 있는지 확인 중복으로 판매자 리스트를 생성하는 것을 방지
                this.terms1 = true;          //조건1에 만족하는가
                this.terms2 = true;          //조건2에 만족하는가

                this.locationInfo = location;
                this.phoneInfo = phone;
                this.ageInfo = age;
                this.booth_nameInfo = booth_name;
                this.categoryInfo = category;

                this.getId = function(){
                    return this.seller_id;
                }
                this.getSeller = function(){
                    return this.seller_name;
                }
                this.setInbooth = function(boolean){
                    this.seller_in_booth = boolean;
                }
                this.getInbooth = function(){
                    return this.seller_in_booth;
                }
                this.setInlist = function(boolean){
                    this.in_list = boolean;
                }
                this.getInlist = function(){
                    return this.in_list;
                }

                this.setTerms1 = function(boolean){
                    this.terms1 = boolean;
                }
                this.getTerms1 = function(){
                    return this.terms1;
                }
                this.setTerms2 = function(boolean){
                    this.terms2 = boolean;
                }
                this.getTerms2 = function(){
                    return this.terms2;
                }
            }
            var seller_list_info = new sellerInfo();
            sListArray.push(seller_list_info);

            @endforeach

            function set_sellerList(){ //판매자 신청한 판매자 리스트 불러오기
                $('.sellers').remove(); //샐러 리스트를 초기화
                for(var i = 0,leng = boothArr.length; i<leng; i++){
                    for(var j=0,list_leng = sListArray.length; j<list_leng; j++){
                        //if(boothArr[i].getSeller() == sListArray[j].getId()){ //부스에 배치된 판매자라면 리스트에 생성하지 않고 넘어감
                        if(sListArray[j].getInbooth() == true){ //부스에 배치된 판매자라면 리스트에 생성하지 않고 넘어감
                            continue;
                        }
                        if(sListArray[j].getTerms1() === false){ //조건 1에 해당 안되면 넘어감
                            continue;
                        }
                        if(sListArray[j].getInlist() == true) //판매자 리스트안에 이미 판매자가 존재하면 리스트에 생성하지 않고 넘어감
                            continue;
                        seller_make(sListArray[j].getId(), sListArray[j].getSeller());
                        sListArray[j].setInlist(true);
                        //sListArray[j].setInbooth(true);
                        //판매자를 생성해주고 재생성 방지
                    }
                }
                //생성이 끝나고 리스트에 있는지 확인하는 구문을 false로 초기화 하여 ���음 생성을 준비
                for(var o=0,list_leng = sListArray.length;o<list_leng;o++){
                    sListArray[o].setInlist(false);
                }
            }

            id_num=0;
            //리스트에 셀러를 생성해주는 함수
            function seller_make(id,name){
                var seller = "<div class='sellers' id='seller_"+id+"'><p>"+name+"</p><div></div></div>";
                $(".seller_list").append(seller);
                $('.sellers').draggable({revert: true,
                    start:function(){
                        seller_select = $(this).attr('id');
                        seller_name = $(this).text();
                        // 드래그 시작시 seller id값, 부스 이름값 저장
                    }
                });

                // 아이디값 가져와서 컬러선택
                $('.sellers').click(function(){
                    //리스트의 컬러 변경
                    if (seller_color != $(this).attr('id')) { //중복 데이터 로딩 방지
                        goods_view = 0;  // 상품 정보의 스크롤 위치값을 초기화 해줌

                        // 색상이 변경된 이전의 판매자를 흰색으로 변경하고 현재 클릭된 판매자의 색상 변경
                        $('#' + seller_color).css('background-color', 'white');
                        seller_color = $(this).attr('id');
                        $(this).css('background-color', 'lightgreen');

                        //상품 정보 가져오기
                        $('.goods_view_goods').remove(); //기존의 상품정보 삭제

                        id_num = seller_color.split('_');
                        id_num = Number(id_num[1]);

                        $('.goods_view_center').scrollTop(0); // 상품정보 스크롤 최상단으로 이동
                        @foreach($goods as $good)
                        if({{$good->user_id}} == id_num){
                            var goods = "<div class='goods_view_goods'><img style='width:90%;height:80%;margin:5px 5px 0 5px' src='{{asset('storage/image/'.$good->filename)}}'><p style='margin-top:10px; text-align:center;'>{{$good->name}}</p></div>";
                            $('.goods_view_center').append(goods);
                        }
                        @endforeach

                        //개��� 정보
                        s_info_info();
                    }
                });
            }

            //판매자를 제외 했을 때 부스의 판매자 내용을 초기화
            function delete_booth_seller(num){
                num = num.split('_');
                num = Number(num[1]);
                for(var i=0; i< boothArr.length; i++){
                    if(num == boothArr[i].getId()){ //삭제 처리된 ID와 같은 ID일 경우
                        for(var j=0; j<sListArray.length; j++){
                            if (boothArr[i].getSeller() == sListArray[j].getId()){ //판매자 배열에서도 부스안에 있지 않다고 알려줘야 함.
                                sListArray[j].setInbooth(false);
                            }
                        }
                        boothArr[i].setSeller('null'); //판매자의 부스 제외 처리가 완료되면 해당 부스의 내용값도 바꿈
                    }
                }
            }

            //배치된 판매자가 부스에서 삭제됬을 경우 부스안인지 확인하는 값을 false로
            function in_seller(num){
                for(var j=0,list_leng = sListArray.length;j<list_leng;j++) {
                    if(num == sListArray[j].getId()){
                        sListArray[j].setInlist(false);
                    }
                }
            }


            // 저장된 부스를 불러와서 배치
            @foreach ($booths as $booth)
                var boothId       = {{$booth->id}};
                var boothSeller   = '{{$booth->user_id}}';
                var boothType     = '{{$booth->type}}';   // 부스 타입이 일반 부스인지, 지형, 장애물인지 판별하기 위한 변수
                var boothValue    = '{{$booth->value}}';  // 부스에 이름이 지정되어 있을 경우 가져옴
                var boothCategory = '{{$booth->category}}';
                if(boothSeller == ''){
                    boothSeller   = 'NULL';
                }
                var username      = '';

                function seller_booth(){
                    this.id = boothId;
                    this.seller = 'null';
                    this.category = boothCategory;
                    if(boothSeller != 'NULL'){
                        this.seller = boothSeller;
                        for(var i=0;i<sListArray.length;i++){
                            if(this.seller == sListArray[i].getId()){
                                sListArray[i].setInbooth(true);
                                username = sListArray[i].getSeller();
                            }
                        }
                    }
                    this.type = boothType;
                    this.value = boothValue;

                    this.getId = function(){
                        return this.id;
                    }
                    this.setSeller = function(seller){
                        this.seller = seller;
                    }
                    this.getSeller = function(){
                        return this.seller;
                    }
                }
                var sellerInfo = new seller_booth();
                boothArr.push(sellerInfo);
               

                // 부스에 판매자가 배치되어 있는지, 타입에 따라 이름 생성
                if(boothSeller != 'NULL'){ // 일반 부스이며 판매자가 배치된 경우
                    var booth = "<div class='set_booth' id='content_{{$booth->id}}' value="+count+"><img src='{{asset('/img/icon/')}}/test.png' style='width:100%;height:80%; border-radius: 5px;'><p id='text_{{$booth->id}}' class='seller_name'>"+username+"</p></div>";
                    count++;
                } else if(boothType == 'null') { // 일반 부스지만 판매자가 없는 경우
                    var booth = "<div class='set_booth' id='content_{{$booth->id}}' value="+count+"><img src='{{asset('/img/icon/')}}/test.png' style='width:100%;height:80%; border-radius: 5px;'><p id='text_{{$booth->id}}' class='seller_name'>"+(count++)+"</p></div>";
                } else if(boothType == '木'){  // 지형
                    var booth = "<div class='set_booth_not' id='content_{{$booth->id}}' value="+count+"><img src='{{asset('/img/icon/')}}/j2.jpg' style='width:100%;height:76%; border-radius: 5px;'><p id='text_{{$booth->id}}' class='seller_name'>"+'{{$booth->value}}'+"</p></div>";
                } else if(boothType == 'トイレ'){  // 화장실
                    var booth = "<div class='set_booth_not' id='content_{{$booth->id}}' value="+count+"><img src='{{asset('/img/icon/')}}/j3.jpg' style='width:100%;height:76%; border-radius: 5px;'><p id='text_{{$booth->id}}' class='seller_name'>"+'{{$booth->value}}'+"</p></div>";
                } else if(boothType == '障害物'){  // 장애물
                    var booth = "<div class='set_booth_not' id='content_{{$booth->id}}' value="+count+"><img src='{{asset('/img/icon/')}}/j1.png' style='width:100%;height:76%; border-radius: 5px;'><p id='text_{{$booth->id}}' class='seller_name'>"+'{{$booth->value}}'+"</p></div>";
                } else if(boothType == '入り口'){  // 입구
                    var booth = "<div class='set_booth_not' id='content_{{$booth->id}}' value="+count+"><img src='{{asset('/img/icon/')}}/ipgu.png' style='width:100%;height:76%; border-radius: 5px;'><p id='text_{{$booth->id}}' class='seller_name'>"+'{{$booth->value}}'+"</p></div>";
                }
                $(".s_set").append(booth);

                // 불러온 부스들의 크기값을 설정
                var booth_top = {{$booth->top}}+table_top;
                var booth_left = {{$booth->left}}+table_left;

                var style = "top:"+booth_top+"px;left:"+booth_left+"px;";
                style += "width:"+{{$booth->width}}+"px;height:"+{{$booth->height}}+"px";
                $("#content_{{$booth->id}}").attr('style',style);

                // 불러온 부스가 입구나 지형일 경우 각 색상 변경
                if (boothType == '入り口'){
                    $("#content_{{$booth->id}}").css('background-color','lightyellow');
                } else if(boothType == '障害物'){
                    $("#content_{{$booth->id}}").css('background-color','lightblue');
                }

                // 만들어진 부스들에 droppable 속성 부여
                $( ".set_booth" ).droppable({
                    accept: ".sellers",
                    drop: function() {
                        // 셀러 이름이 들어오면 부스에 넣고 해당 셀러 삭제
                        var userid = seller_select.split('_');
                        userid = Number(userid[1]);

                        var boothNum = $(this).attr('id');
                        boothNum = boothNum.split('_');
                        boothNum = Number(boothNum[1]);

                        for(var i = 0,leng = boothArr.length; i<leng;i++){
                            if(boothArr[i].getId() == boothNum){
                                if(boothArr[i].seller != 'null'){ // 부스 배열에 이미 판매자가 있는지 판별
                                    alert('이미 판매자가 배치 되어 있습니다.');
                                    return;
                                }
                                boothArr[i].setSeller(userid);
                                for(var j=0;j<sListArray.length;j++){
                                    if (userid == sListArray[j].getId()){
                                        sListArray[j].setInbooth(true);
                                    }
                                }
                            }
                        }

                        // 판매자가 현재 부스에 배치되면 판매자 이름으로 부스 이름 변경
                        $('#text_'+boothNum).text(seller_name);
                        $('#text_'+boothNum).attr("value",userid);
                        $('#text_'+boothNum).draggable({
                            revert: true,
                            start:function(){
                                seller_select = $(this).attr('id');
                                booth_num = $(this).parent(); //이동시 부모의 값을 미리 저장
                                booth_id = boothNum;
                            }
                        });
                        $("#"+seller_select).remove();
                    }
                });

            @endforeach

            //판매자 삭제 구문
            $(".seller_list").droppable({
                accept: ".seller_name",
                drop:function(){
                    //배치된 판매자 삭제하고 다시 리스트로 이동
                    in_seller($('#'+seller_select).attr("value"));
                    $('#'+seller_select).remove();

                    var booth = "<p id='text_"+booth_id+"' class='seller_name'></p></div>"; //부스 번호 입력
                    $(booth_num).append(booth);
                    $('#text_'+booth_id).text($('#text_'+booth_id).parent().attr('value'));

                    delete_booth_seller($('#text_'+booth_id).parent().attr('id')); // 샐러 배열에서 해당 샐러가 부스에 있는지 없는지 판별하는것을 false로
                    set_sellerList(); // 부스에서 판매자 삭제 후 리스트 갱신
                }
            });

            // 리스트 한번 불러와줌 ㅎ
            set_sellerList();



            // 배치된 부스 선택시 작동
            $(".set_booth").click(function(){
                var boothNum = $(this).attr('id');
                boothNum = boothNum.split('_');
                boothNum = Number(boothNum[1]);

                for(var i = 0,leng = boothArr.length; i<leng;i++){
                    if(boothArr[i].getId() == boothNum){ // 해당 부스에 판매자가 배치되어 있으면 아무 행동 안함
                        if(boothArr[i].seller == 'null'){
                            return;
                        }
                        // 배치된 판매자 삭제 구문
                        if(confirm("이미 판매자가 배치되어 있습니다. 제거하시겠습니까?")){
                            for(var j=0; j<boothArr.length;j++){
                                if(boothNum == boothArr[j].getId()){
                                    var id_num = $(this).attr('value');
                                    $(this).children().text(id_num);    // 기존의 부스 ID로 이름 바꿔주고
                                    in_seller(boothArr[i].getSeller()); // 들어있던 샐러 부스에 존재하는지 판별여부 바꿔주고
                                    delete_booth_seller($(this).attr('id')); // 부스에서 샐러 지워주고
                                    set_sellerList();                        // 리스트 갱신함
                                }
                                // console.log(boothArr[j].seller);
                                // console.log(typeof(boothArr[i].seller));
                            }
                        }
                    }
                }
            });

            // 조건1 초기화
            $("#terms_reset").click(function(){
                if(confirm("조건을 초기화 하시겠습니까?")){
                    terms_init(); // 조건 1 초기화
                    set_sellerList();
                    $('.s_info_content').text('');
                    $('.s_info_survey').css('background-color', 'white');
                    $('.s_info_info').css('background-color', 'white');
                }
            });

            // 판매자들의 조건1 초기화
            function terms_init(){
                for(var i=0;i<sListArray.length;i++){
                    sListArray[i].setTerms1(true);
                }
            }


            // 상품정보에서 페이징 역할
            // 오버플로우를 hidden으로 해서 스크롤만 내리는 방식으로 페이징
            var goods_view = 0;
            var goods_view_max = 0;
            $(".goods_view_right").click(function(){
                goods_view_max = $('.goods_view_center').prop('scrollHeight')-129;
                if(goods_view < goods_view_max) {
                    goods_view = Number(goods_view + 129);
                    $('.goods_view_center').scrollTop(goods_view);
                }
            });
            $(".goods_view_left").click(function(){
                goods_view_max = $('.goods_view_center').prop('scrollHeight')-129;
                if(goods_view > 0) {
                    goods_view = goods_view - 129;
                    $('.goods_view_center').scrollTop(goods_view);
                }
            });

            // 정보보기 클릭시 정보창 보여주기
            $('.s_info_info').click(function () {
                s_info_info();
            });

            // 설문보기 클릭시 설문창 보여주기
            $('.s_info_survey').click(function(){
                s_info_survey();
            });

            function s_info_info() {
                $('.s_info_info').css('background-color', 'lightyellow');
                $('.s_info_survey').css('background-color', 'white');
                $('.s_info_content').text('');

                for(var i=0;i<sListArray.length;i++){
                    if(id_num == sListArray[i].getId()){
                        var infoText = "<ul class='info_css_parent'><li class='info_css'>ブース名 : "+sListArray[i].booth_nameInfo+"</li>";
                        infoText += "<li class='info_css'>連絡先 : "+sListArray[i].phoneInfo+"</li>";
                        infoText += "<li class='info_css'>テーマ : "+sListArray[i].categoryInfo+"</li>";
                        infoText += "<li class='info_css'>年齢 : "+sListArray[i].ageInfo+"</li>";
                        infoText += "<li class='info_css'>地域 : "+sListArray[i].locationInfo+"</li>";
                    }
                }
                $('.s_info_content').append(infoText);

            }

            function s_info_survey(){
                $('.s_info_survey').css('background-color','lightyellow');
                $('.s_info_info').css('background-color','white');
                $('.s_info_content').text('アンケート');
            }

            //조건 처리
            function modal1_add(){
                var terms1 = "<div class='terms1_add_survey' id='terms1_add_"+modal_count+"'>";
                terms1 += "<p class='terms_close' id='terms_close_"+modal_count+"'>X</p>";
                terms1 += $('#terms1_2').val();
                terms1 += "<input type='text' class='terms1_add_text' id='terms1_add_text_"+modal_count+"'>";
                terms1 += "</div>";
                $('#terms1_body2').append(terms1);
                modal_count++;

                var test = $('#terms1_2').val()
                function terms(){
                    this.terms = test;
                    this.answerNum = "terms1_add_text_"+(modal_count-1);
                    this.idNum = "terms1_add_"+(modal_count-1);
                    this.answer = "";

                    this.getId = function(){
                        return this.idNum;
                    }
                    this.setAnswer = function(ans){
                        this.answer = ans;
                    }
                    this.getAnswer = function(){
                        return this.answer;
                    }
                    this.getAnsnum = function(){
                        return this.answerNum;
                    }
                    this.getAnsnum = function(){
                        return this.answerNum;
                    }
                }

                var termsArr = new terms();
                terms1Arr.push(termsArr);

                $('.terms_close').click(function(){
                    var close_id = $(this).attr('id');
                    close_id = close_id.split('_');
                    close_id = Number(close_id[2]);

                    var test = 'terms1_add_'+close_id;

                    for(var i=0;i<terms1Arr.length;i++){
                        if(terms1Arr[i].getId() == test){
                            terms1Arr.splice(i,1);
                        }
                    }
                    $('#terms1_add_'+close_id).remove();
                });
            }

            // 적용분류 모달
            $('#terms1_modal_save').click(function(){
                $('#terms1_modal').modal('hide');
                for(var i=0;i<terms1Arr.length;i++){
                    terms1Arr[i].setAnswer($('#'+terms1Arr[i].getAnsnum()).val());
                }
            });

            $('#terms2_modal_save').click(function(){
                $('#terms2_modal').modal('hide');
            });

            //1차조건 버튼 클릭
            // terms1Arr 1차 조건 관리 배열
            $('#terms1').click(function(){
                $('#terms1_modal').modal('show');
            });

            //1차조건 추가
            $('#terms1_3').click(function(){
                if(terms1Arr.length > 4){
                    alert("条件は五つまでできます!");
                    return;
                }
                modal1_add();
            });
            modal_count = 1;

            // 조건 적용
            $('#terms1_btn').click(function(){
                if(terms1Arr.length == 0){
                    terms_init();
                } else {
                    // 조건의 수만큼 for문을 돌려 조건에 해당되는 유저만 terms1 값을 true로 주어 구분
                    for (var i = 0; i < terms1Arr.length; i++) {
                        @foreach($termes as $terms)

                            switch (terms1Arr[i].terms) {
                            case "テーマ":
                                for (var j = 0; j < sListArray.length; j++) {
                                    if ({{$terms->id}} == sListArray[j].getId()
                                )
                                    {
                                        if ('{{$terms->category}}' == terms1Arr[i].getAnswer()) {
                                            sListArray[j].setTerms1(true);
                                        } else {
                                            sListArray[j].setTerms1(false);
                                        }
                                    }
                                }
                                break;
                            case "参加回数":
                                for (var j = 0; j < sListArray.length; j++) {
                                    if ({{$terms->id}} == sListArray[j].getId()
                                )
                                    {
                                        if ('{{$terms->join_count}}' >= terms1Arr[i].getAnswer()) {
                                            sListArray[j].setTerms1(true);
                                        } else {
                                            sListArray[j].setTerms1(false);
                                        }
                                    }
                                }
                                break;
                            case "年齢":
                                for (var j = 0; j < sListArray.length; j++) {
                                    if ({{$terms->id}} == sListArray[j].getId()
                                )
                                    {
                                        if ('{{$terms->age}}' >= terms1Arr[i].getAnswer()) {
                                            sListArray[j].setTerms1(true);
                                        } else {
                                            sListArray[j].setTerms1(false);
                                        }
                                    }
                                }
                                break;
                            case "最高販売金額":
                                for (var j = 0; j < sListArray.length; j++) {
                                    if ({{$terms->id}} == sListArray[j].getId()
                                )
                                    {
                                        if ('{{$terms->max_sellpoint}}' >= terms1Arr[i].getAnswer()) {
                                            sListArray[j].setTerms1(true);
                                        } else {
                                            sListArray[j].setTerms1(false);
                                        }
                                    }
                                }
                                break;
                            case "最低販売金額":
                                for (var j = 0; j < sListArray.length; j++) {
                                    if ({{$terms->id}} == sListArray[j].getId()
                                )
                                    {
                                        if ('{{$terms->min_sellpoint}}' >= terms1Arr[i].getAnswer()) {
                                            sListArray[j].setTerms1(true);
                                        } else {
                                            sListArray[j].setTerms1(false);
                                        }
                                    }
                                }
                                break;
                        }
                        @endforeach
                    }
                }
                set_sellerList();
            });


            // 완성 버튼 누를시 저장
            $(document.body).on('click','#finish',function(){
                $.ajax({/*서버에 값 전달*/
                    url : '/booth/sellersave',
                    data: {
                        boothArr : boothArr,
                        user_mail : '{{$mail}}',
                        booth_name : '{{$booth_name}}',
                        th_id : {{$th_id}}
                    },
                    dataType : 'jsonp',
                    success : function(data){
                        // console.log(data);
                        // alert(data);
                        alert("出店者配置完了");
                        window.location.href = "/fleamarket/flea_page/2";
                    },
                    error : function(){
                        console.log(boothArr);
                        alert('エラー.');
                    }
                });
            });
            
            // 판매자 자동배치
            $('#auto_allocate').click(function() {
                // alert("{{$booths[0]->category}}");
                // alert("{{$sellers[0]->category}}");
                
                for(var i = 0, length1 = boothArr.length; i < length1; i++){
                    // console.log(boothArr[i]);
                   @for($j = 0, $length2 = count($sellers); $j < $length2; $j++)
                        // alert(sListArray[{{$j}}].getInbooth());   
                        if(boothArr[i].category == sListArray[{{$j}}]['categoryInfo']){ //boothArr의 category에 값 저장한 후 수정할 것
                            // if(boothArr[i].category)
                            if(sListArray[{{$j}}].getInbooth() && !(boothArr[i].seller == "null")){
                                continue;
                            }
                            // console.log("잇힝");
                            // 
                            // console.log($('#content_'+boothArr[i]['id']));
                            
                            boothArr[i].seller = sListArray[{{$j}}].getId();
                            $('.seller_list').children('#seller_'+boothArr[i].seller).remove();
                            $('.set_booth #text_'+boothArr[i].getId()).text(sListArray[{{$j}}].seller_name);
                            $('.set_booth #text_'+boothArr[i].getId()).val(sListArray[{{$j}}].getId());
                            sListArray[{{$j}}].setInbooth(true);
                        }
                   @endfor
                   
                }
                // console.log(sListArray);
                // console.log(boothArr);
            });
            
            $('#survey_preview_btn').click(function(){
                
                $('.survey_e_preview').remove();
                var optionId = $('#terms2_2 option:selected').val();
                @for($i = 0, $length1 = count($terms2Q); $i < $length1; $i++)
                // alert({{$terms2Q[$i]->id}});
                // alert($('#terms2_2 option:selected').val());
                    if({{$terms2Q[$i]->id}} == optionId){
                        $('.survey_q_preview').text('{{$terms2Q[$i]->text}}');
                        $('.survey_q_preview_value').val("{{$terms2Q[$i]->id}}");
                        $('.survey_q_preview').attr('id','Q_{{$i}}');
                        
                        var count = 1;
                        @for($j = 0, $length2 = count($terms2E); $j < $length2; $j++)
                            @if($terms2Q[$i]->id == $terms2E[$j]->parent_id)
                                // alert("dfdf");
                                var addExamplePreview = "<li class='survey_e_preview'> &nbsp&nbsp <span class='e_num'></span>";
                                addExamplePreview += "&nbsp&nbsp <span class='e_content'></span> </li>";
                                $('.survey_preview').append(addExamplePreview);
                                $('.survey_e_preview').last().attr('id','E_{{$i}}_{{$j}}');
                                $('.e_num').last().text(count++);
                                $('.e_content').last().text('{{$terms2E[$j]->text}}');
                            @endif
                        @endfor
                    }
                @endfor
            });
            
            // 2차조건 : 조건 추가
            $('#survey_add_btn').click(function(){
                var quastion = $('.survey_q_preview').text();
                var quastion_id  = $('.survey_q_preview_value').val();
                var add_quastion = "<div class='added_quastions'>";
                add_quastion += "<input type='hidden' class='added_quastions_id' value='"+quastion_id+"'>";
                add_quastion += "<li class='added_q_content_1'><span class='added_num'></span> &nbsp&nbsp <span class='added_q'></span></li>";
                add_quastion += "<li class='added_q_content_2'>";
                add_quastion += "&nbsp<span> 보기 : </span>&nbsp";
                add_quastion += "<select class='added_q_select' style='width:55px;'></select>";
                add_quastion += "</li></div>";
                                        
                $('#terms2_body2').append(add_quastion);
                $('.added_q').last().text(quastion);
                var added_num = 0;
                if($('.added_num').length){
                    added_num = $('.added_num').last().prev().text();    
                }else{
                    added_num = 1;
                }
                
                $('.added_num').last().text(added_num);
                var count = 1;
                @for($i = 0, $length = count($terms2E); $i < $length; $i++)
                    if(quastion_id == {{$terms2E[$i]->parent_id}}){
                        var option = "<option id='e_id' value='{{$terms2E[$i]->id}}'>"+count+"</option>";
                        $('.added_q_select').last().append(option);
                        count++;
                    }
                
                @endfor
            });
            
            $('#terms2_btn').click(function(){
                var selectedQE = Array();
                for(var i = 0, length = $('.added_quastions').length; i < length; i++){
                    selectedQE[i] = Array();
                    selectedQE[i]['q_id'] = $('.added_quastions_id:eq(' + i + ')').val();
                    selectedQE[i]['e_id'] = $('.added_q_select option:selected:eq(' + i + ')').val();
                }
                // console.log(selectedQE);
                var notEqualToSeller = Array();
                for(var i = 0, length = selectedQE.length; i < length; i++){
                    @for($i = 0, $length = count($seller_answers); $i < $length; $i++)
                        if(selectedQE[i]['q_id'] == {{$seller_answers[$i]->q_id}}){
                            if(selectedQE[i]['e_id'] != {{$seller_answers[$i]->answer_id}}){
                                // alert(selectedQE[i]['e_id']);
                                // alert({{$seller_answers[$i]->answer_id}});
                                notEqualToSeller.push({{$seller_answers[$i]->user_id}});
                            }
                        }
                    @endfor
                }
                
                // 조건이 안맞는 애들을 저장한 배열 : NotEqualToSeller 
                // NotEqualToSeller에서 중복되는 요소 배제하기
                var uniqueNotEqualToSeller = [];
                $.each(notEqualToSeller, function(i, el){
                	if($.inArray(el, uniqueNotEqualToSeller) === -1) uniqueNotEqualToSeller.push(el);
                });
                // console.log(uniqueNotEqualToSeller);
                
                for(var i = 0, length1 = uniqueNotEqualToSeller.length; i < length1; i++){
                    // console.log(uniqueNotEqualToSeller[i]);
                    // console.log(length1);
                    // console.log($('.sellers'));
                    for(var j = 0, length2 = $('.sellers').length; j < length2; j++){
                        
                        var id = String($('.sellers:eq('+ j +')').attr('id'));
                        var idArr = id.split('_');
                        // alert(idArr[1]);
                        if(Number(uniqueNotEqualToSeller[i]) == Number(idArr[1])){
                            $('.sellers:eq('+ j +')').remove();
                        }
                    }
                }
            });
        });

     
    </script>
</head>
<body>
    <!-- s는 seller를 의미 -->
    <div class="wrap">
        <div class="s_List">
            <!-- 조건 버튼 공간 -->
            <div class="terms_wrap">
                <div class="terms1_wrap">
                    <div id="terms1">1次条件</div>

                    <!-- Modal -->
                    <div id="terms1_modal" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-sm">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">1次条件</h4>
                                </div>
                                <div class="modal-body" id="terms1_body">
                                    <p id="terms1_1">基準</p>
                                    <select id="terms1_2">
                                        <option value="テーマ">テーマ</option>
                                        <option value="参加回数">参加回数</option>
                                        <option value="年齢">年齢</option>
                                        <option value="最高販売金額">最高販売金額</option>
                                        <option value="最低販売金額">最低販売金額</option>
                                    </select>
                                    <button type="button" class="btn btn-default" id="terms1_3">追加</button>
                                    <hr>
                                </div>
                                <div class="modal-body" id="terms1_body2">

                                </div>
                                <p style="margin-left:20px;">参加回数, 年齢は記入した数より高いことを検索</p>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
                                    <button type="button" class="btn btn-primary" id="terms1_modal_save">確認</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal End-->
                    &nbsp;&nbsp;&nbsp;
                    <button id="terms1_btn" class="btn btn-default">適用</button>
                </div>


                <div class="terms2_wrap">
                    <div id="terms2" data-toggle="modal" data-target="#terms2_modal">2次条件</div>

                    <!-- Modal -->
                    <div id="terms2_modal" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-sm" style="margin:0 auto; width:500px; top:80px;">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header" style="margin:0 auto; width:97%; height:50px; margin-top:10px;">
                                    <h4 class="modal-title" style="float:left; width:45%;">2次条件</h4>
                                    <select id="terms2_2" style="width:110px;">
                                        @for($i = 0, $length = count($terms2Q); $i < $length; $i++)
                                            <option class="terms_option" value="{{$terms2Q[$i]->id}}">{{$i + 1}}番質問</option>
                                        @endfor
                                    </select>&nbsp&nbsp&nbsp
                                    <button type="button" class="btn btn-default" id="survey_preview_btn"  style="margin-top:-7px;">質問</button>
                                    <button type="button" class="btn btn-default" id="survey_add_btn"  style="margin-top:-7px;">追加</button>
                                    <!--<hr>-->
                                </div>
                                <div id="terms2_body">
                                    <div class="survey_preview">
                                        <input type="hidden" class="survey_q_preview_value" value="{{$terms2Q[0]->id}}" />
                                        <li class="survey_q_preview" id="Q_1">
                                            {{$terms2Q[0]->text}}
                                        </li>
                                        @for($i = 0, $length = count($terms2E); $i < $length; $i++)
                                            @if($terms2Q[0]->id == $terms2E[$i]->parent_id)
                                                <li class="survey_e_preview" id="E_1_{{$i}}"> 
                                                    &nbsp&nbsp <span class="e_num">{{$i+1}}</span> &nbsp&nbsp 
                                                    {{$terms2E[$i]->text}}
                                                </li>    
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                                <!--<hr style="width:98%;"/>-->
                                <div class="modal-body" id="terms2_body2">
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
                                    <button type="button" class="btn btn-primary" id="terms2_modal_save">確認</button>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <!-- Modal End-->
                    &nbsp;&nbsp;&nbsp;
                    <button type="button" id="terms2_btn" class="btn btn-default">適用</button>
                </div>
                <button id="terms_reset" style="width:93%; margin:auto; margin-top:15px;" class="btn btn-default btn-lg btn-block">条件初期化</button>
            </div>

            <!-- 판매자 리스트 -->
            <div class="seller_list">
            </div>
        </div>
        <div class="s_set">

        </div>
        <button id="finish" class="btn btn-default btn-lg">政策完了</button><br><br>
        <button id="areaCreate" class="btn btn-default btn-lg">領域配置<br>モード</button><br><br>
        <button id="auto_allocate" class="btn btn-default btn-lg">出店者<br>自動配置</button>
        <div class="goods">
            <h3 style="height:40px; margin-top:0px; text-align:center; line-height:40px; background-color:#969696; color:white;">出店者の商品</h3>
            <div class="goods_view">
                <div class="goods_view_left">
                    <img src="http://artfeel.co.kr/web/product/big/o_Icon_103.jpg" style="margin-top:2px; height:97%; width:97%;">
                </div>
                <div class="goods_view_center">

                </div>
                <div class="goods_view_right">
                    <img src="http://artfeel.co.kr/web/product/big/o_Icon_104.jpg" style="margin-top:2px;height:97%; width:97%;">
                </div>
            </div>
        </div>

        <div class="s_info">
            <div class="s_info_info">
                出店者情報
            </div>
            <div class="s_info_survey">
                アンケート
            </div>
            <div class="s_info_content">

            </div>
        </div>
    </div>
</body>
@endsection
