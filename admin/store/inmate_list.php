<?php if($_settings->chk_flashdata('success')): ?>
    <script>
        alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
    </script>
<?php endif;?>
<style>
    .inmate-img{
        width:3em;
        height:3em;
        object-fit:cover;
        object-position:center center;
    }
</style>
<h3 class="m-3">List of Inmates</h3>
<div class="card card-outline rounded-0 card-navy">

    <div class="card-body">
        <div class="container-fluid">
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
                            <th>Code</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        $qry = $conn->query("SELECT *,concat(lastname,', ', firstname, coalesce(concat(' ', middlename), '')) as `name` from `inmate_list` order by `name` asc ");
                        while($row = $qry->fetch_assoc()):
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $i++; ?></td>
                                <td><?php echo date("Y-m-d H:i",strtotime($row['date_created'])) ?></td>
                                <td class=""><?= $row['code'] ?></td>
                                <td class=""><?= $row['name'] ?></td>
                                <td class="text-center">
                                    <?php if(isset($row['date_to']) && !empty($row['date_to']) && strtotime($row['date_to']) <= strtotime(date('Y-m-d'))): ?>
                                        <span class="badge badge-primary bg-primary px-3 rounded-pill">Released</span>
                                    <?php else: ?>
                                        <?php if($row['status'] == 1): ?>
                                            <span class="badge badge-success bg-success px-3 rounded-pill">Active</span>
                                        <?php else: ?>
                                            <span class="badge badge-danger bg-danger px-3 rounded-pill">Inactive</span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td align="center">
                                    <a href="?page=store/inmate_onboard_history&id=<?php echo $row['id'] ?>" class="btn btn-sm btn-warning">
                                        new onboarding
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.delete_data').click(function(){
            _conf("Are you sure to delete this Inmate permanently?","delete_inmate",[$(this).attr('data-id')])
        })
        $('.table').dataTable({
            columnDefs: [
                { orderable: false, targets: [5] }
            ],
            order:[0,'asc']
        });
        $('.dataTable td,.dataTable th').addClass('py-1 px-2 align-middle')
    })
    function delete_inmate($id){
        start_loader();
        $.ajax({
            url:_base_url_+"classes/Master.php?f=delete_inmate",
            method:"POST",
            data:{id: $id},
            dataType:"json",
            error:err=>{
                console.log(err)
                alert_toast("An error occured.",'error');
                end_loader();
            },
            success:function(resp){
                if(typeof resp== 'object' && resp.status == 'success'){
                    location.reload();
                }else{
                    alert_toast("An error occured.",'error');
                    end_loader();
                }
            }
        })
    }
</script>