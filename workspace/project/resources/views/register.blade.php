<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

회원가입
	<form method="POST" action="/regist">

    <div>
      Email
      <input type="email" name="email" id="email">
    </div>

    <div>
      Password
      <input type="password" name="password" id="password">
    </div>

    <div>
      닉네임
      <input type="text" name="nick_name" id="nick_name">
    </div>

    <div>
      관심지역
      <input type="text" name="attention" id="attention">
    </div>

    <div>
      <input type="checkbox" name="remember"> Remember Me
    </div>

    <div>
      <button type="submit">Login</button>
    </div>
  </form>
</body>
</html>