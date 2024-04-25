
<div class="card card-outline rounded-0 card-navy">
    <div class="card-header">
        <h3 class="card-title">Admit a visitor</h3>

    </div>

        <form action="" id="admit_visitor_form">
            <div class="card-body">
            <div class="form-group">
                <label for="inmate_id" class="control-label">Visitor</label>
                <select name="visitor_id" id="visitor_id" class="form-control  rounded-0" required="required">
                    <option value="">Choose visitor</option>
                    <?php
                    $visits = $conn->query("SELECT *, fullname as name FROM `visit_list` where `status` = 'pending'");
                    while($row = $visits->fetch_assoc()):
                        ?>
                        <option value="<?= $row['id'] ?>">
                            <?= $row['name'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
           <div class="form-group">
                    <label for="file" class="control-label">Id scan</label>
                    <input type="file" name="file" id="file" class="form-control form-control-sm rounded-0" required="required">
           </div>
            </div>
            <?php submit(); ?>
        </form>


</div>

<script>
    $(document).ready(function(){
        $('#uni_modal').on('shown.bs.modal', function(){
            $('#inmate_id').select2({
                placeholder:'Please select visitor here',
                width:'100%',
                dropdownParent:$('#uni_modal'),
                containerCssClass:'form-control form-control-sm rounded-0'
            })
        })
        $('#admit_visitor_form').submit(function(e){
            e.preventDefault();
            var _this = $(this)
            $('.err-msg').remove();
            start_loader();
            $.ajax({
                url:_base_url_+"admin/model/admit_visitor.php",
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
                    console.log(resp)
                    if(resp.status == 'success'){
                        // location.reload()
                       alert("admitted successfully");
                        location.reload();
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