<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST" action="/authenticate">

    <div>
      Email
      <input type="email" name="email" id="email">
    </div>

    <div>
      Password
      <input type="password" name="password" id="password">
    </div>

    <div>
      <input type="checkbox" name="remember"> Remember Me
    </div>

    <div>
      <button type="submit">Login</button>
      <a href="{{url('/register')}}">회원가입</a>
    </div>
  </form>
</body>
</html>