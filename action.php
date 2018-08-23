<?php
$action = $_REQUEST['action'];
if ($action == 'upload') {
	$file_name = "upload/" . time() . ".png";
	$b = move_uploaded_file($_FILES["ticket_bg"]["tmp_name"], $file_name);
	echo $file_name;
}

if ($action == 'save') {
	$tpl = $_REQUEST['tpl'];
	$html_header = '<!DOCTYPE html><html><head lang="en"><meta charset="UTF-8"><title>Tdrag</title><link href="demo.css" type="text/css" rel="stylesheet"> <script type="text/javascript" src="JavaScript/LodopFuncs.js"> </script> <style> .boxList{ border: 1px solid #ff0033; height: 387px; position: relative; width: 600px; background: url(/DP-Ticket/image/default.png) no-repeat center center;
		margin: 0px auto;} .title { cursor: move; } .item textarea { background-color: transparent; overflow:hidden; resize:none; } textarea { margin-left: 10px; } </style></head>';
	$foot = '</body></html>';
	$file_name = "tpl/tpl-" . time() . ".html";
	$file = fopen($file_name, 'w');
	fwrite($file, $html_header . $tpl . $foot);
	fclose($file);
	echo $file_name;
}
