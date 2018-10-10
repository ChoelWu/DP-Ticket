<?php
$action = $_REQUEST['action'];
if ($action == 'upload') {
    $file_name = "../upload/" . time() . ".png";
    $b = move_uploaded_file($_FILES["ticket_bg"]["tmp_name"], $file_name);
    echo $file_name;
}

if ($action == 'save') {
    $tpl = $_REQUEST['tpl'];
    $data_source = json_encode($_REQUEST['data_source']);
    $time = time();
    $file_name = "../data/data-" . $time . ".json";
    $file = fopen($file_name, 'w');
    fwrite($file, $data_source);
    fclose($file);
    $file_name = "../tpl/tpl-" . $time . ".html";
    $file = fopen($file_name, 'w');
    fwrite($file, $tpl);
    fclose($file);
    echo $file_name;
}
