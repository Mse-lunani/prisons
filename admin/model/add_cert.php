<?php
include_once '../../operations.php';
$_POST['document'] = upload_docs("document","../../uploads/");
if(insert_edit_form("inmate_certs")){
    header("location: ../?page=education/inmate_certifications&id=".$_POST['inmate_id']);
}