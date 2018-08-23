<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<title>DP-Ticket</title>
	<link rel="icon" href="./favicon.ico" type="image/x-icon" />
	<style>
	.boxList{
		border: 1px solid #ff0033;
		height: 387px;
		position: relative;
		width: 600px;
		background: url(/DP-Ticket/image/default.png) no-repeat center center;
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
		text-align: center;
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
		</div>
		<div class="options">
			<div>
				<form action="" id="bg-form">
					<input type="file" name="ticket_bg" accept="image/png" />
					<a id="upload-bg" href="javascript:;">确定上传票据背景</a>
				</form>
			</div>
			<br>
			<div>
				<label>票据模板宽度</label>
				<input type="text" id="ticket-width" class="ticket-set" data-attr="width"> px
			</div>
			<br>
			<div>
				<label>票据模板高度</label>
				<input type="text" id="ticket-height" class="ticket-set" data-attr="height"> px
			</div>
			<br>
			<div>
				<button id="add-input">添加输入框</button>
				<button id="save-tpl">保存模板</button>
			</div>
		</div>
		<hr>
		<div class="explain">
			<ul>
				<li>这里是说明</li>
			</ul>
		</div>
	</div>
</body>
<script>
	$(document).ready(function() {
		$("#ticket-width").val($(".boxList").width());
		$("#ticket-height").val($(".boxList").height());
		$(function(){
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
			$('.boxList').append('<div class="item"><img class="title" src="/DP-Ticket/image/move.png" alt="" width="10" height="10"><textarea cols="5" style="height: 20px;"></textarea></div>');
		});
		$(".ticket-set").change(function() {
			$(".boxList").css($(this).data("attr"), $(this).val());

		});
		$("#upload-bg").click(function() {
			var form_data = new FormData($('#bg-form')[0]);
			$.ajax({
				type: "post",
				url: "action.php?action=upload",
				cache: false,
				processData: false,
				contentType: false,
				async: false,
				data: form_data,
				success: function (data) {
					$(".boxList").css("background", "url(/DP-Ticket/" + data + ") no-repeat center center");
				}
			});
		});
		$("#save-tpl").click(function() {
			$('.item img').remove();
			$.ajax({
				type: "POST",
				async: false,
				url: "action.php?action=save",
				data: {tpl:$(".boxList").prop("outerHTML")},
				success: function(data) {
					alert("模板存储路径：/DP-Ticket/" + data);
				}
			});
		});

	});
</script>
</html>