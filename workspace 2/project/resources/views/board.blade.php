<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		*{
			text-align: center;
		}
		li{
			list-style: none;
			float: left;
			height: 20px;
			border: 1px solid black;
		}
		.board_template{
			width: 850px;
			height: 0 auto;
			border: 1px solid black;
			margin: 0 auto;
		}
		.board_element{
			height: 30px;
			border: 1px solid black;
		}
		.board_number{width: 10%;}
		.board_title{width: 50%;}
		.board_writer{width: 10%;}
		.board_date{width: 20%;}
		
		.board_contents{
			height: 30px;
			border: 1px solid black;
		}
		.board_nav{
			margin: 0 auto;
			width: 800px;
			border: 1px solid black;
		}
	</style>
</head>
<body>

	<div class="board_nav">
		<input type="button" onClick="location.href='{{url('/board/write')}}'" id="write" value="글쓰기">	
	</div>	
	<div class="board_template">
		<div class="board_element">
			<li class="board_number">	번호		</li>
			<li class="board_title">	제목		</li>
			<li class="board_writer">	작성자	</li>
			<li class="board_date">		작성일	</li>	
		</div>
		

		@for($count=0, $leng = count($boards); $count < $leng; $count++)
		<div class="board_contents">
			<li class="board_number">	{{$boards[$count]->id}}				</li>
			<li class="board_title">	{{$boards[$count]->title}}			</li>
			<li class="board_writer">	{{$boards[$count]->writer}}			</li>
			<li class="board_date">		{{$boards[$count]->created_at}}		</li>
		</div>
		@endfor
	</div>
	{{ $boards->links() }}
</body>
</html>