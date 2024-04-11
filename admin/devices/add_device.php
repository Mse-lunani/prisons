<div class = "container-fluid">
    <div class = "row">
        <div class = "card">
            <h3 class="card-title m-3">Attach device to Prisoner</h3>
            <form method="post" id="myform">
            <div class = "card-body">
                <div class = "form-group mb-3">
                    <select name="device_id" required class = "form-control  select2">
                        <option value="">Choose a device</option>
                        <?php
                        $sql = "select * from devices";
                        $row = select_rows($sql);
                        foreach ($row as $item){
                        ?>
                        <option value="<?= $item['id'] ?>"><?= $item['device_id']  ?></option>
                        <?php  } ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <select name="prisoner_id" required class = "form-control select2">
                        <option value="">Choose an Inmate</option>
                        <?php
                        $sql = "select * from inmate_list";
                        $row = select_rows($sql);
                        foreach ($row as $item){
                            ?>
                            <option value="<?= $item['id'] ?>"><?= $item['firstname']." ".$item['lastname']  ?></option>
                        <?php  } ?>
                    </select>
                </div>

            </div>
                <?php submit() ?>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#myform').submit(function(e){
            e.preventDefault();
            var _this = $(this)
            $('.err-msg').remove();
            start_loader();
            $.ajax({
                url:_base_url_+"classes/add_device.php",
                data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
                error:err=>{
                    console.log(err)
                    alert_toast("An error occured",'error');
                    end_loader();
                },
                success:function(resp){
                    if(typeof resp =='object' && resp.status == true){
                        // location.reload()
                        alert_toast(resp.msg, 'success');
                        uni_modal("<i class='fa fa-th-list'></i> Action Details ","devices/view_device.php");
                        $("#uni_modal").modal("show");
                        $('#uni_modal').on('hide.bs.modal', function(){
                            location.reload()
                        })
                    }
                    else{
                        alert_toast("An error occured",'error');
                        end_loader();
                        console.log(resp)
                    }
                }
            })
        })

    })
</script>