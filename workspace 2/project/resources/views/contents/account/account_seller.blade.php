
@extends('layouts.app')

@section('content')

<!DOCTYPE html>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
	<script type="text/javascript" src="http://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.fint.js?cacheBust=56"></script>

<style type="text/css">
	li{
		list-style: none;
	}

	.account_header{
		margin:0 auto; 
		width: 1200px;
	}

	.account_wrapper{
		margin: 0 auto; 
		width: 1200px; 
		height: 800px;
	}

	.account_divBox{
		border: 1px solid #727272;
		border-radius: 5px;
	}

	.account_BottomBox{
		margin: 0 auto;
		border-bottom: 1px solid #727272;
	}

	.account_leftArea{
		width: 250px; 
		height: 700px; 
		float: left;
	}

	.account_fleaName{
		line-height: 40px; 
		width: 250px; 
		height: 40px;
		margin-bottom: 10px;
	}

	.account_thList{
		margin-top: 10px; 
		width: 250px; 
		height: 607px; 
	}

	.account_th{
		margin-top: 10px; 
		width: 90%; 
		height: 40px;
		line-height: 50px; 
	}

	.account_accountArea{
		float: left; 
		margin-left: 10px; 
		width: 700px;
		height: 700px;
	}

	.account_detailArea{
		float: left;
		margin-left: 10px;
		width: 225px;
		height: 700px;
	}

	.detailArea_header{
		 width:100%; 
		 height: 7%;
		 line-height: 50px;
	}

	.detailArea_body{
		width: 100%; 
		height: 80%;
	}

	.detailArea_content{
		margin-top: 20px;
		width: 90%;
	}

	.detailArea_content_title{
		width: 100%;
		margin-bottom: 5px;
	}

	.detailArea_content_text{
		width: 100%;
		margin-bottom: 3px;
	}

	.detailArea_footer{
		margin: 0 auto;
		width: 90%;
		height: 10.5%;
		border-top: 1px solid #727272;
	}

	.flea_pagination{
		display: block;
	}
	.month_pagination{
		display: none;
	}
	.year_pagination{
		display: none;
	}

	a:link{
		text-decoration: none;
		color: black;
	}
	a:visited{
		text-decoration: none;
		color: black;
	}
	a:hover{
		color: #ff2b2b;
	}

</style>

