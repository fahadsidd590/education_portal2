<?php session_start();
$DIR = "../";
require_once('../GLOBALS.php');
$INIT = [
    "REQ" => "POST",
    "ROUTE" => "addteacher",
    "REQ_FIELDS" => [
        "full_name" => "Full Name",
        "email" => "Email",
        "password" => "Password",
    ]
];
require_once('./master.php');
// Inititng
if (!isset($REQ['email_notify'])) {
    $REQ['email_notify'] = "false";
}
$UM = new Users();
$RESP = $UM->register_teacher($REQ['full_name'], $REQ['email'], $REQ['password'], $REQ['email_notify']);
print_r($RESP);
if ($RESP['status']) {
    LMS::throw_response($RESP, $GET_R['dashboard']);
} else {
    LMS::throw_response($RESP, $DIR . $GET_R['login']);
}