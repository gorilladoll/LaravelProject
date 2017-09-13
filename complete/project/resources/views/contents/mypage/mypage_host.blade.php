<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="{{asset('css/contents/mypage.css')}}">
<link rel='stylesheet' href='../fullcalendar/fullcalendar.min.css'/>
<script src='../fullcalendar/lib/moment.min.js'></script>
<script src='../fullcalendar/fullcalendar.min.js'></script>

@extends('layouts.app')

<style>

  div.mypage_user {
    margin-top:150px;
    width : 100%;
    height : 350px;
    font-family:'interparkM';
    /*border:1px solid black;*/
  }
  .mypage_user h2{
    width:260px;
    border-bottom:2px solid #383838; 
		color:#383838; 
		text-shadow:1px 1px 2px #828282; 
		box-shadow:3px 3px 3px #828282;
		margin-bottom:20px;
  }
  div.mypage_user_result {
    width : 100%;
    margin : 0 auto;
    height : 200px;
    font-family:'interparkM';
    /*border:1px solid black;*/
  }
  div.mypage_user_result h2{
    width:340px;
    border-bottom:2px solid #383838; 
		color:#383838; 
		text-shadow:1px 1px 2px #828282; 
		box-shadow:3px 3px 3px #828282;
		margin-bottom:20px;
  }
  
  .calendar_wrapper h2{
    margin-top:200px;
    width:340px;
    border-bottom:2px solid #383838; 
		color:#383838; 
		text-shadow:1px 1px 2px #828282; 
		box-shadow:3px 3px 3px #828282;
		/*margin-bottom:20px;*/
  }
  
  div.mypage_user div.jumbotron {
    margin-top : 20px;
    height : 270px;
    border-radius : 5px;
    box-shadow:5px 5px 4px #828282;
    border:1px solid #878787;
    background-color:#f2f2f2;
  }

  div.mypage_user_result div.jumbotron {
    margin-top : 20px;
    border-radius : 4px;
  }
  div.mypage_result_list {
    width : 900px;
    height : 120px;
    margin : 0 auto;
    margin-top: 20px;
    margin-bottom : 20px;
    background-color: white;
    border-radius: 4px;
    border: 1px solid gray;
  }
  .list_image{
    width:70px;
    height:70px;
    margin-top:25px;
    margin-left:25px;
    background-color:gray;
    display:inline-block;
    float:left;
  }
  .list_image img{
    width:100%;
    height:100%;
  }
  .list_name{
    display:inline-block;
    margin-left:10px;
    margin-top:45px;
    height:50px;
    float:left;
    font-size:20px;
  }
  .mypage_result_list > p{
    display:inline-block;
  }
  .list_button{
    margin : 0;
    margin-left:10px;
    width:100px;
    float:left;
  }
  .btn{
    margin-top:4px;
    width:90px;
  }
  .info{
    margin:auto;
    width:930px;
    height:170px;
    background-color:white;
  }
  .info_image{
    margin:20px;
    width:130px;
    height:130px;
    float:left;
    border:1px solid red;
    text-align: center;
  }
  .info_message{
    margin-top:35px;
    margin-left:35px;
    float:left;
    font-size:20px;
  }
  .long {
    width:60%;
  }
  #calendar{
    /*border:1px solid black;*/
    background-color:white;
    border-radius:6px;
    box-shadow:3px 3px 3px #828282;
    margin-bottom:50px;
  }
</style>

<script>
  $(document).ready(function(){
    
      var group_list = "<div class='mypage_result_list'><div class='list_image'><img src='/user_img/poster_jp_01.png'></div><div style='width:22%;' class='list_name'>ミハマ de フリマ</div>" +
          "<div class='list_name' style='width:20%;'>最近開催回次:4回</div><div style='width:30%;' class='list_name'>最近開催日付 : 2017-09-23</div><div class='list_button'>" +
          "<button class='btn btn-default'>修正</button>" +
          "<button class='btn btn-default'>削除</button>" +
          "<button class='btn btn-default account_btn'>精算</button></div></div>";
      $('.group_list').append(group_list);
      
      var group_list = "<div class='mypage_result_list'><div class='list_image'><img src='/user_img/poster_jp_26.jpg'></div><div style='width:22%;' class='list_name'>アートフリーマーケット</div>" +
          "<div class='list_name' style='width:20%;'>最近開催回次:1回</div><div style='width:30%;' class='list_name'>最近開催日付 : 2017-09-03</div><div class='list_button'>" +
          "<button class='btn btn-default'>修正</button>" +
          "<button class='btn btn-default'>削除</button>" +
          "<button class='btn btn-default account_btn'>精算</button></div></div>";
      $('.group_list').append(group_list);

      $('.account_btn').click(function(){
          window.location.href = "<?php echo URL::to('/account/host/1'); ?>";
      })
  })
