<?php
$action = $_REQUEST['action'];
if ($action == 'upload') {
    $file_name = "upload/" . time() . ".png";
    $b = move_uploaded_file($_FILES["ticket_bg"]["tmp_name"], $file_name);
    echo $file_name;
}

if ($action == 'save') {
    $tpl = $_REQUEST['tpl'];
    $data_source = json_encode($_REQUEST['data_source']);
    $html_header = '<!DOCTYPE html><html><head lang="en"><meta charset="UTF-8"><title>DP-Ticket</title><link href="demo.css" type="text/css" rel="stylesheet"> <script type="text/javascript" src="JavaScript/LodopFuncs.js"></script> <style> .boxList{ height: 306px; position: relative; width: 553px; background: url(/DP-Ticket/image/default.png) no-repeat center center;
		margin: 0px auto;} .item textarea { background-color: transparent; overflow:hidden; resize:none; } .item { padding-left: 10px; } </style></head><body><div class="body">';
    $foot = '</div></body></html>';
    $time = time();
    $file_name = "data/data-" . $time . ".json";
    $file = fopen($file_name, 'w');
    fwrite($file, $data_source);
    fclose($file);
    $file_name = "tpl/tpl-" . $time . ".html";
    $file = fopen($file_name, 'w');
    fwrite($file, $html_header . $tpl . $foot);
    fclose($file);
    echo $file_name;
}
