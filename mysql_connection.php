<?php
include "prams.php";

class MysqlConnection {
    private $conn;

    function __construct(){
        global $db_host, $db_user, $db_pass, $db_schema;
        $this->conn = new mysqli($db_host, $db_user, $db_pass, $db_schema);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}
?>