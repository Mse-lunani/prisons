<?php
require_once('./../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $id = $_GET['id'];
    $qry = $conn->query("SELECT * from officers where id =  '$id'");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }else{
        echo '<script>alert("officer ID is not valid."); location.replace("./?page=officers")</script>';
    }
}else{
    echo '<script>alert("officer ID is Required."); location.replace("./?page=officers")</script>';
}
?>
<style>
    #uni_modal .modal-footer{
        display:none;
    }
</style>
<div class="container-fluid">
    <dl>
        <dt class="text-muted">Ofiicer</dt>
        <dd class="pl-4"><?= isset($name) ? $name : "" ?></dd>
        <dt class="text-muted">Email</dt>
        <dd class="pl-4"><?= isset($email) ? $email : "" ?></dd>
        <dt class="text-muted">Date created</dt>
        <dd class="pl-4"><?= isset($date_created) ? $date_created : "" ?></dd>

    </dl>
</div>
<hr class="mx-n3">
<div class="text-right pt-1">
    <button class="btn btn-sm btn-flat btn-light bg-gradient-light border" type="button" data-bs-dismiss="modal"><i class="fa fa-times"></i> Close</button>
</div>