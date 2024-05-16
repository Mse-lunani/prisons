<?php
include_once '../../operations.php';
$id = security_get("id");
delete("inmate_items",$id);
header("Location: ../?page=store/inmate_onboard_history&id=".$_GET['inmate_id']);