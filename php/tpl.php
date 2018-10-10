<?php
$action = $_REQUEST['act'];
if ($action == 'delete') {
    $rel = unlink('../tpl/' . $_REQUEST['file']);
    if ($rel == 1) {
        $json = [
            'status' => '1',
            'message' => '模板删除成功！'
        ];
        echo json_encode($json);
    }
} else {
    echo '<script>window.location.href="edit.php?act=' . $action . '&file=' . $_REQUEST['file'] . '";</script>';
}