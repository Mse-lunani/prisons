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
<div class="mb-3 content py-3 bg-gradient-navy px-3">
    <div class="d-flex justify-content-between align-items-center">
        <h2>Inmate Retrieved Item History for <?= $row['firstname']." ".$row['lastname'] ?></h2>
        <a href="?page=store/take&id=<?= $id ?>" class="btn btn-primary">Retrieve inmate item</a>
    </div>
</div>

<?php
$sql = "select * from inmate_items where inmate_id = '$id'";
$items = select_rows($sql);

if(empty($items)){
    echo "<div class='alert alert-info'>No inmate items yet</div>";
} else{
?>
<div class="row mt-n4 mb-2 justify-content-center align-items-center flex-column">
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                <th>Name of item</th>
                <th>Description</th>
                <th>Action</th>
                </thead>
                <?php
                foreach ($items as $item){
                    ?>
                    <tr>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['description'] ?></td>
                        <td>
                            <a href="model/delete_inmate_item.php?id=<?= $item['id'] ?>&inmate_id=<?= $item['inmate_id'] ?>" class="btn btn-danger btn-sm">
                                <i class="bx bxs-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

<?php }  ?>


<div class="mb-3 content py-3 bg-gradient-navy px-3">
    <div class="d-flex justify-content-between align-items-center">
        <h2>Inmate Item History for <?= $row['firstname']." ".$row['lastname'] ?></h2>
        <a href="?page=store/give&id=<?= $id ?>" class="btn btn-primary">Give inmate an item</a>
    </div>
</div>

<?php
$sql = "select * from inmate_items_from_prison where inmate_id = '$id'";
$items = select_rows($sql);

if(empty($items)){
    echo "<div class='alert alert-info'>No inmate items yet</div>";
} else{
    ?>
    <div class="row mt-n4 mb-2 justify-content-center align-items-center flex-column">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                    <th>Name of item</th>
                    <th>Quantity</th>
                    <th>Action</th>
                    </thead>
                    <?php
                    foreach ($items as $item){
                        ?>
                        <tr>
                            <td><?= $item['name'] ?></td>
                            <td><?= $item['quantity'] ?></td>
                            <td>
                                <a href="model/delete_inmate_item2.php?id=<?= $item['id'] ?>&inmate_id=<?= $item['inmate_id'] ?>" class="btn btn-danger btn-sm">
                                    <i class="bx bxs-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>

<?php }  ?>