<script type="text/javascript">

	$(document).ready(function(){
		var chartWidth = '650';
		var chartHeight = '500';
		var chartFont = "Verdana";
		var chartFontSize = "15";
		var chartFontColor = "#000000";
		var plotFillAlpha = "80";
		var barColorArr = {};
		barColorArr['main'] = "#ff2b2b";
		barColorArr['sub_1'] = "#ad2d2d";
		barColorArr['sub_2'] = "#f79b9b";

		FusionCharts.ready(function(){
		    var fusioncharts = new FusionCharts({
			    type: 'mscolumn2d',
			    renderAt: 'chart-container',
			    width: chartWidth,
			    height: chartHeight,
			    dataFormat: 'json',
			    dataSource: {
			        "chart": {
			        	//레이블 값 및 단위 등 설정
			        	//"yaxismaxvalue": ,
			            "caption": $('.account_select option:selected').text(),
			            "subcaption": "<br><br>",
			            "xAxisName": "<br>",
			            "yAxisName": "",
			            "numberPrefix": '￦',
			            //"thousandSeparator": ",",
			            "formatNumberScale": "0",
			            "showPlotBorder" : 1,
			            "plotBorderColor":"#ffffff",
			            "plotFillAlpha":plotFillAlpha,
			            //"yFormatNumberScale":"0",

			            // 기본 레이블 폰트설정
			            "baseFont": chartFont,
				        "baseFontSize": chartFontSize,
				        "baseFontColor": chartFontColor,

				        // 데이터 막대의 value값 설정
				        // "valueFontSize": "12",
				        // "rotateValues": "0",
				        // "placeValuesInside": "0",
				        // "valueFontColor": "#000000",
				        "showValues":0,

				        "paletteColors": barColorArr['main']+","+barColorArr['sub_1'],
				        "slantLabels": "0",
				        //"labelDisplay": "wrap",
			            "theme": "fint"
			        },
			        "categories": [{
			            "category": [
				            @for($i = 0, $length = count($accountInfo['pagingFleamarketInfo']); $i < $length; $i++)
				        		{
				        			"label":"{{$accountInfo['pagingFleamarketInfo'][$i]->flea_name}}"
				        		},
				        	@endfor
			        	]
			        }],
			        "dataset": [{
			            "seriesname": "총 수익",
			            "data": [
				            @for($i = 0, $length = count($accountInfo['pagingFleamarketInfo']); $i < $length; $i++)
				        		{
				        			"value":"{{$accountInfo['pagingFleamarketInfo'][$i]->account}}"
				        		},
				        	@endfor
			            ]
			        }]
			    }
			});

		    fusioncharts.render();
		});	

		$('#accountBtn').click(function(){

			if($('.account_select option:selected').val() == "per_fleamarket_account"){
				FusionCharts.ready(function(){
				    var fusioncharts = new FusionCharts({
					    type: 'mscolumn2d',
					    renderAt: 'chart-container',
					    width: chartWidth,
					    height: chartHeight,
					    dataFormat: 'json',
					    dataSource: {
					        "chart": {
					        	//레이블 값 및 단위 등 설정
					        	//"yaxismaxvalue": ,
					            "caption": $('.account_select option:selected').text(),
					            "subcaption": "<br><br>",
					            "xAxisName": "<br>",
					            "yAxisName": "",
					            "numberPrefix": '￦',
					            //"thousandSeparator": ",",
					            "formatNumberScale": "0",
					            "showPlotBorder" : 1,
					            "plotBorderColor":"#ffffff",
					            "plotFillAlpha":plotFillAlpha,
					            //"yFormatNumberScale":"0",

					            // 기본 레이블 폰트설정
					            "baseFont": chartFont,
						        "baseFontSize": chartFontSize,
						        "baseFontColor": chartFontColor,

						        // 데이터 막대의 value값 설정
						        // "valueFontSize": "12",
						        // "rotateValues": "0",
						        // "placeValuesInside": "0",
						        // "valueFontColor": "#000000",
						        "showValues":0,

						        "paletteColors": barColorArr['main']+","+barColorArr['sub_1'],
						        "slantLabels": "0",
						        //"labelDisplay": "wrap",
					            "theme": "fint"
					        },
					        "categories": [{
					            "category": [
						            @for($i = 0, $length = count($accountInfo['pagingFleamarketInfo']); $i < $length; $i++)
						        		{
						        			"label":"{{$accountInfo['pagingFleamarketInfo'][$i]->flea_name}}"
						        		},
						        	@endfor
					        	]
					        }],
					        "dataset": [{
					            "seriesname": "총 수익",
					            "data": [
						            @for($i = 0, $length = count($accountInfo['pagingFleamarketInfo']); $i < $length; $i++)
						        		{
						        			"value":"{{$accountInfo['pagingFleamarketInfo'][$i]->account}}"
						        		},
						        	@endfor
					            ]
					        }]
					    }
					});

				    fusioncharts.render();
				});	
			}

			if($('.account_select option:selected').val() == "goods_account"){
				FusionCharts.ready(function(){
				    var fusioncharts = new FusionCharts({
					    type: 'mscolumn2d',
					    renderAt: 'chart-container',
					    width: chartWidth,
					    height: chartHeight,
					    dataFormat: 'json',
					    dataSource: {
					        "chart": {
					        	//레이블 값 및 단위 등 설정
					        	//"yaxismaxvalue": ,
					            "caption": $('.account_select option:selected').text(),
					            "subcaption": "<br><br>",
					            "xAxisName": "<br>",
					            "yAxisName": "",
					            "numberPrefix": '￦',
					            //"thousandSeparator": ",",
					            "formatNumberScale": "0",
					            "showPlotBorder" : 1,
					            "plotBorderColor":"#ffffff",
					            "plotFillAlpha":plotFillAlpha,
					            //"yFormatNumberScale":"0",

					            // 기본 레이블 폰트설정
					            "baseFont": chartFont,
						        "baseFontSize": chartFontSize,
						        "baseFontColor": chartFontColor,

						        // 데이터 막대의 value값 설정
						        // "valueFontSize": "12",
						        // "rotateValues": "0",
						        // "placeValuesInside": "0",
						        // "valueFontColor": "#000000",
						        "showValues":0,

						        "paletteColors": barColorArr['main']+","+barColorArr['sub_1'],
						        "slantLabels": "0",
						        //"labelDisplay": "wrap",
					            "theme": "fint"
					        },
					        "categories": [{
					            "category": [
						            @for($i = 0, $length = count($accountInfo['pagingGoodsInfo']); $i < $length; $i++)
						        		{
						        			"label":"{{$accountInfo['pagingGoodsInfo'][$i]->name}}"
						        		},
						        	@endfor
					        	]
					        }],
					        "dataset": [{
					            "seriesname": "총 수익",
					            "data": [
						            @for($i = 0, $length = count($accountInfo['pagingGoodsInfo']); $i < $length; $i++)
						        		{
						        			"value":"{{$accountInfo['pagingGoodsInfo'][$i]->account}}"
						        		},
						        	@endfor
					            ]
					        }]
					    }
					});

				    fusioncharts.render();
				});	
			}

			if($('.account_select option:selected').val() == "month_account"){
				
			}

			if($('.account_select option:selected').val() == "year_account"){
				
			}
		});

		$('.fleaSelect_option').click(function(){

			$('.account_th').remove();

			@for($i = 0, $length1 = count($accountInfo['fleamarketInfo']); $i < $length1; $i++)
				if($(this).text() == "{{$accountInfo['fleamarketInfo'][$i]->flea_name}}"){
					@for($j = 0, $length2 = count($accountInfo['thInfo']); $j < $length2; $j++)
						
						if({{$accountInfo['fleamarketInfo'][$i]->id}} == {{$accountInfo['thInfo'][$j]->flea_id}}){

							var div = "<div class='text-center account_BottomBox account_th'><a href='/account/seller/{{$accountInfo['fleamarketInfo'][$i]->id}}/th/{{$accountInfo['thInfo'][$j]->id}}'>{{$accountInfo['fleamarketInfo'][$i]->flea_name}} {{$accountInfo['thInfo'][$j]->th}}차</a></div>";
							
							$('.account_thList').append(div);
						}
					@endfor
				}
			@endfor
		});

	});
	
