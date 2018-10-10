<?php
$files = scandir('../tpl/');
unset($files['0']);
unset($files['1']);
$trs = '';
foreach ($files as $file) {
    $trs .= '<tr><td>' . $file . '</td><td>tpl/' . $file . '</td><td><a href="./tpl.php?act=edit&file=' . $file . '">修改</a> | <a href="javascript:delete_tpl(\'' . $file . '\');">删除</a></td></tr>';
}
include("../html/index.html.php");