<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	#write_template{
		margin: 0 auto;
		width: 420px;
		height: 360px;
	}
	#content{
		width: 400px;
		height: 300px;
	}
	#title{
		width: 350px;
	}
</style>
<body>
	<form action="/board/actionWrite" method="POST">
		<div id="write_template">
			제목 : <input type="text" name="title" id="title"><br/>
			내용 <br>
			<textarea name="content" id="content"></textarea>
			<button type="submit">글쓰기</button>
		</div>
	</form>
</body>
</html>