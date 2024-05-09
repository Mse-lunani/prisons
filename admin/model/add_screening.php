<?php
include_once '../../operations.php';

$results = $_POST['result'];
$tests = $_POST['test'];

unset($_POST['result']);
unset($_POST['test']);

if(insert_edit_form("inmate_screening_order")){
    $sql = "select * from inmate_screening_order order by id desc limit 1";
    $row = select_rows($sql)[0];
    $arr['screening_id'] = $row['id'];
    foreach ($tests as $key => $test){
        $arr['test_id'] = $test;
        $arr['result_id'] = $results[$key];
        build_sql_insert("inmate_screening_test",$arr);
    }
}
header("Location: ../?page=medical/inmate_screen_history&id=".$_POST['inmate_id']);