@extends('layouts.app')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--<link rel="stylesheet" href="{{asset('css/contents/mypage.css')}}">-->
<link rel='stylesheet' href='../fullcalendar/fullcalendar.min.css'/>
<script src='../fullcalendar/lib/moment.min.js'></script>
<script src='../fullcalendar/fullcalendar.min.js'></script>


@section('title', 'Mypage')
@section('content')

<style type="text/css">
  
  #mypage_main{
    margin:auto;
    width:1000px;
    margin-top:150px;
    /*border:1px solid black;*/
    font-family:'interparkM','interparkMEot';
  }

  .row{
    /*border:1px solid black;*/
    background-color:white;
    width:100%;
    height:300px;
    /*padding-bottom:20px;*/
    border-bottom:2px solid #383838;
		box-shadow:3px 3px 3px #828282;
		border-radius:6px;
  }
  .mypage_main_title{
    width:150px;
    border-bottom:2px solid #383838; 
		color:#383838; 
		text-shadow:1px 1px 2px #828282; 
		box-shadow:3px 3px 3px #828282;
		margin-bottom:20px;
  }
  
  .row .col-lg-3{
    width:23.6%;
    height:210px;
    /*border:1px solid black;*/
    margin-left:1%;
    margin-top:20px;
    text-align:center;
  }
  
  .row .col-lg-3 img{
    width:100%;
    height:100%;
    margin-bottom:10px;
    /*border:1px solid black;*/
    border-bottom:2px solid #383838;
		/*box-shadow:3px 3px 3px #828282;*/
  }
  .mypage_user_result h2{
    /*border:1px solid black;*/
    margin-top:50px;
    width:150px;
    border-bottom:2px solid #383838; 
		color:#383838; 
		text-shadow:1px 1px 2px #828282; 
		box-shadow:3px 3px 3px #828282;
		margin-bottom:20px;
  }
  
  #calendar{
    /*border:1px solid black;*/
    background-color:white;
    border-radius:6px;
    box-shadow:3px 3px 3px #828282;
    margin-bottom:50px;
  }
  
</style>
<div id="mypage_main" >
  <div class="mypage_user">
    <h2 class="mypage_main_title">MY PAGE</h2>
    <div class="row">
      <div class="col-lg-3">
        <a href="{{url('/fleamarket/hostpage')}}"><img src="{{asset('img/icon/host.png')}}" alt=""></a>
        <a class="btn btn-default" href="{{url('/mypage/host')}}" role="button">開催者ページ</a>
      </div>
      <div class="col-lg-3">
        <a href="{{url('/fleamarket/sellerpage')}}"><img src="{{asset('img/icon/seller.png')}}" alt=""></a>
        <a class="btn btn-default" href="{{url('/mypage/seller')}}" role="button">出店者ページ</a>
      </div>
      <div class="col-lg-3">
        <a href="{{url('/fleamarket/buyerpage')}}"><img src="{{asset('img/icon/buyer.png')}}" alt=""></a>
        <a class="btn btn-default" href="{{url('/mypage/buyer')}}" role="button">購入者ページ</a>
      </div>
      <div class="col-lg-3">
        <a href="#"><img src="{{asset('img/icon/membership.png')}}" alt=""></a>
        <a class="btn btn-default" href="{{url('')}}" role="button">メンバー情報</a>
      </div>
    </div>
  </div>

  <div class="mypage_user_result">
    <h2 >Calender</h2>
  </div>
  <div id="calendar"></div>
</div>


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

@endsection
