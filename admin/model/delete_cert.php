<?php
include_once '../../operations.php';
$id = security_get("id");
delete("inmate_certs",$id);
header("location: ../?page=education/inmate_certifications&id=".$_GET['inmate_id']);