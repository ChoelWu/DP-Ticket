<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<title>DP-Ticket</title>
	<link rel="icon" href="./favicon.ico" type="image/x-icon" />
	<link href="demo.css" type="text/css" rel="stylesheet">
	<style>
	.boxList{
		border: 1px solid #ff0033;
		height: 348px;
		position: relative;
		width: 595px;
		background: url(./image/ticket.png) no-repeat center center;
		margin: 0px auto;
	}
	.title {
		cursor: move;
	}
	h1 {
		text-align: center;
	}
	.options {
		text-align: center;
		margin-top: 20px;
	}
	.explain {
		color: #ff0000;
	}
</style>
</head>
<script type="text/javascript" src="JavaScript/jquery1.7.2.js"></script>
<script type="text/javascript" src="JavaScript/Tdrag.js"></script>
<body>
	<div class="body">
		<div class="head">
			<h1>DP-Ticket</h1>
		</div>
		<div class="boxList">
			<div class='item'>
				<img class="title" src="./image/move.png" width="10" height="10">
				<textarea cols="5" style="height: 20px;"></textarea>
			</div>
		</div>
		<div class="options">
			<div>
				<button>上传票据背景</button>
			</div>
			<br>
			<div>
				<label>票据模板宽度</label>
				<input type="text" id="ticket-width"> px
			</div>
			<br>
			<div>
				<label>票据模板高度</label>
				<input type="text" id="ticket-height"> px
			</div>
			<br>
			<div>
				<button id="add-input">添加输入框</button>
				<button id="console-log">保存模板</button>
			</div>
		</div>
		<hr>
		<div class="explain"></div>
	</div>
</body>
<script>
	$(document).ready(function() {
		jQuery(function(){
			$(".boxList").delegate(".item","mouseover",function(){
				$(".boxList .item").Tdrag({
					scope:".boxList",
					handle:".title"
				});
				$(".title").mouseover(function() {
					$(this).css("");
				});
			});
		});
		$('#add-input').click(function() {
			$('.boxList').append('<div class="item"><img class="title" src="./image/move.png" alt="" width="10" height="10"><textarea cols="5" style="height: 20px;"></textarea></div>');
		});
		$("#console-log").click(function() {
			$('.item img').remove();
			$.ajax({
				type: "POST",
				async: false,
				url: "save.php",
				data: {tpl:$(".boxList").prop("outerHTML")},
				success: function(data) {
					console.log(data);
				}
			});
		});
	});
</script>
</html>