</script>
<body>


	<div class="account_header">
		<h1>벼룩 정산</h1>
		<hr style="border: 1px solid #a0a0a0; width: 1190px;">	
	</div>
	
	<br>
	<div class="account_wrapper"> 
	<!--정산 wrapper-->
		<div class="account_leftArea">
			<div class="text-center account_divBox account_fleaName"> 
				<a href="/account/seller"> 전체보기 </a> 
			</div>
			<!-- <div class="text-center account_divBox account_fleaName fleaSelect" style="margin-top: 10px;"> 
				플리마켓 선택
			</div> -->
			<select class="selectpicker fleaSelect" style="margin-top: 10px;" data-width="100%" data-style="btn-danger">
  				<option>플리마켓 선택</option>
  				@for($i = 0, $length = count($accountInfo['fleamarketInfo']); $i < $length; $i++)
  					<option class="fleaSelect_option">{{$accountInfo['fleamarketInfo'][$i]->flea_name}}</option>	
  				@endfor
			</select>

			<!--플레마켓 전체 정산 버튼-->
			<div class="account_divBox account_thList">
			<!--플레마켓 회차별 리스트--> 
				
					<div class="text-center account_BottomBox account_th">
						선택된 플리마켓 없음
					</div>	
			</div>
		</div>
		
		<div class="account_accountArea account_divBox">
			<div style="margin-left: 10px; margin-top: 30px; height: 60px;">
				<select class="account_select account_divBox" style="width: 180px; height: 31px;">
					<option value="per_fleamarket_account">플리마켓별 수익</option>
					<option value="goods_account">물품 전체 판매 수익</option>
					<option value="month_account">판매자 월별 결산</option>
					<option value="year_account">판매자 년도별 결산</option>
				</select>
				<button class="btn btn-default" id="accountBtn" style="margin-top: -3px;">확인</button>
				
			</div>
			<div style="margin-left: 10px;" id="chart-container"></div>
			<br/>
			<div class="text-center flea_pagination" style="margin: 0 auto; width: 100%;">
			{{$accountInfo['pagingFleamarketInfo']->Links()}}
				
			</div>
			<div class="text-center month_pagination" style="margin: 0 auto; width: 100%;">
			2
				
			</div>
			<div class="text-center year_pagination" style="margin: 0 auto; width: 100%;">
			3
				
			</div>
		</div>
		<div class="account_detailArea account_divBox">
			<div class="text-center detailArea_header account_BottomBox">{{$accountInfo['userInfo']['nick_name']}} 공방</div>
			<div class="detailArea_body">
				<div class="account_BottomBox detailArea_content">
					<li class="text-left detailArea_content_title">플리마켓 최고 실적</li>
					<li class="text-right detailArea_content_text">{{number_format($accountInfo['maxAcc'])}} 원</li>
				</div>
				<div class="account_BottomBox detailArea_content">
					<li class="text-left detailArea_content_title">플리마켓 최저 실적</li>
					<li class="text-right detailArea_content_text">{{number_format($accountInfo['minAcc'])}} 원</li>
				</div>
				<br>
				<br>
				<div class="account_BottomBox detailArea_content">
					<li class="text-left detailArea_content_title">판매 총수익</li>
					<li class="text-right detailArea_content_text">{{number_format($accountInfo['allAccount'])}} 원</li>
				</div>
				<div class="account_BottomBox detailArea_content">
					<li class="text-left detailArea_content_title">플리마켓별 판매수수료 총 차액</li>
					<li class="text-right detailArea_content_text">{{number_format($accountInfo['commAccount'])}} 원</li>
				</div>
				<div class="account_BottomBox detailArea_content">
					<li class="text-left detailArea_content_title">플리마켓별 부스비 총 차액</li>
					<li class="text-right detailArea_content_text">{{number_format($accountInfo['boothFeeAccount'])}} 원</li>
				</div>
				<div class="account_BottomBox detailArea_content">
					<li class="text-left detailArea_content_title">기타 수익</li>
					<li class="text-right detailArea_content_text">0 원</li>
				</div>	
			</div>
			<div class="detailArea_footer">
				<li class="text-left" style="width: 100%; margin-top: 10px; ">총 정산액</li>
				<li class="text-right" style="width: 100%; margin-top: 3px;">
				{{number_format($accountInfo['finalAccount'])}} 원</li>
			</div>
		</div>
	</div>
	<br/>
	<br/>
	<br/>
</body>
@endsection