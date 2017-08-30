@extends('layouts.app')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel='stylesheet' href='../fullcalendar/fullcalendar.min.css'/>
<script src='../fullcalendar/lib/moment.min.js'></script>
<script src='../fullcalendar/fullcalendar.min.js'></script>


@section('title', 'Mypage')
@section('content')
<div id="mypage_main" style="margin-top:130px; margin-bottom:40px;">
  <div class="mypage_user">
    <h2>My page</h2>
    <div class="row">
      <div class="col-lg-3">
        <a href="{{url('/fleamarket/hostpage')}}"><img src="{{asset('img/icon/host.png')}}" alt=""></a>
        <a class="btn btn-default" href="{{url('/mypage/host')}}" role="button">개최자 페이지</a>
      </div>
      <div class="col-lg-3">
        <a href="{{url('/fleamarket/sellerpage')}}"><img src="{{asset('img/icon/seller.png')}}" alt=""></a>
        <a class="btn btn-default" href="{{url('/mypage/seller')}}" role="button">판매자 페이지</a>
      </div>
      <div class="col-lg-3">
        <a href="{{url('/fleamarket/buyerpage')}}"><img src="{{asset('img/icon/buyer.png')}}" alt=""></a>
        <a class="btn btn-default" href="{{url('/mypage/buyer')}}" role="button">구매자 페이지</a>
      </div>
      <div class="col-lg-3">
        <a href="#"><img src="{{asset('img/icon/membership.png')}}" alt=""></a>
        <a class="btn btn-default" href="{{url('')}}" role="button">회원정보</a>
      </div>
    </div>
  </div>

  <div class="mypage_user_result">
    <h2>Calender</h2>
  </div>
  <div id="calendar"></div>
</div>


<script type="text/javascript">
// Create calendar when document is ready
  $(document).ready(function() {
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
            window.alert("일정을 불러오는데 실패하였습니다.");
          }
        });
     },
     // Make possible to respond to clicks and selections
     selectable: true,

     // This is the callback that will be triggered when a selection is made.
     // It gets start and end date/time as part of its arguments
     select: function(start, end, jsEvent, view) {

       // Ask for a title. If empty it will default to "New event"
       var title = prompt("일정을 입력하세요", "New event");

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
            window.alert("일정에 추가하였습니다.");
            location.replace("/mypage/main");
          },
          error : function(){
            window.alert("일정에 추가하지 못하였습니다.");
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
       var newTitle = prompt("수정할 일정을 입력하세요", event.title);

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
                window.alert("일정 수정을 완료 했습니다.");
                location.replace("/mypage/main");
              },
              error : function(){
                window.alert("일정 수정에 실패하였습니다.");
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
