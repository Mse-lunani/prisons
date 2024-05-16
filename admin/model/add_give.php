<?php
include_once '../../operations.php';
$id = security("inmate_id");
if(insert_edit_form("inmate_items_from_prison")){
    header("location: ../?page=store/inmate_onboard_history&id=$id");
}