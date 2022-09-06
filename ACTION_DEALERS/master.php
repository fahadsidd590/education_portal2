<?php
$REQ = null;
if ($_SERVER['REQUEST_METHOD'] != $INIT['REQ']) {
    header("HTTP/1.1 403 Request Type Not Supported");
    die();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($POST_R[$INIT['ROUTE']])) {
        header("HTTP/1.1 403 Action Not Defined");
        die();
    }
    $REQ = $_POST;
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($GET_R[$INIT['ROUTE']])) {
        header("HTTP/1.1 403 Action Not Defined");
        die();
    }
    $REQ = $_GET;
} else {
    header("HTTP/1.1 403 Request Type Not Supported");
    die();
}
if (!isset($_ACT_TOKENS[$INIT['ROUTE']])) {
    header("HTTP/1.1 403 Bad CSRF Request");
    die();
}
if (!isset($_ACT_TOKENS[$INIT['ROUTE']])) {
    header("HTTP/1.1 403 Bad CSRF Request");
    die();
}
if (!isset($REQ['csrf'])) {
    header("HTTP/1.1 403 Missing CSRF Request");
    die();
}
if ($_ACT_TOKENS[$INIT['ROUTE']] != $REQ['csrf']) {
    header("HTTP/1.1 403 Wrong CSRF Request");
    die();
}
if (isset($INIT['multipart'])) {
    $REQ['FILES_M'] = $_FILES;
}
// Validating the input fields
$validation_string = "";
if (isset($INIT['REQ_FIELDS'])) {
    $error_count = 1;
    foreach ($INIT['REQ_FIELDS'] as $key => $value) {
        if (!isset($REQ[$key])) {
            $validation_string .= "'{$value}' is Missing </br>";
            $error_count++;
        } else {
            if (empty($REQ[$key])) {
                $validation_string .= "'{$value}' is Empty </br>";
                $error_count++;
            }
        }
    }
}
if ($validation_string != "") {
    LMS::throw_response(LMS::response(false, 'Problem with following fields', $validation_string, 400), $DIR . $GET_R['login']);
    die();
}
