<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{asset('/css/mylabcreate.css')}}">
  <style media="screen">
    img{
      margin : 0px;
      width : 100%;
      height : 100%;
    }
  </style>
  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="/js/mylabcreate.js" charset="utf-8"></script>
</head>
<body>
  <div class="content">
    <div class="wiget-clock wiget">
      <img src="/storage/image/clock.png" alt="">
    </div>
    <div class="wiget-text wiget">
      <img src="/storage/image/profile.png" alt="">
    </div>
    <div class="wiget-stiker wiget">
      <img src="/storage/image/calendar.png" alt="">
    </div>
    <div class="textbox">
      <img src="/storage/image/textbox.png" alt="">
    </div>
    <div class="timeline">
      <img src="/storage/image/timeline.png" alt="">
    </div>
    <div class="friends">
      <img src="/storage/image/friend.png" alt="">
    </div>
  </div>

  <div class="content_box ui-widget-content">
    <div class="input">
      <div class = "two_input box">
        <input type="text" class="main_text" maxlength="20">
      </div>
    </div>
    <div class="drop">
      <div class = "six box" value = "true"></div>
      <div class = "seven box" value = "true"></div>
      <div class = "eight box" value = "true"></div>
      <div class = "nine box" value = "true"></div>
      <div class = "ten box" value = "true"></div>

      <div class = "eleven box" value = "true"></div>
      <div class = "twelve box" value = "true"></div>
      <div class = "thirteen box" value = "true"></div>
      <div class = "fourteen box" value = "true"></div>
      <div class = "fifteen box" value = "true"></div>

      <div class = "sixteen box" value = "true"></div>
      <div class = "seventeen box" value = "true"></div>
      <div class = "eighteen box" value = "true"></div>
      <div class = "nineteen box" value = "true"></div>
      <div class = "twenty box" value = "true"></div>

      <div class = "twenty_one box" value = "true"></div>
      <div class = "twenty_two box" value = "true"></div>
      <div class = "twenty_three box" value = "true"></div>
      <div class = "twenty_four box" value = "true"></div>
      <div class = "twenty_five box" value = "true"></div>
    </div>
    <button id="resetAll">초기화</button>
    <button id="submit">제작완료</button>
  </div>
</body>
</html>