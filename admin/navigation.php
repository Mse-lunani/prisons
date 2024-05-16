<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">

            <span class="app-brand-text demo menu-text fw-bolder ms-2" style = "text-transform: capitalize">PMS</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Page -->


        <li class="menu-item">
            <a href="./" class="menu-link nav-home">
                <i class="menu-icon tf-icons bx bxs-dashboard"></i>
                <div data-i18n="Dashboard"> Dashboard</div>
            </a>
        </li>


        <?php if($_settings->userdata('type') == 1): ?>
            <li class="menu-item">
                <a href="./?page=inmates" class="menu-link nav-inmates">
                    <i class="menu-icon tf-icons bx bxs-user"></i>
                    <div data-i18n=" Inmate List"> Inmate List</div>
                </a>
            </li>
            <li class="menu-header small text-uppercase">Master List</li>
            <li class="menu-item">
                <a href="./?page=prison_type" class="menu-link nav-actions">
                    <i class="menu-icon tf-icons bx bxs-bookmark-alt"></i>

                    <div data-i18n="Prison Type"> Prison Type</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="./?page=prisons" class="menu-link nav-prisons">

                    <i class="menu-icon tf-icons bx bxs-lock"></i>

                    <div data-i18n="Prison List"> Prison List</div>

                </a>
            </li>
            <li class="menu-item">
                <a href="./?page=cells" class="menu-link nav-cells">
                    <i class="menu-icon tf-icons bx bxs-lock"></i>

                    <div data-i18n="Cell block List"> Cell block List</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="./?page=crimes" class="menu-link nav-crimes">
                    <i class="menu-icon tf-icons bx bxs-lock"></i>

                    <div data-i18n="Crime List"> Crime List</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="./?page=actions" class="menu-link nav-actions">
                    <i class="menu-icon tf-icons bx bxs-bookmark-alt"></i>

                    <div data-i18n="Action List"> Action List</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="javascript:void(0);"  class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bxs-book"></i>

                    <div data-i18n="Reports"> Reports
                        <i class="right fas fa-angle-left"></i>
                    </div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="./?page=reports/record_history" class="menu-link tree-item nav-reports_record_history">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Monthly Inmate Records</p>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="./?page=reports/visitor_report" class="menu-link tree-item nav-reports_visitor_report">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Monthly Visitors</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-header small text-uppercase">Store Management</li>
            <li class="menu-item">
                <a href="./?page=officers&type=store_keeper" class="menu-link nav-cells">
                    <i class="menu-icon tf-icons bx bxs-user-badge"></i>

                    <div data-i18n="Store Keepers">Store Keepers</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="./?page=store/items" class="menu-link nav-cells">
                    <i class="menu-icon tf-icons bx bxs-grid"></i>

                    <div data-i18n="Store Items">Store Items</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="./?page=store/inmate_list" class="menu-link nav-cells">
                    <i class="menu-icon tf-icons bx bxs-user-badge"></i>

                    <div data-i18n="Inmate onboarding"> Inmate onboarding</div>
                </a>
            </li>

            <li class="menu-header small text-uppercase">Medical Management</li>
            <li class="menu-item">
                <a href="./?page=officers&type=medics" class="menu-link nav-cells">
                    <i class="menu-icon tf-icons bx bxs-user-badge"></i>

                    <div data-i18n="Medical officers">Medical Officers</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="./?page=medical/inmate_list" class="menu-link nav-cells">
                    <i class="menu-icon tf-icons bx bxs-user-badge"></i>

                    <div data-i18n="Inmate Screening"> Inmate List</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="./?page=medical/view_tests" class="menu-link nav-cells">
                    <i class="menu-icon tf-icons bx bxs-injection"></i>

                    <div data-i18n="Test Management">Test Management</div>
                </a>
            </li>

            <li class="menu-header small text-uppercase">Education & Career</li>
            <li class="menu-item">
                <a href="./?page=officers&type=education" class="menu-link nav-cells">
                    <i class="menu-icon tf-icons bx bxs-user-badge"></i>

                    <div data-i18n="Education officers">Education Officers</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="./?page=education/" class="menu-link nav-cells">
                    <i class="menu-icon tf-icons bx bxs-user-badge"></i>

                    <div data-i18n="Inmate Certificates"> Inmate List</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="./?page=education/trainings" class="menu-link nav-cells">
                    <i class="menu-icon tf-icons bx bxs-user-badge"></i>

                    <div data-i18n="Trainings">Trainings</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="./?page=education/jobs" class="menu-link nav-cells">
                    <i class="menu-icon tf-icons bx bxs-user-badge"></i>

                    <div data-i18n="Jobs">Jobs</div>
                </a>
            </li>


            <li class="menu-header small text-uppercase">Gate Management</li>
            <li class="menu-item">
                <a href="./?page=exempt_list" class="menu-link nav-cells">
                    <i class="menu-icon tf-icons bx bxs-user-badge"></i>

                    <div data-i18n="Exempt List">Exempt List</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="./?page=visits" class="menu-link nav-visits">
                    <i class="menu-icon tf-icons bx bxs-user"></i>
                    <div data-i18n="Visitor Request List"> Vistor Request List</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="./?page=admit_visitor" class="menu-link nav-visits">
                    <i class="menu-icon tf-icons bx bxs-user"></i>
                    <div data-i18n="Admit Visitor">Admit Visitor</div>
                </a>
            </li>

            <li class="menu-header small text-uppercase">Inmate Movement</li>
            <li class="menu-item">
                <a href="./?page=movement" class="menu-link nav-cells">
                    <i class="menu-icon tf-icons bx bxs-user-badge"></i>

                    <div data-i18n="Inmate Movement">Inmate Movement</div>
                </a>
            </li>


            <li class="menu-header small text-uppercase">Inmate Wallet</li>
            <li class="menu-item">
                <a href="./?page=inmate_wallet" class="menu-link nav-cells">
                    <i class="menu-icon tf-icons bx bxs-user-badge"></i>

                    <div data-i18n="Inmate wallet">Inmate Wallet</div>
                </a>
            </li>



            <li class="menu-header small text-uppercase">Maintenance</li>
            <li class="menu-item">
                <a href="<?php echo base_url ?>admin/?page=user/list" class="menu-link nav-user_list">
                    <i class="menu-icon tf-icons bx bxs-user-account"></i>

                    <div data-i18n="User List">User List</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="<?php echo base_url ?>admin/?page=system_info" class="menu-link nav-system_info">
                    <i class="menu-icon tf-icons bx bxs-info-circle"></i>

                    <div data-i18n="System info"> System Info</div>
                </a>
            </li>
