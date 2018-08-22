<?php
$tpl = $_REQUEST['tpl'];
$html_header = '<!DOCTYPE html><html><head lang="en"><meta charset="UTF-8"><title>Tdrag</title><link href="demo.css" type="text/css" rel="stylesheet"> <script type="text/javascript" src="JavaScript/LodopFuncs.js"> <style> .boxList{ border: 1px solid #ff0033; height: 348px; position: relative; width: 595px; background: url(./image/ticket.png) no-repeat center center; } .title { cursor: move; } .item textarea { background-color: transparent; overflow:hidden; resize:none; } </style></head>';
$foot = '</body></html>';
$file = fopen('./tpl.html', 'w');
fwrite($file, $html_header . $tpl . $foot);
fclose($file);