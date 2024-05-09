<?php
include_once '../../operations.php';
$id = security("job_id");
if(insert_edit_form("inmate_job")){
    header("location: ../?page=education/inmate_job&id=$id");
}