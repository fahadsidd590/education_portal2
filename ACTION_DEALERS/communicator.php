<?php session_start();
$DIR = "../";
require_once('../GLOBALS.php');
$INIT = [
    "REQ" => "POST",
    "ROUTE" => "communicator",
    "REQ_FIELDS" => [
        "json_response" => "Response",
        "url" => "URL",
        "route" => "Route"
    ]
];
require_once('./master.php');
$RESP_DECODED = json_decode(base64_decode($REQ['json_response']), true);
if (isset($GET_R[$REQ['route']])) {
    LMS::throw_response($RESP_DECODED, $DIR . $GET_R[$REQ['route']]);
} else {
    LMS::throw_response(LMS::response(false, 'Route Not Found', 'Targetted Form Route Not Defined', 403), $_SERVER['HTTP_REFERER']);
}
