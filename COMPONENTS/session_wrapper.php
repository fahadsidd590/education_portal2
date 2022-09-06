<?php session_start();
if (!isset($DIR)) {
    $DIR = "./";
}
require_once("{$DIR}GLOBALS.php");
if (!isset($_SESSION['auth'])) {
    header("Location: {$DIR}{$GET_R['unses']}");
    die();
} else if ($_SESSION['auth'] != $session_code) {
    header("Location: {$DIR}{$GET_R['unses']}");
    die();
}

$UMAN = new Users();
$USER = $_SESSION['user'];
$USER_INFO = $UMAN->get_user_meta($USER['User_Role'], $USER['User_ID']);
if (!$USER_INFO['status']) {
    $UMAN->logout();
    LMS::throw_response($USER_INFO, "{$DIR}{$GET_R['login']}", true, 'login');
}
$USER_INFO = $USER_INFO['data'];
