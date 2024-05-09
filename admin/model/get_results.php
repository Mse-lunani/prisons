<?php
include_once '../../operations.php';
$id = security("id");
$sql = "select * from results where test_id = '$id'";
$row = select_rows($sql);
foreach ($row as $item){
    ?>
    <option value="<?= $item['id'] ?>">
        <?= $item ['result'] ?>
    </option>
<?php
}