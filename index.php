<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<title>Tdrag</title>
	<link href="demo.css" type="text/css" rel="stylesheet">
	<style>
		.boxList{
			border: 1px solid #ff0033;
			height: 348px;
			position: relative;
			width: 595px;
			background: url(./image/ticket.png) no-repeat center center;
		}
		.title {
			cursor: move;
		}
	</style>
</head>
<script type="text/javascript" src="JavaScript/jquery1.7.2.js"></script>
<script type="text/javascript" src="JavaScript/Tdrag.js"></script>
<body>
	<div class="body">
		<div class="boxList">
			<div class='item'>
				<img class="title" src="./image/move.png" width="10" height="10">
				<textarea cols="5" style="height: 20px;"></textarea>
			</div>
		</div>
		<div>
			<div>
				<button id="add-input">添加文本框</button>
				<button id="console-log">保存模板</button>
			</div>
		</div>
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