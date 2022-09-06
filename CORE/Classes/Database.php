<?php
class Database
{
    public $CONN = null;
    public $DBNAME = DBNAME;
    public $DBUSER = DBUSER;
    public $DBPASS = DBPASS;
    public $DBHOST = DBHOST;
    public function __construct()
    {
        $conn_ins = new mysqli($this->DBHOST, $this->DBUSER, $this->DBPASS, $this->DBNAME);
        if ($conn_ins->connect_error) {
            http_response_code(500);
            echo json_encode(['status' => 'false', 'title' => 'Database Error', 'message' => $conn_ins->connect_error, 'code' => 'db_error']);
            die();
        } else {
            $this->CONN = $conn_ins;
        }
    }
}
