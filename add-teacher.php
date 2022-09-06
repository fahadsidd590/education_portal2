<?php require_once('./COMPONENTS/session_wrapper.php');
$INIT = [
    "ROUTE" => "addteacher",
    "Role" => "Manager",
    "TITLE" => "Add Teachers - {$CONFIG['SITETITLE']}",
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
                <h4 class="page-title">Add Teachers</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-md-10 m-auto py-4">
            <form method="POST" action="<?php echo "{$DIR}{$POST_R['addteacher']}"; ?>" class="addTeacher">
                <div class="form-group mb-3">
                    <label>Full Name</label>
                    <input type="text" name="full_name" class="form-control" required />
                </div>
                <div class="form-group mb-3">
                    <label>Email Address</label>
                    <input type="email" name="email" class="form-control" required />
                </div>
                <div class="form-group mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required />
                </div>
                <div class="form-group mb-3">
                    <label><input type="checkbox" value="true" name="email_notify"> Notify Teacher On Email</label>
                </div>
                <div class="form-group mb-3">
                    <input type="hidden" name="csrf" value="<?php echo $_ACT_TOKENS['addteacher'] ?>" />
                    <button class="btn btn-primary btn-md m-auto d-block" type="submit">Add Teacher</button>
                </div>
            </form>
        </div>
    </div>
    <!-- end row -->
</div>
<!-- container -->
<?php require_once("{$DIR}COMPONENTS/footer.php"); ?>