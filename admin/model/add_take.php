<?php
include_once '../../operations.php';
$id = security("inmate_id");
if(insert_edit_form("inmate_items")){
    header("location: ../?page=store/inmate_onboard_history&id=$id");
}