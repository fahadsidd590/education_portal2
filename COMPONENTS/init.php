<?php
if (!isset($INIT)) {
    LMS::throw_response(LMS::response(false, 'Invalid Configs', 'Module Not Initialized Properly!', 500), $GET_R['dashboard']);
}
if (isset($INIT['Role'])) {
    if ($USER_INFO['User_Role'] != $INIT['Role']) {
        $UMAN->logout();
        LMS::throw_response(LMS::response(false, 'Not Allowed', 'You are not allowed to access targetted page', 500), "{$DIR}{$GET_R['login']}", true, 'login');
    }
}
