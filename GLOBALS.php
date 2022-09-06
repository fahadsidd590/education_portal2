<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
date_default_timezone_set("Asia/Karachi");
if (!isset($DIR)) {
    $DIR = "./";
}
$session_code = "juhsadhsaldhsa";
$CONFIG = [
    "SITETITLE" => "EDUCATION PORTAL",
    "AUTHOR" => "Designstime",
    "META_DESC" => "Education Portal LMS"
];
$POST_R = [
    "login" =>  "ACTION_DEALERS/login.php",
    "communicator" => "ACTION_DEALERS/communicator.php",
    'addteacher' => 'ACTION_DEALERS/add-teacher.php',
];
$_ACT_TOKENS = [
    "logout" => "7269882020923#2sdsagS",
    "login" => "SADsadfrcs333#sakd03039",
    "communicator" => "dljsandjsandsjd11",
    "addteacher" => "sdsadsdokpopoSW2"
];
$GET_R = [
    "login" => "login.php",
    "unses" => "login.php",
    "logout" => "ACTION_DEALERS/logout.php",
    'addteacher' => 'add-teacher.php',
    "myclasses" => "myclasses.php",
    "dashboard" => "{$DIR}",
];
require_once("{$DIR}CORE/config.php");
require_once("{$DIR}CORE/Classes/LMS.php");
require_once("{$DIR}CORE/Classes/Database.php");
require_once("{$DIR}CORE/Classes/Users.php");