<?php
$action = $_REQUEST['act'];
if ($action == 'add') {
    include('../html/head.html');
    include('../html/rear.html');
} else if ($action == 'edit') {
    $tpl = '../tpl/' . $_REQUEST['file'];
    include('../html/head.html');
    include($tpl);
    include('../html/rear.html');
}
?>