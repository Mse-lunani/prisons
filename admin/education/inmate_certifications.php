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
        <h2>Certificates for <?= $row['firstname']." ".$row['lastname'] ?></h2>
        <a href="?page=education/create_certs&id=<?= $id ?>" class="btn btn-primary">Create New Certificate</a>
    </div>
</div>

<?php
$sql = "select * from inmate_certs where inmate_id = '$id'";
$certs = select_rows($sql);

if(empty($certs)){
    echo "<div class='alert alert-info'>No certifications</div>";
}else{
?>
<div class="row mt-n4 justify-content-center align-items-center flex-column">
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-hover datatables-basic" id="list">
                <colgroup>
                    <col width="5%">
                    <col width="20%">
                    <col width="20%">
                    <col width="30%">
                    <col width="10%">
                    <col width="15%">
                </colgroup>
                <thead>
                <tr>
                    <th>#</th>
                    <th>Date Created</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Issuing Organization</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                foreach($certs as $row){
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $i++; ?></td>
                        <td><?php echo date("Y-m-d H:i",strtotime($row['date_created'])) ?></td>
                        <td class=""><?= $row['name'] ?></td>
                        <td class=""><?= $row['course'] ?></td>
                        <td class=""><?= $row['school'] ?></td>
                        <td>
                            <a href="../uploads/<?= $row['document'] ?>" target="_blank" class="btn btn-sm btn-primary">
                                <i class="bx bx-download"></i>
                            </a>
                            <a href="model/delete_cert.php?id=<?= $row['id'] ?>&inmate_id=<?= $row['inmate_id'] ?>"  class="btn btn-sm btn-danger">
                                <i class="bx bx-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php } ?>