<div class="leftside-menu">
    <!-- LOGO -->
    <a href="<?php echo $GET_R['dashboard'] ?>" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="assets/images/logo-light.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo_sm.png" alt="" height="16">
        </span>
    </a>

    <!-- LOGO -->
    <a href="<?php echo $GET_R['dashboard'] ?>" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="assets/images/logo-dark.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo_sm_dark.png" alt="" height="16">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="side-nav">
            <?php echo  $INIT['ROUTE'] == 'dashboard' ? "<li class='side-nav-item active'>" :  "<li class='side-nav-item'>"; ?>
            <a class="side-nav-link" href="<?php echo $GET_R['dashboard'] ?>">
                <i class="uil-home"></i>
                <span>Dashboard</span>
            </a>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEcommerceTeachers" aria-expanded="true" aria-controls="sidebarEcommerceTeachers" class="side-nav-link">
                    <i class="uil-pen"></i>
                    <span> Teachers </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse show" id="sidebarEcommerceTeachers">
                    <ul class="side-nav-second-level">
                        <?php echo  $INIT['ROUTE'] == 'addteacher' ? "<li class='side-nav-item active'>" :  "<li class='side-nav-item'>"; ?>
                        <a href="<?php echo $DIR . $GET_R['addteacher'] ?>">Add Teacher</a>
            </li>
        </ul>
        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="true" aria-controls="sidebarEcommerce" class="side-nav-link">
                <i class="uil-store"></i>
                <span> Classroom </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse show" id="sidebarEcommerce">
                <ul class="side-nav-second-level">
                    <?php echo  $INIT['ROUTE'] == 'myclasses' ? "<li class='side-nav-item active'>" :  "<li class='side-nav-item'>"; ?>
                    <a href="<?php echo $DIR . $GET_R['myclasses'] ?>">My Classes</a>
        </li>
        </ul>
    </div>
    </li>
    </ul>
    <!-- End Sidebar -->
    <div class="clearfix"></div>
</div>