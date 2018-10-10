<?php
$action = $_REQUEST['act'];
if ($action == 'add') {
    include('../tpl/default.html');
} else if ($action == 'preview') {
    $tpl = $_REQUEST['file'];
    $html_header = '<!DOCTYPE html><html><head lang="en"><meta charset="UTF-8"><title>DP-Ticket</title><link href="demo.css" type="text/css" rel="stylesheet"> <script type="text/javascript" src="JavaScript/LodopFuncs.js"></script> <style> .boxList{ height: 306px; position: relative; width: 553px; background: url(/DP-Ticket/image/default.png) no-repeat center center;
		margin: 0px auto;} .item textarea { background-color: transparent; overflow:hidden; resize:none; border: none;} .item { padding-left: 10px; } </style></head><body><div class="body">';
    $foot = '</div></body></html>';
    echo $html_header;
    include('../tpl/' . $tpl);
    echo $foot;
} else if ($action == 'edit') {
    $tpl = $_REQUEST['file'];
    $html_header = '<!DOCTYPE html><html><head lang="en"><meta charset="UTF-8"><title>DP-Ticket</title><link href="demo.css" type="text/css" rel="stylesheet"> <script type="text/javascript" src="JavaScript/LodopFuncs.js"></script> <style> .boxList{ height: 306px; position: relative; width: 553px; background: url(/DP-Ticket/image/default.png) no-repeat center center;
			margin: 0px auto;} .item textarea { background-color: transparent; overflow:hidden; resize:none; border: none;} .item { padding-left: 10px; } </style></head><body><div class="body">';
    $foot = '</div></body></html>';
    echo $html_header;
    include('../tpl/' . $tpl);
    echo $foot;
}
?>