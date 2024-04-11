<?php
header("content-type:application/json");
include_once '../operations.php';
insert_edit_form("device_prisoner");
echo json_encode(array("status"=>true,"msg"=>"Device attached successfully","data"=>$_POST));