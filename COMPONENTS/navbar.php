<!-- ========== Dynamic Left Sidebar Start ========== -->
<?php require_once("{$DIR}COMPONENTS/Roles/navbar/{$USER_INFO['User_Role']}.php") ?>
<!-- ========== Dynamic Left Sidebar Start ========== -->
<!-- Sidebar -left -->
</div>
<!-- Left Sidebar End -->
<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">
        <!-- Topbar Start -->
        <div class="navbar-custom">
            <div class="app-search dropdown d-none d-lg-block">
                <form action="<?php echo $DIR . $GET_R['logout']; ?>" method="GET">
                    <input type="hidden" name="csrf" value="<?php echo $_ACT_TOKENS['logout'] ?>" />
                    <button class="input-group-text btn-primary" type="submit">Logout</button>
                </form>
            </div>
        </div>
        <!-- end Topbar -->