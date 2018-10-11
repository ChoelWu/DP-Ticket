<?php
//if (!empty($_GET['has_tpl'])) {
//    $tpl = './tpl/' . $_GET['has_tpl'];
//    include($tpl);
//}
//
//$files = scandir('./tpl/');
//unset($files['0']);
//unset($files['1']);
//$options = '';
//foreach ($files as $file) {
//    $options .= '<option>' . $file . '</option>';
//}
$req = $_REQUEST;
$act = $_REQUEST['act'];
$file = $_REQUEST['file'];
if('preview' == $act) {
    include('../html/pre_head.html.php');
    include('../tpl/' . $file);
    include('../html/pre_rear.html.php');
} else if ('print' == $act) {
    echo "I'm print!";
}