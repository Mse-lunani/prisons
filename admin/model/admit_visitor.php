<?php
include_once '../../operations.php';
$conn = connect();
$m['status'] = 'failed';
$m['msg'] = 'Error';
$m['data'] = $_POST;
$m['con'] = $conn;

$_POST['file'] = upload_docs("file","../../../uploads");
if(insert_edit_form("admit_visitor")) {
    $sql = "select * from admit_visitor order by id desc ";
    $rows = select_rows($sql);
    $id = $rows[0]['visitor_id'];
    $m['status'] = 'success';
    $m['msg'] = 'Data successfully saved.';
    $m['id'] = $id;
    $arr['status'] = "admitted";
    build_sql_edit("visit_list",$arr,$id);
}
echo json_encode($m);