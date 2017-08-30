<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
  </head>

  <link rel="stylesheet" href="{{asset('/css/clock.css')}}">
  <link rel="stylesheet" href="{{asset('/css/contents/mylab.css')}}">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.js"></script>
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="/js/clock.js" charset="utf-8"></script>
  <script src="/js/calendar.js" charset="utf-8"></script>
  <script src="{{asset('/js/lab/mylab.js')}}" charset="utf-8"></script>

  <!-- bxSlider Javascript file -->
  <script src="/js/bxslider/jquery.bxslider.min.js"></script>
  <!-- bxSlider CSS file -->
  <link href="/js/bxslider/jquery.bxslider.css" rel="stylesheet" />
  <script src="/js/section.js"></script>

  {{-- 평점관련 --}}
  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
  <link href="{{asset('css/star-rating.css')}}" media="all" rel="stylesheet" type="text/css" />

  <!-- optionally if you need to use a theme, then include the theme file as mentioned below -->
  <link href="{{asset('themes/krajee-svg/theme.css')}}" media="all" rel="stylesheet" type="text/css" />

  <script src="{{asset('js/star-rating.js')}}" type="text/javascript"></script>

  <!-- optionally if you need to use a theme, then include the theme file as mentioned below -->
  <script src="{{asset('themes/krajee-svg/theme.js')}}"></script>

  <!-- optionally if you need translation for your language then include locale file as mentioned below -->
  <script src="{{asset('js/locales/LANG.js')}}"></script>
  <!-- 평점관련 -->

  @yield('style')

  <body>
    <div class="header">
      <div class="lab_navbar">
        <div class="inner">
          <a href="/"><img src="{{asset('storage/image/doubleo.png')}}" alt=""></a>
          <ul class="topmenu">
            <li><a href="#">전체공방</a></li>
            <li class="menu_blank">&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</li>
            <li><a href="#">마이페이지</a></li>
            <li class="menu_blank">&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</li>
            <li>{{$user}}님 환영합니다</li>
            <li class="menu_blank">&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</li>
            <li><a href="{{url('/mylab/show')}}">내 공방</a></li>
            <li class="menu_blank">&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</li>
            <li><a href="/logout">로그아웃</a></li>
          </ul>
        </div>
      </div>
      <div class="mylab_navbar">
        <div class="inner">
          <ul class="lab_menu">
              @if ($user != $user_name['name'])
                <li class="lab_content">
                  <a href="{{url('/mylab/user/lab/'.$user_name['id'])}}">개인공방</a>
                </li>
                <li class="lab_content">
                  <a href="{{url('/mylab/user/goods/'.$user_name['id'])}}">물품보기</a>
                </li>
                <li class="lab_content">
                  <a href="{{url('/mylab/user/follow/'.$user_name['id'])}}">구독공방</a>
                </li>
              @else
                <li class="lab_content">
                  <a href="{{url('/mylab/show')}}">개인공방</a>
                </li>
                <li class="lab_content">
                  <a href="{{url('/mylab/goods')}}">물품보기</a>
                </li>
                <li class="lab_content">
                  <a href="{{url('/mylab/follow')}}">구독공방</a>
                </li>
              @endif
          </ul>
        </div>
      </div>
    </div>
    @yield('content')
  </body>
</html>
