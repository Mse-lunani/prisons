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

if(insert_edit_form("inmate_wallet")) {
    $sql = "select * from inmate_wallet order by id desc ";
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