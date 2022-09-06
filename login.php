<?php require_once('./COMPONENTS/unsession_wrapper.php');
$INIT = [
    "ROUTE" => "login",
    "TITLE" => "Login - {$CONFIG['SITETITLE']}",
];
require_once("{$DIR}COMPONENTS/header.php");
?>
<div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-4 col-lg-5">
                <div class="card">
                    <!-- Logo -->
                    <div class="card-header pt-4 pb-4 text-center bg-primary">
                        <a href="<?php echo $GET_R['dashboard'] ?>">
                            <span><img src="assets/images/logo-light.png" alt="" height="18"></span>
                        </a>
                    </div>
                    <div class="card-body p-4">
                        <div class="text-center w-75 m-auto">
                            <h4 class="text-dark-50 text-center pb-0 fw-bold">Sign In</h4>
                            <p class="text-muted mb-4">Use Username & Password</p>
                        </div>
                        <form method="POST" action="<?php echo $POST_R['login'] ?>">
                            <div class="mb-3">
                                <label for="emailaddress" class="form-label">Username</label>
                                <input class="form-control" type="text" id="username" name="username" required placeholder="Enter your username ?">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" name="password" required class="form-control" placeholder="Enter your password">
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 mb-0 text-center">
                                <input type="hidden" name="csrf" value="<?php echo $_ACT_TOKENS['login'] ?>" />
                                <button class="btn btn-primary" type="submit"> Log In </button>
                            </div>
                        </form>
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<?php require_once("{$DIR}COMPONENTS/footer.php"); ?>