<?php
include_once '../../operations.php';
if(insert_edit_form("jobs")){
    header("location: ../?page=education/jobs");
}