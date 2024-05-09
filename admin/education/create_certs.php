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
        <h2>Create New Education History for <?= $row['firstname']." ".$row['lastname'] ?></h2>
    </div>
</div>
<div class="row mt-n4 justify-content-center align-items-center flex-column">
    <div class="card">
        <form method="post" enctype="multipart/form-data" action="model/add_cert.php">
            <input type="hidden" value="<?= $row['id'] ?>" name="inmate_id">

            <div class = "card-body">
                <?php
                input("Name of Certification","name","text",true);
                input("Course","course","text",true);
                input("Issuing Organization","school","text",true);
                input("Date Graduated","date_graduated","date",true);
                input("File","document","file",true);
                ?>


            </div>
            <?php submit(); ?>
        </form>
    </div>
</div>

