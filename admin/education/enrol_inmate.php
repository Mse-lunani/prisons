<?php
$id = security_get("id");
$sql = "select * from trainings where id = '$id'";
$row = select_rows($sql);
if(!empty($row)){
    $row = $row[0];
}else{
    exit();
}
?>
<div class="content py-3 bg-gradient-navy px-3">
    <div class="d-flex justify-content-between align-items-center">
        <h2>Enroll inmates to <?= $row['name'] ?></h2>
    </div>
</div>
<div class="row mt-n4 justify-content-center align-items-center">
    <div class="col-md-4">
    <div class="card">
        <form method ="post" action="model/enrol_inmate.php">
            <input type="hidden" value="<?= $row['id'] ?>" name="training_id">
            <div class="card-body">
               <div class="form-group">
                   <label>Choose an inmate</label>
                   <select name="inmate_id" id="inmate_id" class="form-control  rounded-0" required="required">
                       <option value="">Choose an inmate</option>
                       <?php
                       $inmates = $conn->query("SELECT *,concat(lastname,', ', firstname, coalesce(concat(' ', middlename), '')) as `name` FROM `inmate_list` where `status` = 1 and (date(`date_to`) >= ".date("Y-m-d")." or date_to IS NULL)");
                       while($row = $inmates->fetch_assoc()):
                           ?>
                           <option value="<?= $row['id'] ?>" <?= $row['visiting_privilege'] == 0 ? 'disabled' : '' ?> <?= isset($inmate_id) && $inmate_id == $row['id'] ? 'selected' : '' ?>>Inmate-<?= $row['code'] ?> <?= $row['name'] ?> <?= $row['visiting_privilege'] == 0 ? '(Disallowed)' : '' ?></option>
                       <?php endwhile; ?>
                   </select>
               </div>
            </div>
            <?php submit(); ?>
        </form>
    </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-hover datatables-basic" id="list">

                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Date Created</th>
                        <th>Inmate</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    $sql = "
                    select concat(i.lastname,', ', i.firstname, coalesce(concat(' ', i.middlename), '')) as `name`,t.date_created, t.id, t.training_id from enrol_inmate t inner join inmate_list i on i.id = t.inmate_id where t.training_id = '$id' order by t.date_created desc
                    ";
                    $inmates = select_rows($sql);
                    foreach($inmates as $row){
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $i++; ?></td>
                            <td><?php echo date("Y-m-d H:i",strtotime($row['date_created'])) ?></td>
                            <td class=""><?= $row['name'] ?></td>


                            <td>
                                <a href="model/delete_enrolment.php?id=<?= $row['id'] ?>&training_id=<?= $id ?>"  class="btn btn-sm btn-danger">
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
</div>
<script>
    $(document).ready(function(){
        $('.table').dataTable();
        $('#inmate_id').select2({
            containerCssClass:'form-control form-control-sm rounded-0'
        });
    });
</script>
