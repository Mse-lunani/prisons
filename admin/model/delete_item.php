<?php
include_once '../../operations.php';
$id = security_get("id");
delete("store_items",$id);
header("Location: ../?page=store/items");