</script>

@section('title', '開催者ページ')
@section('content')
<div id="mypage_main" style="margin-top:130px;">
  <div class="mypage_user">
    <h2 style="width:280px;">MY PAGE - 開催者</h2>
    <div class="jumbotron">
      <div class="info">
        <div class="info_image"><br>2017.05<hr><p>05.金</p></div>
        <div class="info_message long">開催回数 : 4回</div>
        <div class="info_message">最近開催したフリマー : アートフリーマーケット1回</div>
        <div class="info_message">参加日時 : 2017-09-21</div>
      </div>
    </div>
  </div>
  <div class="mypage_user_result">
    <h2>フリマーケット GROUP</h2>
    <div class="jumbotron group_list" style="border:1px solid black; background-color:#f2f2f2; box-shadow:5px 5px 4px #828282;">

    </div>
  </div>
  <br>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <div class="calendar_wrapper">
    <h2 style='width:140px'>Calender</h2>
  </div>
  <div id="calendar"></div>

<script type="text/javascript">
// Create calendar when document is ready
  $(document).ready(function() {
  //  var dates;
  //  $.ajax({
  //    url : "/mypage/date/view",
  //    dataType:'json',
  //    success : function(data){
  //      dates = data;
  //      console.log(dates);
  //    },
  //    error : function(){
  //      window.alert("일정을 불러오는데 실패하였습니다.");
  //    }
  //  });
  //  window.alert(plans);
   // We will refer to $calendar in future code
   var $calendar = $("#calendar").fullCalendar({
     // Start of calendar options
     header: {
      left: 'prev,next',
      center: 'title',
      right: 'today,month,agendaDay,agendaWeek'
     },
     events : function(start,end,timezone,callback){
        $.ajax({
          url : "/mypage/date/view",
          dataType:'json',
          success : function(data){
            var event= data;
            callback(event);
          },
          error : function(){
            window.alert("サバーニエラーが発生しました。");
          }
        });
     },
     // Make possible to respond to clicks and selections
     selectable: true,

     // This is the callback that will be triggered when a selection is made.
     // It gets start and end date/time as part of its arguments
     select: function(start, end, jsEvent, view) {

       // Ask for a title. If empty it will default to "New event"
       var title = prompt("日程を入力してください", "New event");

       // If did not pressed Cancel button
       if (title != null) {
        // Create event
        var start = $.fullCalendar.formatDate(start,"YYYY-MM-DD HH:mm:ss");
        var end   = $.fullCalendar.formatDate(end  ,"YYYY-MM-DD HH:mm:ss");

        // Push event into fullCalendar's array of events
        // and displays it. The last argument is the
        // "stick" value. If set to true the event
        // will "stick" even after you move to other
        // year, month, day or week.

        var event = $.ajax({
          url : '/mypage/date/create',
          data : {
            'title' : title,
            'start' : start,
            'end' : end
          },
          type : 'get',
          success : function(data){
            window.alert("日程を追加しました。.");
            location.replace("/mypage/main");
          },
          error : function(){
            window.alert("エラーが発生しました。");
            location.replace("/mypage/main");
          }
        });

        $calendar.fullCalendar("renderEvent", event, true);
       };
       // Whatever happens, unselect selection

       $calendar.fullCalendar("unselect");
       // End select callback
      },

      // Make events editable, globally
      editable : true,

      // Callback triggered when we click on an event

      eventClick: function(event, jsEvent, view){
       // Ask for a title. If empty it will default to "New event"
       var newTitle = prompt("修正する日程の内容を入れてください。", event.title);

       // If did not pressed Cancel button
       if (newTitle != null) {
            // Update event
            event.title = newTitle.trim() != "" ? newTitle : event.title;

            // Update days
            var start = $.fullCalendar.formatDate(event.start,"YYYY-MM-DD HH:mm:ss");
            var end   = $.fullCalendar.formatDate(event.end  ,"YYYY-MM-DD HH:mm:ss");

            $.ajax({
              url : '/mypage/date/alert',
              data : {
                'id'    : event.id,
                'title' : newTitle,
                'start' : start,
                'end' : end
              },
              type : 'get',
              success : function(data){
                window.alert("日程修正を完了しました。");
                location.replace("/mypage/main");
              },
              error : function(){
                window.alert("日程修正に失敗しました。");
                location.replace("/mypage/main");
              }
            });

            // Call the "updateEvent" method
            $calendar.fullCalendar("updateEvent", event);
          }
        } // End callback eventClick
      } // End of calendar options
    );
  });
</script>

</div>
@endsection
