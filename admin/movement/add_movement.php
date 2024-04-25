<?php
require_once('./../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `movement` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>
<div class="container-fluid">
    <form action="" id="visit-form">
        <input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
        <div class="form-group">
            <label for="inmate_id" class="control-label">Inmate</label>
            <select name="inmate_id" id="inmate_id" class="form-control  rounded-0" required="required">
                <option value="" <?= !isset($inmate_id) ? 'selected' : '' ?>></option>
                <?php
                $inmates = $conn->query("SELECT *,concat(lastname,', ', firstname, coalesce(concat(' ', middlename), '')) as `name` FROM `inmate_list` where `status` = 1 and (date(`date_to`) >= ".date("Y-m-d")." or date_to IS NULL)");
                while($row = $inmates->fetch_assoc()):
                    ?>
                    <option value="<?= $row['id'] ?>" <?= $row['visiting_privilege'] == 0 ? 'disabled' : '' ?> <?= isset($inmate_id) && $inmate_id == $row['id'] ? 'selected' : '' ?>>Inmate-<?= $row['code'] ?> <?= $row['name'] ?> <?= $row['visiting_privilege'] == 0 ? '(Disallowed)' : '' ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="place" class="control-label">Address of location visited</label>
            <input type="text" name="place" id="place" class="form-control  rounded-0" value="<?php echo isset($place) ? $place : ''; ?>"  required/>
        </div>
        <div class="form-group">
            <label for="date" class="conrol-label">Date</label>
            <input type="date" name="date" id="date" class="form-control  rounded-0" value="<?php echo isset($date) ? $date : ''; ?>"  required/>

        </div>

        <div class="form-group">
            <label for="reason" class="control-label">Reason</label>
            <textarea name="reason" id="reason" class="form-control  rounded-0" required><?php echo isset($reason) ? $reason : ''; ?></textarea>
        </div>

    </form>
</div>
<script>
    $(document).ready(function(){
        $('#uni_modal').on('shown.bs.modal', function(){
            $('#inmate_id').select2({
                placeholder:'Please select inmate here',
                width:'100%',
                dropdownParent:$('#uni_modal'),
                containerCssClass:'form-control form-control-sm rounded-0'
            })
        })
        $('#visit-form').submit(function(e){
            e.preventDefault();
            var _this = $(this)
            $('.err-msg').remove();
            start_loader();
            $.ajax({
                url:_base_url_+"admin/model/add_movement.php",
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
                    if(typeof resp =='object' && resp.status == 'success'){
                        // location.reload()
                        alert_toast(resp.msg, 'success')
                        uni_modal("<i class='fa fa-th-list'></i> Movement Details ","view_movement.php?id="+resp.id)
                        $('#uni_modal').on('hide.bs.modal', function(){
                            location.reload()
                        })
                    }else if(resp.status == 'failed' && !!resp.msg){
                        var el = $('<div>')
                        el.addClass("alert alert-danger err-msg").text(resp.msg)
                        _this.prepend(el)
                        el.show('slow')
                        $("html, body").scrollTop(0);
                        end_loader()
                    }else{
                        alert_toast("An error occured",'error');
                        end_loader();
                        console.log(resp)
                    }
                }
            })
        })

    })
</script>