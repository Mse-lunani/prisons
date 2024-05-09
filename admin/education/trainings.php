
    <div class="mb-3 content py-3 bg-gradient-navy px-3">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Trainings</h2>
            <a href="?page=education/create_training" class="btn btn-primary">Create New training</a>
        </div>
    </div>

<?php
$sql = "select * from trainings";
$certs = select_rows($sql);

if(empty($certs)){
    echo "<div class='alert alert-info'>No Trainings</div>";
}else{
    ?>
    <div class="row mt-n4 justify-content-center align-items-center flex-column">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-hover datatables-basic" id="list">

                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Date Created</th>
                        <th>Name</th>
                        <th>Duration</th>
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
                            <td class=""><?= $row['duration'] ?></td>

                            <td>
                                <a href="?page=education/enrol_inmate&id=<?=$row['id'] ?>" class="btn btn-sm btn-primary">
                                    <i class="bx bxs-info-circle"></i>
                                </a>
                                <a href="model/delete_training?id=<?= $row['id'] ?>&inmate_id=<?= $row['inmate_id'] ?>"  class="btn btn-sm btn-danger">
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
    <script>
        $(document).ready(function(){
            $('.table').dataTable();
        });
    </script>
