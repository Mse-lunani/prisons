<?php if($_settings->chk_flashdata('success')): ?>
    <script>
        alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
    </script>
<?php endif;?>
<style>
    .cell-img{
        width:3em;
        height:3em;
        object-fit:cover;
        object-position:center center;
    }
</style>
<div class="card card-outline rounded-0 card-navy">
    <div class="card-header">
        <h3 class="card-title">Track Of Inmate wallet</h3>
        <div class="card-tools">
            <a href="javascript:void(0)" id="create_new" class="btn btn-flat btn-primary"><span class="fas fa-plus mr-1"></span>  Create New</a>
        </div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <table class="table table-striped table-hover" id="list">

                <thead>
                <tr>
                    <th>#</th>
                    <th>Date Created</th>
                    <th>Inmate Name</th>
                    <th>Amount</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                $sql = "SELECT 
    i.id AS inmate_id,
    CONCAT(i.lastname, ', ', i.firstname, COALESCE(CONCAT(' ', i.middlename), '')) AS `name`,
    SUM(amount) AS total_amount
FROM 
    inmate_wallet
JOIN 
    inmate_list i ON i.id = inmate_wallet.inmate_id
WHERE 
    inmate_wallet.delete_flag = 0
GROUP BY 
    i.id, i.lastname, i.firstname, i.middlename
ORDER BY 
    total_amount DESC;";
                $rows = select_rows($sql);
                foreach ($rows as $row){
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $i++; ?></td>
                        <td><?php echo date("Y-m-d H:i",strtotime($row['date_created'])) ?></td>
                        <td class=""><?= $row['name'] ?></td>
                        <td class=""><?= $row['total_amount'] ?></td>



                        <td align="center">

                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu" style="">
                                    <a class="dropdown-item view-data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-eye text-dark"></span> View</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item edit-data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-danger"></span> Delete</a>
                                </div>
                            </div>



                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.delete_data').click(function(){
            _conf("Are you sure to delete this Cell Block permanently?","delete_inmate_wallet",[$(this).attr('data-id')])
        })
        $('#create_new').click(function(){
            uni_modal("<i class='far fa-plus-square'></i> Add New exempt list ","inmate_wallet/add_inmate_wallet.php");
            $("#uni_modal").modal("show");
        })
        $('.edit-data').click(function(){
            uni_modal("<i class='fa fa-edit'></i> Edit exempt list ","inmate_wallet/add_inmate_wallet.php?id="+$(this).attr('data-id'));
            $("#uni_modal").modal("show");
        })
        $('.view-data').click(function(){
            uni_modal("<i class='fa fa-th-list'></i> exempt list Details ","inmate_wallet/view_inmate_wallet.php?id="+$(this).attr('data-id'));
            $("#uni_modal").modal("show");
        })
        $('.table').dataTable({
            columnDefs: [
                { orderable: false }
            ],
            order:[0,'asc']
        });
        $('.dataTable td,.dataTable th').addClass('py-1 px-2 align-middle')
    })
    function delete_inmate_wallet($id){
        start_loader();
        $.ajax({
            url:_base_url_+"classes/Master.php?f=delete_inmate_wallet",
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