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

