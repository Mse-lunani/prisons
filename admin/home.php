<style>
  #system-cover{
    width:100%;
    height:35em;
    object-fit:cover;
    object-position:center center;
  }
</style>
<h1 class="">Welcome, <?php echo $_settings->userdata('firstname')." ".$_settings->userdata('lastname') ?>!</h1>
<hr>
<div class="row">


    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
        <div class="card" style="border-width:2px;  border-style: solid; border-radius: 10px; border-color: #36a4e3;">
            <div class="card-body">
                <div class="row">
                <div class="col-8">
                <span>Prison List</span>
                <h3 class="card-title text-nowrap mb-1">
                    <?php
                    $prison = $conn->query("SELECT * FROM prison_list where delete_flag = 0 and `status` = 1")->num_rows;
                    echo format_num($prison);
                    ?>
                </h3>
                </div>
                <div class="col-4">
                    <img class="img-fluid" src="../sneat/assets/gif/watchtower.gif">
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
        <div class="card" style="border-width:2px;  border-style: solid; border-radius: 10px; border-color: #36a4e3;">
            <div class="card-body">
                <div class="row">
                <div class="col-8">
                    <span>Cell Block</span>
                    <h3 class="card-title text-nowrap mb-1">
                        <?php
                        $cells = $conn->query("SELECT id FROM cell_list where delete_flag = 0 and `status` = 1")->num_rows;
                        echo format_num($cells);
                        ?>
                    </h3>
                </div>
                    <div class="col-4">
                    <img class="img-fluid" src="../sneat/assets/gif/jail.gif">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
        <div class="card" style="border-width:2px;  border-style: solid; border-radius: 10px; border-color: #36a4e3;">
            <div class="card-body">
               <div class="row">
                   <div class="col-8">
                       <span>Crimes</span>
                       <h3 class="card-title text-nowrap mb-1">
                           <?php
                           $crimes = $conn->query("SELECT id FROM crime_list where  `status` =1 and delete_flag = 0")->num_rows;
                           echo format_num($crimes);
                           ?>
                       </h3>
                   </div>
                   <div class="col-4">
                          <img class="img-fluid" src="../sneat/assets/gif/evidence.gif">
                   </div>
               </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
        <div class="card" style="border-width:2px;  border-style: solid; border-radius: 10px; border-color: #36a4e3;">
            <div class="card-body">
                <div class = "row">
                    <div class="col-8">
                        <span>Actions</span>
                        <h3 class="card-title text-nowrap mb-1">
                            <?php
                            $actions = $conn->query("SELECT id FROM action_list where `status` =1 and delete_flag = 0")->num_rows;
                            echo format_num($actions);
                            ?>
                        </h3>
                    </div>
                    <div class="col-4">
                        <img class="img-fluid" src="../sneat/assets/gif/work-list.gif">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
        <div class="card" style="border-width:2px;  border-style: solid; border-radius: 10px; border-color: #36a4e3;">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <span>Currrent Inmates</span>
                        <h3 class="card-title text-nowrap mb-1">
                            <?php
                            $inmates = $conn->query("SELECT id FROM inmate_list where `status` =1  and (date(date_to) > '".date('Y-m-d')."' or date_to is NULL )")->num_rows;
                            echo format_num($inmates);
                            ?>
                        </h3>
                    </div>
                    <div class="col-4">
                        <img class="img-fluid" src="../sneat/assets/gif/prisoner.gif">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
        <div class="card" style="border-width:2px;  border-style: solid; border-radius: 10px; border-color: #36a4e3;">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <span>Released Inmates</span>
                        <h3 class="card-title text-nowrap mb-1">
                            <?php
                            $inmates = $conn->query("SELECT id FROM inmate_list where date(date_to) <= '".date('Y-m-d')."'")->num_rows;
                            echo format_num($inmates);
                            ?>
                        </h3>
                    </div>
                    <div class="col-4">
                        <img class="img-fluid" src="../sneat/assets/gif/british.gif">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
        <div class="card" style="border-width:2px;  border-style: solid; border-radius: 10px; border-color: #36a4e3;">
            <div class="card-body">
                <div class="row">
                <div class="col-8">
                    <span>Today's Visits</span>
                    <h3 class="card-title text-nowrap mb-1">
                        <?php
                        $visits = $conn->query("SELECT id FROM visit_list where date(date_created) = '".date('Y-m-d')."'")->num_rows;
                        echo format_num($visits);
                        ?>
                    </h3>
                </div>
                <div class="col-4">
                    <img class="img-fluid" src="../sneat/assets/gif/consultation.gif">
                </div>
                </div>
            </div>
        </div>
    </div>


</div>


<?php if($_settings->userdata('type') == 1): ?>
<h3 class="m-3">List of pending Inmates</h3>
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
                            <th>Progress</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        $qry = $conn->query("SELECT *,concat(lastname,', ', firstname, coalesce(concat(' ', middlename), '')) as `name` from `inmate_list` order by `name` asc ");
                        while($row = $qry->fetch_assoc()):
                            if(progress_bar($row['id']) == 100)
                                continue;
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $i++; ?></td>
                                <td><?php echo date("Y-m-d H:i",strtotime($row['date_created'])) ?></td>
                                <td class=""><?= $row['code'] ?></td>
                                <td class=""><?= $row['name'] ?></td>
                                <td class="text-center">
                                    <?= progress_bar($row['id'])  ?>%
                                </td>
                                <td align="center">
                                    <a href="?page=inmates/view_inmate&id=<?php echo $row['id'] ?>" class="btn btn-sm btn-primary">
                                        continue with registration
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
<?php endif; ?>

