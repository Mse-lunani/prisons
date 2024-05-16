<?php
$id = security_get("id");
$sql = "select * from inmate_list where id = '$id'";
$row = select_rows($sql);
if(!empty($row)){
    $row = $row[0];
}else{
    exit();
}
?>


<div class="content py-3 bg-gradient-navy px-3">
    <div class="d-flex justify-content-between align-items-center">
        <h2>Items inmate:<?= $row['firstname']." ".$row['lastname'] ?> has brought with him</h2>
    </div>
</div>
<div class="row mt-n4 justify-content-center align-items-center flex-column">
    <div class="card">
        <form method="post" action="model/add_take.php">
            <input type="hidden" value="<?= $row['id'] ?>" name="inmate_id">
            <div class = "card-body">
                <?php
                input("Name","name","text",true);
                textarea_input("Description","description");
                ?>
            </div>
            <?php submit(); ?>
        </form>
    </div>
</div>
