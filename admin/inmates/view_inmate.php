<?php

if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT *,concat(lastname,', ', firstname, coalesce(concat(' ', middlename), '')) as `name` from `inmate_list` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
    if(isset($id)){
        $crimes_qry = $conn->query("SELECT ic.crime_id, c.name as `crime` from `inmate_crimes` ic inner join crime_list c on ic.crime_id = c.id where ic.inmate_id = '{$id}' ");
       $crimes = implode(", ", array_column($crimes_qry->fetch_all(MYSQLI_ASSOC),'crime'));
    }
    if(isset($cell_id)){
        $cell_block_qry = $conn->query("SELECT concat(p.name,' - ', c.name) as `cell_block` FROM `cell_list` c inner join `prison_list` p on c.prison_id = p.id where c.id = '{$cell_id}'");
        if($cell_block_qry->num_rows > 0)
         $cell_block = $cell_block_qry->fetch_array()[0];
    }
    $id = security_get("id");
    $sql = "select * from inmate_list where id = '$id'";
    $item = select_rows($sql)[0];
}





$progress = progress_bar($id);

?>
<style>
    img#cimg{
		height: 14em;
		width: 100%;
		object-fit: cover;
	}
</style>
<div class="content py-4 bg-gradient-navy px-3">

</div>
<div class="row mt-n4 justify-content-center align-items-center flex-column">
    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
        <div class="progress">
            <div
                    class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                    role="progressbar"
                    style="width: <?=$progress?>%"
                    aria-valuenow="<?= $progress ?>"
                    aria-valuemin="0"
                    aria-valuemax="100"></div>
        </div>
        <div class="card rounded-0 shadow">
            <div class="card-header py-1 text-center">
                <div class="card-tools p-3">
                <button class="btn btn-flat btn-sm btn-light bg-gradient-light border" id="print" type="button"><i class="fa fa-print"></i>Print</button>
                <button class="btn btn-flat btn-sm btn-primary bg-gradient-primary border" id="update_privilege" type="button">Update Privilege</button>
                <button class="btn btn-flat btn-sm btn-danger bg-gradient-danger border" id="delete-inmate" type="button"><i class="fa fa-trash"></i> Delete</button>
                <a class="btn btn-flat btn-sm btn-info bg-gradient-navy border" href="./?page=inmates/manage_inmate&id=<?= isset($id) ? $id : '' ?>"><i class="fa fa-edit"></i> Edit</a>
                <a class="btn btn-flat btn-sm btn-success bg-gradient-light border" href="./?page=inmates"><i class="fa fa-angle-left"></i> Back to List</a>
                </div>
            </div>
        </div>
        <div class="card rounded-0 shadow">
            <div class="card-header py-1 text-center">
                <div class="card-tools">
                    <div class=""><b>Inmate's Status:</b> 
                    <?php if(isset($date_to) && !empty($date_to) && strtotime($date_to) <= strtotime(date('Y-m-d'))): ?>
                        <span class='text-primary'>Released</span>
                    <?php else: ?>
                    <?= isset($status) && $status == 1 ? "<span class='text-success'>Acitve</span>" : "<span class='text-danger'>Inactive</span>" ?>
                    <?php endif; ?>
                    </div>
                    <div><b>Visitor Privilege:</b> <?= isset($visiting_privilege) && $visiting_privilege == 1 ? "<span class='text-success'>Allowed</span>" : "<span class='text-danger'>Disallowed</span>" ?></div>
                </div>
            </div>
        </div>
        <div class="card rounded-0 shadow">
            <div class="card-body">
                <div class="container-fluid" id="inmate-details">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12">
                            <img src="<?= validate_image(isset($image_path) ? $image_path : '') ?>" alt="Inmate image" class="img-thumbnail m-2 rounded-0 bg-dark border p-0 border-4 border-dark" id="cimg">
                        </div>
                        <div class="col-lg-10 col-md-9 col-sm-12 col-xs-12">
                            <div class="d-flex w-100">
                                <div class="col-auto m-0 p-2 border bg-gradient-secondary">Inmate Code</div>
                                <div class="col-auto m-0 p-2 border flex-shrink-1 flex-grow-1"><?= isset($code) ? $code : '' ?></div>
                                <div class="col-auto m-0 p-2 border bg-gradient-secondary">Cell Block</div>
                                <div class="col-auto m-0 p-2 border flex-shrink-1 flex-grow-1"><?= isset($cell_block) ? $cell_block : '' ?></div>
                            </div>
                            <div class="d-flex w-100">
                                <div class="col-auto m-0 p-2 border bg-gradient-secondary">Name</div>
                                <div class="col-auto m-0 p-2 border flex-shrink-1 flex-grow-1"><?= isset($name) ? $name : '' ?></div>
                            </div>
                            <div class="d-flex w-100">
                                <div class="col-auto m-0 p-2 border bg-gradient-secondary">Sex</div>
                                <div class="col-auto m-0 p-2 border flex-shrink-1 flex-grow-1"><?= isset($sex) ? $sex : '' ?></div>
                                <div class="col-auto m-0 p-2 border bg-gradient-secondary">Birthday</div>
                                <div class="col-auto m-0 p-2 border flex-shrink-1 flex-grow-1"><?= isset($dob) ? date("F d, Y", strtotime($dob)) : '' ?></div>
                            </div>
                            <div class="d-flex w-100">
                                <div class="col-auto m-0 p-2 border bg-gradient-secondary">Address</div>
                                <div class="col-auto m-0 p-2 border flex-shrink-1 flex-grow-1"><?= isset($address) ? $address : '' ?></div>
                            </div>
                            <div class="d-flex w-100">
                                <div class="col-auto m-0 p-2 border bg-gradient-secondary">Marital Status</div>
                                <div class="col-auto m-0 p-2 border flex-shrink-1 flex-grow-1"><?= isset($marital_status) ? $marital_status : '' ?></div>
                                <div class="col-auto m-0 p-2 border bg-gradient-secondary">Complexion</div>
                                <div class="col-auto m-0 p-2 border flex-shrink-1 flex-grow-1"><?= isset($complexion) ? $complexion : '' ?></div>
                                <div class="col-auto m-0 p-2 border bg-gradient-secondary">Eye Color</div>
                                <div class="col-auto m-0 p-2 border flex-shrink-1 flex-grow-1"><?= isset($eye_color) ? $eye_color : '' ?></div>
                            </div>
                        </div>
                    </div>
                    <fieldset class="border px-2 pb-2">
                        <legend class="w-auto mx-3 px-2">Case Details</legend>
                        <div class="d-flex w-100">
                            <div class="col-auto m-0 p-2 border bg-gradient-secondary">Crimes Committed</div>
                            <div class="col-auto m-0 p-2 border flex-shrink-1 flex-grow-1"><?= isset($crimes) ? $crimes : '' ?></div>
                        </div>
                        <div class="d-flex w-100">
                            <div class="col-auto m-0 p-2 border bg-gradient-secondary">Sentence</div>
                            <div class="col-auto m-0 p-2 border flex-shrink-1 flex-grow-1"><?= isset($sentence) ? $sentence : '' ?></div>
                        </div>
                        <div class="d-flex w-100">
                            <div class="col-auto m-0 p-2 border bg-gradient-secondary">Time Serve Starts</div>
                            <div class="col-auto m-0 p-2 border flex-shrink-1 flex-grow-1"><?= isset($date_from) ? date("M d, Y", strtotime($date_from)) : '' ?></div>
                            <div class="col-auto m-0 p-2 border bg-gradient-secondary">Time Serve Ends</div>
                            <div class="col-auto m-0 p-2 border flex-shrink-1 flex-grow-1"><?= isset($date_to) && !empty($date_to) ? date("M d, Y", strtotime($date_to)) : '---- -- --' ?></div>
                        </div>
                    </fieldset>
                    <fieldset class="border px-2 pb-2">
                        <legend class="w-auto mx-3 px-2">Emergency Contact Details</legend>
                        <div class="d-flex w-100">
                            <div class="col-auto m-0 p-2 border bg-gradient-secondary">Name</div>
                            <div class="col-auto m-0 p-2 border flex-shrink-1 flex-grow-1"><?= isset($emergency_name) ? $emergency_name : '' ?></div>
                        </div>
                        <div class="d-flex w-100">
                            <div class="col-auto m-0 p-2 border bg-gradient-secondary">Relation</div>
                            <div class="col-auto m-0 p-2 border flex-shrink-1 flex-grow-1"><?= isset($emergency_relation) ? $emergency_relation : '' ?></div>
                            <div class="col-auto m-0 p-2 border bg-gradient-secondary">Contact #</div>
                            <div class="col-auto m-0 p-2 border flex-shrink-1 flex-grow-1"><?= isset($emergency_contact) ? $emergency_contact : '' ?></div>
                        </div>
                    </fieldset>
                    <?php
                    if (isset($charge_sheet)){
                    ?>
                    <fieldset class="border px-2 pb-2">
                        <legend class="w-auto mx-3 px-2">Charge Sheet</legend>
                        <div class="d-flex w-100">
                           <a class="btn btn-success" target="_blank" href="../uploads/<?= $charge_sheet ?>">
                               <i class="fa fa-download text-white" ></i>
                           </a>
                        </div>

                    </fieldset>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="card rounded-0 shadow">
            <div class="card-header py-1">
                <div class="card-title"><b>Inmate's History Record</b></div>
                <div class="card-tools">
                    <button class="btn btn-flat btn-light border-gradient-light border" type="button" id="add_record"><i class="far fa-plus-square"></i> Add Record</button>
                </div>
            </div>
            <div class="card-body container-fluid">
                <table class="table table-striped table-hover datatables-basic table-bordered" id="record-table">
                    <colgroup>
                        <col width="15%">
                        <col width="25%">
                        <col width="40%">
                        <col width="20%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="p-1 text-center">Date</th>
                            <th class="p-1 text-center">Action</th>
                            <th class="p-1 text-center">Remarks</th>
                            <th class="p-1 text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if(isset($id)):
                        $records = $conn->query("SELECT r.*,a.name as `action` FROM `record_list` r inner join `action_list` a on r.action_id = a.id where r.`inmate_id` ='{$id}' order by date(r.`date`) asc, abs(unix_timestamp(r.date_created)) asc ");
                        while($row = $records->fetch_assoc()):
                        ?>
                        <tr>
                            <td><?= date("M d, Y", strtotime($row['date'])) ?></td>
                            <td><?= $row['action'] ?></td>
                            <td><?= $row['remarks'] ?></td>
                            <td class="text-center">
                                <div class="btn-group btn-sm">
                                    <button class="btn btn-flat btn-xs btn-primary bg-gradient-primary edit-record" type="button" data-id="<?= $row['id'] ?>"><small><i class="fa fa-edit"></i></small></button>
                                    <button class="btn btn-flat btn-xs btn-danger bg-gradient-danger delete-record" type="button" data-id="<?= $row['id'] ?>"><small><i class="fa fa-trash"></i></small></button>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!--store-->
<div class="row mt-4 justify-content-center align-items-center flex-column">
    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
    <div class="mb-3 content py-3 bg-gradient-navy px-3">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Inmate Retrieved Item History</h2>
            <a href="?page=store/take&id=<?= $id ?>" class="btn btn-primary">Retrieve inmate item</a>
        </div>
    </div>

    <?php
    $sql = "select * from inmate_items where inmate_id = '$id'";
    $items = select_rows($sql);

    if(empty($items)){
        echo "<div class='alert alert-info'>No inmate items yet</div>";
    } else{
        ?>
        <div class="row mt-n4 mb-2 justify-content-center align-items-center flex-column">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                        <th>Name of item</th>
                        <th>Description</th>
                        <th>Action</th>
                        </thead>
                        <?php
                        foreach ($items as $item){
                            ?>
                            <tr>
                                <td><?= $item['name'] ?></td>
                                <td><?= $item['description'] ?></td>
                                <td>
                                    <a href="model/delete_inmate_item.php?id=<?= $item['id'] ?>&inmate_id=<?= $item['inmate_id'] ?>" class="btn btn-danger btn-sm">
                                        <i class="bx bxs-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>

    <?php }  ?>


    <div class="mb-3 content py-3 bg-gradient-navy px-3">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Inmate Item History</h2>
            <a href="?page=store/give&id=<?= $id ?>" class="btn btn-primary">Give inmate an item</a>
        </div>
    </div>

    <?php
    $sql = "select * from inmate_items_from_prison where inmate_id = '$id'";
    $items = select_rows($sql);

    if(empty($items)){
        echo "<div class='alert alert-info'>No inmate items yet</div>";
    } else{
        ?>
        <div class="row mt-n4 mb-2 justify-content-center align-items-center flex-column">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                        <th>Name of item</th>
                        <th>Quantity</th>
                        <th>Action</th>
                        </thead>
                        <?php
                        foreach ($items as $item){
                            ?>
                            <tr>
                                <td><?= $item['name'] ?></td>
                                <td><?= $item['quantity'] ?></td>
                                <td>
                                    <a href="model/delete_inmate_item2.php?id=<?= $item['id'] ?>&inmate_id=<?= $item['inmate_id'] ?>" class="btn btn-danger btn-sm">
                                        <i class="bx bxs-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>

    <?php }  ?>
    </div>
</div>
<!-- //store -->


<!--medical-->
<div class="row mt-4 justify-content-center align-items-center flex-column">
    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
<div class="mb-3 content py-3 bg-gradient-navy px-3">
    <div class="d-flex justify-content-between align-items-center">
        <h2>Screening History</h2>
        <a href="?page=medical/screen_inmate&id=<?= $id ?>" class="btn btn-primary">Create New Screening</a>
    </div>
</div>

<?php
$sql = "select * from inmate_screening_order where inmate_id = '$id'";
$orders = select_rows($sql);

if(empty($orders)){
    echo "<div class='alert alert-info'>No Screening History</div>";
}

foreach ($orders as $item){
    $sql = "select * from inmate_screening_test where screening_id = '$item[id]'";
    $screenings = select_rows($sql);
    ?>
    <div class="row mt-n4 mb-2 justify-content-center align-items-center flex-column">
        <div class="card">
            <div class="card-body">
                <h5>Screening Order</h5>
                <table class="table table-striped table-hover">
                    <thead>
                    <th>Date</th>
                    <th>Reason</th>
                    </thead>
                    <tr>
                        <td><?= $item['date'] ?></td>
                        <td><?= $item['reason'] ?></td>
                    </tr>
                </table>
                <h6 class="m-3">Screening Results</h6>
                <table class="table table-striped table-hover">
                    <thead>
                    <th>Test</th>
                    <th>Result</th>
                    </thead>
                    <?php
                    foreach ($screenings as $screening){
                        $sql = "select * from test where id = '$screening[test_id]'";
                        $test = select_rows($sql);
                        $test = $test[0];
                        $sql = "select * from results where id = '$screening[result_id]'";
                        $result = select_rows($sql);
                        $result = $result[0];
                        ?>
                        <tr>
                            <td><?= $test['name'] ?></td>
                            <td><?= $result['result'] ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
<?php } ?>
    </div>
</div>
<!--/medical-->

<!--education-->
<div class="row mt-4 justify-content-center align-items-center flex-column">
    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
        <div class="mb-3 content py-3 bg-gradient-navy px-3">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Certificates</h2>
                <a href="?page=education/create_certs&id=<?= $id ?>" class="btn btn-primary">Create New Certificate</a>
            </div>
        </div>

        <?php
        $sql = "select * from inmate_certs where inmate_id = '$id'";
        $certs = select_rows($sql);

        if(empty($certs)){
            echo "<div class='alert alert-info'>No certifications</div>";
        }else{
            ?>
            <div class="row mt-n4 justify-content-center align-items-center flex-column">
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
                                <th>Name</th>
                                <th>Course</th>
                                <th>Issuing Organization</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 1;
                            foreach($certs as $row){
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $i++; ?></td>
                                    <td><?php echo date("Y-m-d H:i",strtotime($row['date_created'])) ?></td>
                                    <td class=""><?= $row['name'] ?></td>
                                    <td class=""><?= $row['course'] ?></td>
                                    <td class=""><?= $row['school'] ?></td>
                                    <td>
                                        <a href="../uploads/<?= $row['document'] ?>" target="_blank" class="btn btn-sm btn-primary">
                                            <i class="bx bx-download"></i>
                                        </a>
                                        <a href="model/delete_cert.php?id=<?= $row['id'] ?>&inmate_id=<?= $row['inmate_id'] ?>"  class="btn btn-sm btn-danger">
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
        <?php } ?>
    </div>
</div>
<!--//education-->

<noscript id="print-header">
    <div>
        <style>
            html{
                min-height:unset !important;
            }
            @media print{
                html, body{
                    min-height:unset !important;
                }
                img#cimg{
                    height: 14em;
                    width: 100%;
                    object-fit: cover;
                }
            }
        </style>
        <div class="d-flex w-100 align-items-center">
            <div class="col-2 text-center">
                <img src="<?= validate_image($_settings->info('logo')) ?>" alt="" class="rounded-circle border" style="width: 5em;height: 5em;object-fit:cover;object-position:center center">
            </div>
            <div class="col-8">
                <div style="line-height:1em">
                    <div class="text-center font-weight-bold h5 mb-0"><large><?= $_settings->info('name') ?></large></div>
                    <div class="text-center font-weight-bold h5 mb-0"><large>Inmate's Details</large></div>
                </div>
            </div>
        </div>
        <hr>
    </div>
</noscript>
<script>
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
					location.replace('./?page=inmates');
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
    function delete_record($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_record",
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
					location.reload()
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
    $(function(){
        $('#update_privilege').click(function(){
            uni_modal('Update <b>Inmate-<?= isset($code) ? $code : '' ?></b>\'s Visitor Privilege', 'inmates/manage_privilege.php?id=<?= isset($id) ? $id : '' ?>');
            $("#uni_modal").modal("show");
        })
        $('#delete-inmate').click(function(){
			_conf("Are you sure to delete this Inmate permanently?","delete_inmate",['<?= isset($id) ? $id : '' ?>'])
		})
        $('#add_record').click(function(){
            uni_modal('<i class="far fa-plus-square"></i> Add Record for <b>Inmate - <?= isset($code) ? $code : '' ?></b>', 'inmates/manage_record.php?inmate_id=<?= isset($id) ? $id : '' ?>');
            $("#uni_modal").modal("show");
        })
        $('.edit-record').click(function(){
            uni_modal('<i class="far fa-edit"></i> Edit Record', 'inmates/manage_record.php?id='+$(this).attr('data-id'));
            $("#uni_modal").modal("show");
        })
        $('.delete-record').click(function(){
            _conf("Are you sure to delete this record?", "delete_record", [$(this).attr('data-id')])
        })
        $('#record-table').dataTable({
			columnDefs: [
					{ orderable: false, targets: [3] }
			],
			order:[0,'asc']
		});
		$('.dataTable td,.dataTable th').addClass('py-1 px-2 align-middle')
        $('.dataTables_paginate').find('.pagination .page-link').addClass('py-1')
        $('#print').click(function(){
            var h = $('head').clone()
            var ph = $($('noscript#print-header').html()).clone()
            var scritps = $('#script-list').clone()
            var details = $('#inmate-details').clone()
            var records = $('#record-table').clone()
            records.dataTable().fnDestroy()
            records.find('th:nth-last-child(1)').remove()
            records.find('td:nth-last-child(1)').remove()
            records.find('col:nth-last-child(2)').attr('width',"60%")
            records.find('col:nth-last-child(1)').remove()
            h.find('title').text("Inmate's Details - Print View")
            var nw = window.open("", "_blank", "width="+($(window).width() * .8)+",left="+($(window).width() * .1)+",height="+($(window).height() * .8)+",top="+($(window).height() * .1))
            nw.document.querySelector('head').innerHTML = h.html()
            nw.document.querySelector('body').innerHTML = ph[0].outerHTML
            nw.document.querySelector('body').innerHTML += details[0].outerHTML
            nw.document.querySelector('body').innerHTML += "<h4 class='pt-3'>Inmate's History Records</h4><hr>"
            nw.document.querySelector('body').innerHTML += records[0].outerHTML
            nw.document.querySelector('body').innerHTML += scritps[0].outerHTML
            nw.document.close()
            start_loader()
            setTimeout(() => {
                nw.print()
                setTimeout(() => {
                    nw.close()
                    end_loader()
                }, 200);
            }, 300);

        })
    })
</script>