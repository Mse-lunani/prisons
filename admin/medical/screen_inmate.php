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
        <h2>Create New Screening for <?= $row['firstname']." ".$row['lastname'] ?></h2>
    </div>
</div>
<div class="row mt-n4 justify-content-center align-items-center flex-column">
    <div class="card">
        <form method="post" action="model/add_screening.php">
            <input type="hidden" value="<?= $row['id'] ?>" name="inmate_id">

            <div class = "card-body">
                <?php
                input("Date","date","date",true);
                textarea_input("Reason","reason");
                ?>
                <hr>
                <h5>Results   <i class="bx bxs-plus-circle" style="cursor: pointer" id="add_result"></i></h5>

                <div class = "row align-items-center" data-level = "0">
                    <div class= "col-5">
                        <div class="form-group">
                            <label>Test</label>
                            <select name="test[]" data-level = "0" onchange="test(this)" class="form-control test" required>
                                <option value="">Choose a test</option>
                                <?php
                                $sql = "select * from test";
                                $rows = select_rows($sql);
                                foreach ($rows as $item){
                                    ?>
                                    <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                    </div>
                    <div class= "col-5">
                        <div class="form-group">
                            <label>Result</label>
                            <select name="result[]" class="form-control result" id="level_0"></select>
                        </div>
                    </div>
                </div>

            </div>
            <?php submit(); ?>
        </form>
    </div>
</div>
<script>
    $(document).ready(function(){
        let level = 0;
        $("#add_result").click(function(){
            level++;
            var html = '<div class="row align-items-center"><div class="col-5"><div class="form-group"><label>Test</label><select name="test[]" data-level="'+level+'" onchange="test(this)" class="form-control test" required><option value="">Choose a test</option><?php $sql = "select * from test";$rows = select_rows($sql);foreach ($rows as $item){?><option value="<?= $item['id'] ?>"><?= $item['name'] ?></option><?php } ?></select></div></div><div class="col-5"><div class="form-group"><label>Result</label><select name="result[]" class="form-control result" id="level_'+level+'"></select></div></div><div class="col-2"><i class="bx bxs-minus-circle" style="cursor: pointer" id="remove_result"></i></div></div>';
            $(".card-body").append(html);
        });
        $(".card-body").on('click','#remove_result',function(){
            $(this).closest('.row').remove();
        });
    });
function test(item){

    var test = $(item).val()
    $.ajax({
        url:"model/get_results.php",
        method:"POST",
        data:{id:test},
        success:function(data){
            $("#level_"+$(item).attr('data-level')).text('');
            $("#level_"+$(item).attr('data-level')).append(data);
        }
    });
}
</script>
