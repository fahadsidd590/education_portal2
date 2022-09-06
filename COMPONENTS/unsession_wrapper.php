<?php session_start();
if (!isset($DIR)) {
    $DIR = "./";
}
require_once("{$DIR}GLOBALS.php");
if (isset($_SESSION['auth'])) {
    header("Location: {$GET_R['dashboard']}");
    die();
}