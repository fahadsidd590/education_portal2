<?php require_once('./COMPONENTS/session_wrapper.php');
$INIT = [
    "ROUTE" => "dashboard",
    "TITLE" => "Dashboard - {$CONFIG['SITETITLE']}",
];
require_once("{$DIR}COMPONENTS/init.php");
require_once("{$DIR}COMPONENTS/header.php");
require_once("{$DIR}COMPONENTS/navbar.php");
?>
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
    </div>
    <!-- end row -->
</div>
<!-- container -->
<?php require_once("{$DIR}COMPONENTS/footer.php"); ?>