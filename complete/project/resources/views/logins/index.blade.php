{{-- login index--}}
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <!-- 합쳐지고 최소화된 최신 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- 부가적인 테마 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

    <!-- 합쳐지고 최소화된 최신 자바스크립트 -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" charset="utf-8"></script>
    @yield('style')
    @yield('script')
  </head>
  <body>
    {{-- 로그인을 감쌀 랩 --}}
    <div class="container">
      {{-- 헤더 --}}
      <div class="header">
        @yield('header')
      </div>
      {{-- 내용 --}}
      <div class="col-xs-6 .col-md-4">
        @yield('content')
      </div>
    </div>
  </body>
</html>
