<?php
require_once('./../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT m.*, i.code, concat(i.lastname,', ', i.firstname, coalesce(concat(' ', i.middlename), '')) as `inmate` from `movement` m 
    inner join inmate_list i on m.inmate_id = i.id where m.id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }else{
        echo '<script>alert("visit ID is not valid."); location.replace("./?page=visits")</script>';
    }
}else{
    echo '<script>alert("visit ID is Required."); location.replace("./?page=visits")</script>';
}
?>
<style>
    #uni_modal .modal-footer{
        display:none;
    }
</style>
<div class="container-fluid">
    <dl>
        <dt class="text-muted">Inmate</dt>
        <dd class="pl-4"><?= isset($code) && isset($inmate) ? $code.' - '.$inmate : "" ?></dd>
        <dt class="text-muted">Location</dt>
        <dd class="pl-4"><?= isset($place) ? $place : "" ?></dd>
        <dt class="text-muted">Relation</dt>
        <dd class="pl-4"><?= isset($reason) ? $reason : "" ?></dd>

    </dl>
</div>
<hr class="mx-n3">
<div class="text-right pt-1">
    <button class="btn btn-sm btn-flat btn-light bg-gradient-light border" type="button" data-bs-dismiss="modal"><i class="fa fa-times"></i> Close</button>
</div>