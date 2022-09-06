<?php session_start();
$DIR = "../";
require_once('../GLOBALS.php');
$INIT = [
    "REQ" => "POST",
    "ROUTE" => "login",
    "REQ_FIELDS" => [
        "username" => "Username",
        "password" => "Password"
    ]
];
require_once('./master.php');
$UM = new Users();
$RESP = $UM->login($REQ['username'], $REQ['password']);
if ($RESP['status']) {
    LMS::throw_response($RESP, $GET_R['dashboard']);
} else {
    LMS::throw_response($RESP, $DIR . $GET_R['login']);
}
