<?php
include_once '../../operations.php';
$conn = connect();
$m['status'] = 'failed';
$m['msg'] = 'Error';
$m['data'] = $_POST;
$m['con'] = $conn;
if($_POST['id'] == ""){
    unset($_POST['id']);
}

if(insert_edit_form("prison_types")) {
    $sql = "select * from prison_types order by id desc ";
    $rows = select_rows($sql);
    $id = $rows[0]['id'];
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }
    $m['status'] = 'success';
    $m['msg'] = 'Data successfully saved.';
    $m['id'] = $id;
}
echo json_encode($m);