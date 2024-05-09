<?php
include_once '../../operations.php';
if(insert_edit_form("trainings")){
    header("location: ../?page=education/trainings");
}