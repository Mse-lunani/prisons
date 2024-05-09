<?php
include_once '../../operations.php';
$id = security_get("id");
$sql = "select * from results where test_id = '$_GET[id]'";
$row = select_rows($sql);
foreach ($row as $item){
    delete("results",$item['id']);
}
delete("test",$id);
header("Location: ../?page=medical/view_tests");