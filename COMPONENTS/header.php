<?php
if (!isset($INIT)) {
    $INIT = [
        "ROUTE" => "untitled",
        "TITLE" => "Untitled - {$CONFIG['SITETITLE']}"
    ];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?php echo $INIT['TITLE']; ?></title>
    <?php require_once('./COMPONENTS/head-resources.php') ?>
</head>

<body class="loading <?php echo $INIT['ROUTE']; ?>" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid" data-rightbar-onstart="true">
    <?php if (isset($_SESSION['thrown_resp'])) {
        if (count($_SESSION['thrown_resp']) > 0) {
            LMS::print_response($_SESSION['thrown_resp']);
        }
    }
    ?>
    <!-- Begin page -->
    <div class="wrapper">