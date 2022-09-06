<?php
class Users extends LMS
{
    public $DB;
    public function __construct()
    {
        $DB = new Database();
        $this->DB = $DB->CONN;
    }
    public function get_user(string $condition = null, array $filter = array(), string $orderby = "User_ID", string $order = "DESC")
    {
        $where = LMS::where_clause($condition, $filter);
        $order = LMS::orderby($orderby, $order);
        // $orderby
        $get_query = "SELECT * FROM `employees_login` {$where} {$order}";
        $get_query_run = $this->DB->query($get_query);
        if ($get_query_run) {
            if ($get_query_run->num_rows > 0) {
                $users = $get_query_run->fetch_all(MYSQLI_ASSOC);
                return self::response(true, "User Found!", "User found related to preferences", 200, $users);
            } else {
                return self::response(false, "No User!", "No user found related to preferences", 200);
            }
        } else {
            return self::response(false, "Query Error", "Error While Getting user", 500, [], true, $this->DB->error);
        }
    }
    public function authenticate(string $username, string $password)
    {
        $SQL_QUERY = "SELECT * FROM `employees_login` WHERE `User_Email` = '{$username}' AND `user_approved` = 1";
        $SQL_QUERY_RUN = $this->DB->query($SQL_QUERY);
        if ($SQL_QUERY_RUN) {
            if ($SQL_QUERY_RUN->num_rows > 0) {
                $SQL_DATA = $SQL_QUERY_RUN->fetch_all(MYSQLI_ASSOC);
                $USER = $SQL_DATA[0];
                if (password_verify($password, $USER['User_Password'])) {
                    return self::response(true, "User Authenticated", "Verified Successfully", 200, $USER);
                } else {
                    return self::response(false, "Wrong Password", "Wrong password for this user", 200);
                }
            } else {
                return self::response(false, "Username not present", "User not present in the system", 200);
            }
        } else {
            return self::response(false, "Query Error", "Error While Authenticating the user", 500, [], true, $this->DB->error);
        }
    }
    public function login(string $username, string $password)
    {
        global $session_code;
        $authresp = $this->authenticate($username, $password);
        if ($authresp['status']) {
            $_SESSION['auth'] = $session_code;
            $_SESSION['user'] = $authresp['data'];
        }
        return $authresp;
    }
    public function logout()
    {
        unset($_SESSION['auth']);
        unset($_SESSION['user']);
        return self::response(true, 'Loged Out!', 'User Logged out successfully!', 200);
    }
    public function get_user_meta($user_type, $user_id)
    {
        $info_table = null;
        switch ($user_type) {
            case 'Manager':
                $info_table = "manager";
                break;
            case 'Admin':
                $info_table = "admin_info";
                break;
            case 'Teacher':
                $info_table = "teacher_info";
                break;
            default:
                $info_table = "student_info";
                break;
        }
        $SQL_GETMETA_QUERY = $this->DB->query("SELECT * FROM `{$info_table}` JOIN `employees_login` ON `{$info_table}`.`emp_id` = `employees_login`.`User_ID` WHERE `employees_login`.`User_ID` = {$user_id}");
        if ($SQL_GETMETA_QUERY) {
            if ($SQL_GETMETA_QUERY->num_rows > 0) {
                $SQL_DATA = $SQL_GETMETA_QUERY->fetch_all(MYSQLI_ASSOC);
                $USER_META = $SQL_DATA[0];
                return self::response(true, "Information Fetched", "Meta Information Aqquired Successfully!", 200, $USER_META);
            } else {
                return self::response(false, "User Information Missing", "User info not present in the system", 200);
            }
        } else {
            return self::response(false, "Query Error", "Error While Getting user's meta info", 500, [], true, $this->DB->error);
        }
    }
    public function register_teacher(string $name, string $email, string $password, $notify_email)
    {
        global $GET_R;
        $checkUser = $this->get_user('AND', array("User_Email" => $email, "User_Role" => "Teacher"));
        if ($checkUser['status']) {
            return LMS::throw_response(LMS::response(false, "Teacher Already Exists", "Teacher with same email already exists", 200), $GET_R['dashboard']);
        } else {
            if ($checkUser['iserror']) {
                return $checkUser;
            }
        }
        $password_unhashed = $password;
        $password = password_hash($password, PASSWORD_BCRYPT);
        $SQL_REGTEACHER = "INSERT INTO `employees_login`(`User_Email`, `User_Password`, `User_Role`, `user_approved`) VALUES ('{$email}','{$password}','Teacher',1)";
        $SQL_REGTEACHER_RUN = $this->DB->query($SQL_REGTEACHER);
        $last_id = $this->DB->insert_id;
        if ($SQL_REGTEACHER_RUN) {
            $getuser = $this->get_user('AND', ['User_ID' => $last_id]);
            if ($getuser) {
                $usergotten = $getuser['data'][0];
                if ($notify_email == "true") {
                    $emailresp = LMS::email($email, 'ADMIN', ['template' => 'notify_teacher_creds', 'email' => $usergotten['User_Email'], 'password' => $password_unhashed]);
                    if (!$emailresp['status']) {
                        return LMS::response(true, 'Successfully Added', 'Teacher Added Successfully But Email Not Sent', 200, [], false, $emailresp['log']);
                    } else {
                        return LMS::response(true, 'Successfully Added', 'Teacher Added Successfully', 200);
                    }
                } else {
                    return LMS::response(true, 'Successfully Added', 'Teacher Added Successfully', 200);
                }
            } else {
                return $getuser;
            }
        } else {
            return self::response(false, "Query Error", "Error While Getting user's meta info", 500, [], true, $this->DB->error);
        }
    }
}
