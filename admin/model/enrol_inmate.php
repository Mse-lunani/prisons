<?php
include_once '../../operations.php';
$id = security("training_id");
if(insert_edit_form("enrol_inmate")){
    header("location: ../?page=education/enrol_inmate&id=$id");
}