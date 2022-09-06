<?php session_start();
$DIR = "../";
require_once('../GLOBALS.php');
$INIT = [
    "REQ" => "GET",
    "ROUTE" => "logout"
];
require_once('./master.php');
$UM = new Users();
$RESP = $UM->logout();
if ($RESP['status']) {
    LMS::throw_response($RESP, $DIR . $GET_R['login']);
} else {
    LMS::throw_response($RESP, $GET_R['dashboard']);
}