<?php
include_once '../../operations.php';
$id = security_get("id");
delete("inmate_job",$id);
header("location: ../?page=education/inmate_job&id=".$_GET['job_id']);