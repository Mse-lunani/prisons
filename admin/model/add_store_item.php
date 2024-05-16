<?php
include_once '../../operations.php';
if(insert_edit_form("store_items")){
    header("location: ../?page=store/items");
}