<?php
$action = $_REQUEST['act'];
if ($action == 'add') {
    include('../index.html');
}
if ($action == 'edit') {
    include('../index.html');
}
if ($action == 'delete') {
	$rel = unlink ('../tpl/' . $_REQUEST['file']);
	if($rel == 1) {
		$json = [
			'status' => '1',
			'message' => '模板删除成功！'
		];
		echo json_encode($json);
	}
}
?>