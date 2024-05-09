<?php
include_once '../../operations.php';
$id = security_get("id");
delete("enrol_inmate",$id);
header("location: ../?page=education/enrol_inmate&id=".$_GET['training_id']);