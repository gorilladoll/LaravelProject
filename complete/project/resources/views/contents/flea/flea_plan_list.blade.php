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
            margin:auto;
            margin-top:50px;
            margin-bottom:100px;
            width:1000px;
            border: 3px solid #f94a4a;
            border-radius:4px;
            background-color:white;
            box-shadow:5px 5px 10px #848484;
            height:600px;
        }
        .group_wrap > h2 {
            border-bottom:1px solid darkgray;
            margin:0;
            text-align:center;
            font-family:'interparkM';
            padding:10px;
            color:white;
            background-color: #f94a4a;
        }
        .group_list{
            overflow:auto;
            width:95%;
            height:75%;
            margin:10px auto;
            /*border-top: 1px solid black;*/
            border-bottom: 1px solid #7c7c7c;
        }
        .group_controll_button{
            width:250px;
            height: 9%;
            margin:auto;
            /*border:1px solid black;*/
        }
        .delete, .ok{
            width:49%;
            height: 100%;
            color: white;
            font-size: 25px;
            font-family: 'interparkM';
            background-color:#f94a4a;
        }
        
        .my_list{
            margin:20px auto;
            width:95%;
            height:90px;
            border-radius: 10px;
            background-color:white;
            border:1px solid #7c7c7c;
            text-align: center;
            font-family: 'interparkM';
            color: #f94a4a;
            /*line-height: 90px;*/
            padding-top: 10px;
        }
        
        .my_list:first-child{
            border:0px;
            background-color:#f94a4a;
            color: white;
        }
        
        .steps_wrapper{
          margin:auto;
          margin-top:0px;
          width:1100px;
          height:200px;
          background-color:white;
          /*border:1px solid black;*/
          border-top:1px solid #e54747;
          border-bottom:1px solid #e54747;
          border-radius: 6px;
          box-shadow:5px 5px 10px #848484;
        }
        .steps_wrapper_center{
          width:900px;
          height:100%;
          margin:auto;
        }
        
        .steps{
          border:1px solid #7c7c7c;
          width:100%;
          height:60px;
          /*float:left;*/
          /*margin-top:50px;*/
          border-radius:8px;
          /*margin-right:10px;*/
          line-height:60px;
          text-align:center;
          font-size:40px;
          font-family:"CulDeSac";
          background-color:white;
          /*box-shadow:3px 3px 3px #7a7a7a;*/
          color:black;
        }
        
        .steps_contents:nth-child(3) .steps{
          border:0px;
          background-color:#f94a4a;
          color:white;
        }
        
        .division_line{
          margin:auto;
          width:1100px;
          border-bottom:1px solid #a3a3a3;
        }
        
        .steps_contents{
          
          width:24%;
          height:80px;
          margin-top:50px;
          margin-right:10px;
          float:left;
        }
        
        .steps_explain{
          /*border:1px solid black;*/
          margin-top:4px;
          width:100%;
          text-align:center;
          font-family:'interparkM';
          font-size:18px;
          color:#595959;
          /*text-shadow:3px 3px 1px #bcbcbc;*/
        }
        
        #flea_create_title{
          margin:auto; 
          margin-top:150px; 
          width:1100px; 
          height:60px; 
          text-align:center; 
          font-family:'interparkM'; 
          font-size:40px; 
          color:#f94a4a;
          /*text-shadow: 4px 4px 2px #bcbcbc;*/
          /*border-bottom:1px solid #878787;*/
          
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
                var plan = "<div class='my_list booth_select' id="+{{$user_plan->id}}+"><h1>"+'{{$user_plan->plan_name}}'+"</h1></div>";
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
                    $('#'+booth_select).css('background-color','white');
                    $('#'+booth_select).css('border','1px solid #7c7c7c');
                    $('#'+booth_select).css('color','#f94a4a');
                    booth_select = $(this).attr('id');
                    $(this).css('background-color','#f94a4a');
                    $(this).css('border','0px');
                    $(this).css('color','white');
                });
                plan_list++;
            @endforeach

            // 신규 부스 생성 modal 출력
            $('.new_booth').click(function(){
                $('#'+booth_select).css('background-color','white');
                $('#'+booth_select).css('border','1px solid #7c7c7c');
                $('#'+booth_select).css('color','#f94a4a');
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

                test2 = $('#new_plan_text').val();

                $.ajax({
                    /*서버에 값 전달*/
                    url: '/booth/open/new',
                    data: {
                        plan_text: test2,
                        id: {{$user_info->id}}
                    },
                    dataType: 'jsonp',
                    success: function (data) {
                        alert('作成完了!');
                        // alert(data);
                        $('#new_plan').modal('hide');
                        var plan = "<div class='my_list booth_select' id=" + data[0]['id'] + "><h1>" + $('#new_plan_text').val() + "</h1></div>";
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
                            $('#'+booth_select).css('background-color','white');
                            $('#'+booth_select).css('border','1px solid #7c7c7c');
                            $('#'+booth_select).css('color','#f94a4a');
                            booth_select = $(this).attr('id');
                            $(this).css('background-color','#f94a4a');
                            $(this).css('border','0px');
                            $(this).css('color','white');
                        });
                        plan_count++;
                    },
                    error: function () {
                        alert('エラー');
                        return;
                    }
                });
            });

            //배치도 선택
            $('.ok').click(function(){
                if(booth_select == 0){
                alert("選んだブース配置図がないです！");
                return;
                }
                if(confirm("'"+$('#'+booth_select).children().text()+"' 選んだブース配置図でしますか?")){
                    // $.ajax({/*서버에 값 전달*/
                    //     url : 'http://localhost:8000/list/setplan',
                    //     data: {
                    //         flea_id : {{$flea_id}},
                    //         flea_th : {{$flea_th}},
                    //         plan_id : booth_select
                    //     },
                    //     dataType : 'jsonp',
                    //     success : function(data){
                    //         alert('갱신 완료');
                    //     },
                    //     error : function(){
                    //         alert('에러가 발생하였습니다');
                    //         return;
                    //     }
                    // });
                    var urltest = $('#'+booth_select).attr('id');
                    // alert(urltest);
                    // alert({{$flea_th}});
                    window.location.href = '{{url("/booth/view/")}}/'+urltest+'/'+{{$flea_id}}+'/'+{{$flea_th}};
                    // url로 배치도의 이름 값을 전달한다.
                }
            });

            // 배치도 삭제 구문
            $('.delete').click(function(){
                if(booth_select == 0) {
                    alert("選んだブース配置図がないです");
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
    
    <div  id="flea_create_title">フリマ作成手続ぎ</div>
    
    <div class="steps_wrapper">
        <div class="steps_wrapper_center">
          <div class="steps_contents">
            <div class="steps"> step 1 </div>
            <div class="steps_explain">フリマの情報記入</div>
          </div>
          <div class="steps_contents">
            <div class="steps"> step 2 </div>
            <div class="steps_explain">アンケート登録</div>
          </div>
          <div class="steps_contents">
            <div class="steps"> step 3 </div>
            <div class="steps_explain">ブース配置図作成</div>
          </div>
          <div class="steps_contents"  style="margin-right:0px;">
            <div class="steps"> step 4 </div>
            <div class="steps_explain">開催完了</div>
          </div>
        </div>
    </div>
    

<div class="group_wrap">
    <h2>ブース配置図選択と作成</h2>
    <div class="group_list">
        <div class="my_list new_booth">
            <h1>NEW BOOTH CREATE</h1>
        </div>
    </div>
    <div class="group_controll_button">
        <button class="delete btn btn-default">削除</button>
        <button class="ok btn btn-default">完了</button>
    </div>
</div>

<div class="modal fade" id="new_plan" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">新しいブース作成</h4>
            </div>
            <div class="modal-body">
                作成するブースの名前を記入してください
                <input id="new_plan_text" style='width:100%' type="text">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
                <button type="button" id="new_plan_create" class="btn btn-primary">策債</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</body>
    <br>
@endsection