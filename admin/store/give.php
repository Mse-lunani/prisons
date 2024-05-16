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
        <h2>You are giving inmate:<?= $row['firstname']." ".$row['lastname'] ?> an item</h2>
    </div>
</div>
<div class="row mt-n4 justify-content-center align-items-center flex-column">
    <div class="card">
        <form method="post" action="model/add_give.php">
            <input type="hidden" value="<?= $row['id'] ?>" name="inmate_id">
            <div class = "card-body">
                <div class="form-group">
                    <label>Item</label>
                    <select required class="form-control" name = "name">
                        <option value="">Choose an option</option>
                        <?php
                        $sql = "select * from store_items order by id desc";
                        $items = select_rows($sql);
                        foreach ($items as $item){
                        ?>
                            <option><?= $item['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <?php
                input("Quantity","quantity","number",true);

                ?>
            </div>
            <?php submit(); ?>
        </form>
    </div>
</div>
