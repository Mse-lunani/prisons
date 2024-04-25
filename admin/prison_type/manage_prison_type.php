<?php
require_once('./../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from prison_types where id = '{$_GET['id']}' and `delete_flag` = 0 ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>
<div class="container-fluid">
    <form action="" id="prison-type-form">
        <input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
        <div class="form-group">
            <label for="prison_id" class="control-label">Prison Type</label>
            <input type="text" name="name" id="name" class="form-control  rounded-0" value="<?php echo isset($name) ? $name : ''; ?>"  required/>
        </div>
        <div class="form-group">
            <label for="description" class="control-label">Description</label>
            <textarea name="description" id="description" class="form-control  rounded-0" required><?php echo isset($description) ? $description : ''; ?></textarea>
        </div>
    </form>
</div>
<script>
    $(document).ready(function(){
        $('#uni_modal').on('shown.bs.modal',function(){

        })
        $('#prison-type-form').submit(function(e){
            e.preventDefault();
            var _this = $(this)
            $('.err-msg').remove();
            start_loader();
            $.ajax({
                url:_base_url_+"admin/model/save_prison_type.php",
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
                    console.log(resp);
                    if(typeof resp =='object' && resp.status == 'success'){
                        // location.reload()
                        alert_toast(resp.msg, 'success')
                        uni_modal("<i class='fa fa-th-list'></i> Cell Block Details ","prison_type/view_prison_type.php?id="+resp.id)
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