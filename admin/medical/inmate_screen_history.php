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
        <h2>Screening History for <?= $row['firstname']." ".$row['lastname'] ?></h2>
        <a href="?page=medical/screen_inmate&id=<?= $id ?>" class="btn btn-primary">Create New Screening</a>
    </div>
</div>

<?php
$sql = "select * from inmate_screening_order where inmate_id = '$id'";
$orders = select_rows($sql);

if(empty($orders)){
    echo "<div class='alert alert-info'>No Screening History</div>";
}

foreach ($orders as $item){
    $sql = "select * from inmate_screening_test where screening_id = '$item[id]'";
    $screenings = select_rows($sql);
    ?>
    <div class="row mt-n4 mb-2 justify-content-center align-items-center flex-column">
        <div class="card">
            <div class="card-body">
                <h5>Screening Order</h5>
                <table class="table table-striped table-hover">
                    <thead>
                    <th>Date</th>
                    <th>Reason</th>
                    </thead>
                    <tr>
                        <td><?= $item['date'] ?></td>
                        <td><?= $item['reason'] ?></td>
                    </tr>
                </table>
                <h6 class="m-3">Screening Results</h6>
                <table class="table table-striped table-hover">
                    <thead>
                    <th>Test</th>
                    <th>Result</th>
                    </thead>
                    <?php
                    foreach ($screenings as $screening){
                        $sql = "select * from test where id = '$screening[test_id]'";
                        $test = select_rows($sql);
                        $test = $test[0];
                        $sql = "select * from results where id = '$screening[result_id]'";
                        $result = select_rows($sql);
                        $result = $result[0];
                        ?>
                        <tr>
                            <td><?= $test['name'] ?></td>
                            <td><?= $result['result'] ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
<?php } ?>
