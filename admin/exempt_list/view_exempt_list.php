<?php
require_once('./../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from exempt_list where id = '{$_GET['id']}' and delete_flag = 0 ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }else{
        echo '<script>alert("exempt_list id is not valid."); location.replace("./?page=exempt_list")</script>';
    }
}else{
    echo '<script>alert("exempt_list ID is Required."); location.replace("./?page=exempt_list")</script>';
}
?>
<style>
    #uni_modal .modal-footer{
        display:none;
    }
</style>
<div class="container-fluid">
    <dl>

        <dt class="text-muted">Name</dt>
        <dd class="pl-4"><?= isset($name) ? $name : "" ?></dd>


    </dl>
</div>
<hr class="mx-n3">
<div class="text-right pt-1">
    <button class="btn btn-sm btn-flat btn-light bg-gradient-light border" type="button" data-bs-dismiss="modal"><i class="fa fa-times"></i> Close</button>
</div>