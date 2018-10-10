<?php
$action = $_REQUEST['act'];
if ($action == 'add') {
    include('../html/head.html.php');
    include('../html/rear.html.php');
} else if ($action == 'edit') {
    $tpl = '../tpl/' . $_REQUEST['file'];
    include('../html/head.html.php');
    include($tpl);
    include('../html/rear.html.php');
}