<?php
include_once '../../operations.php';

$results = $_POST['result'];
unset($_POST['result']);

if(insert_edit_form("test")){
    $sql = "select * from test order by id desc limit 1";
    $row = select_rows($sql);
    $arr['test_id'] = $row[0]['id'];
    foreach ($results as $result){
       $arr['result'] = $result;
       build_sql_insert("results",$arr);

    }
}
header("Location: ../?page=medical/create_test&suc");