<!--            <li class="menu-item">-->
<!--                <a href="--><?php //echo base_url ?><!--admin/?page=devices/add_device" class="menu-link nav-system_info">-->
<!--                    <i class="menu-icon tf-icons bx bxs-grid"></i>-->
<!---->
<!--                    <div data-i18n="Devices">Devices</div>-->
<!--                </a>-->
<!--            </li>-->
            <li class="menu-item">
            <a href="<?php echo base_url ?>admin/?page=devices/location" class="menu-link nav-system_info">
                <i class="menu-icon tf-icons bx bxs-pin"></i>

                <div data-i18n="Map">Device Map</div>
            </a>
            </li>



        <?php endif; ?>

        <?php if($_settings->userdata('login_type') == "medics"){?>
            <li class="menu-header small text-uppercase">Medical Management</li>

            <li class="menu-item">
                <a href="./?page=medical/inmate_list" class="menu-link nav-cells">
                    <i class="menu-icon tf-icons bx bxs-user-badge"></i>

                    <div data-i18n="Inmate Screening"> Inmate List</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="./?page=medical/view_tests" class="menu-link nav-cells">
                    <i class="menu-icon tf-icons bx bxs-injection"></i>

                    <div data-i18n="Test Management">Test Management</div>
                </a>
            </li>


        <?php } ?>
        <?php if($_settings->userdata('login_type') == "education"){?>
            <li class="menu-header small text-uppercase">Education & Career</li>

            <li class="menu-item">
                <a href="./?page=education/" class="menu-link nav-cells">
                    <i class="menu-icon tf-icons bx bxs-user-badge"></i>

                    <div data-i18n="Inmate Certificates"> Inmate List</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="./?page=education/trainings" class="menu-link nav-cells">
                    <i class="menu-icon tf-icons bx bxs-user-badge"></i>

                    <div data-i18n="Trainings">Trainings</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="./?page=education/jobs" class="menu-link nav-cells">
                    <i class="menu-icon tf-icons bx bxs-user-badge"></i>

                    <div data-i18n="Jobs">Jobs</div>
                </a>
            </li>


        <?php } ?>

        <?php if($_settings->userdata('login_type') == "store_keeper"){?>
        <li class="menu-header small text-uppercase">Store Management</li>
        <li class="menu-item">
            <a href="./?page=store/items" class="menu-link nav-cells">
                <i class="menu-icon tf-icons bx bxs-grid"></i>

                <div data-i18n="Store Items">Store Items</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="./?page=store/inmate_list" class="menu-link nav-cells">
                <i class="menu-icon tf-icons bx bxs-user-badge"></i>

                <div data-i18n="Inmate onboarding"> Inmate onboarding</div>
            </a>
        </li>
        <?php } ?>



    </ul>
</aside>
<!-- / Menu -->