<?php
require_once('./../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `officers` where id = '$_GET[id]' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
$type = $_GET['type'] ?? '';
?>
<div class="container-fluid">
    <form action="" id="visit-form">
        <input type="hidden" name ="id" value="<?php echo $id ?? '' ?>">

        <div class="form-group">
            <label for="type" class="control-label">Type</label>
            <input value="<?= $type ?>" name="type" class="form-control rounded-0"  readonly>
        </div>

        <div class="form-group">
            <label for="name" class="control-label">Name of officer</label>
            <input type="text" name="name" id="name" class="form-control  rounded-0" value="<?php echo $name ?? ''; ?>" required/>
        </div>
        <div class="form-group">
            <label for="email" class="control-label">Email</label>
            <input type="text" name="email" id="email" class="form-control  rounded-0" value="<?php echo $email ?? ''; ?>" required/>
        </div>


    </form>
</div>
<script>
    $(document).ready(function(){

        $('#visit-form').submit(function(e){
            e.preventDefault();
            var _this = $(this)
            $('.err-msg').remove();
            start_loader();
            $.ajax({
                url:_base_url_+"admin/model/add_officer.php",
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
                        uni_modal("<i class='fa fa-th-list'></i> Account Details ","officers/view_officer.php?id="+resp.id)
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