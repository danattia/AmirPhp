<?php

class MailboxCrud {
    private $mysql;

    function __construct($conn) {
        $this->mysql = $conn;
    }

    public function createMailbox() {
        $fullName = isset($_POST['lecturerName']) ? $_POST['lecturerName'] : "";
        $mailboxNumber = isset($_POST['boxNumber']) ? $_POST['boxNumber'] : "";
        $employeeNumber = isset($_POST['lecturerNumber']) ? $_POST['lecturerNumber'] : "";

        if (!empty($fullName) && !empty($mailboxNumber) && !empty($employeeNumber)) {
            $query = "INSERT INTO `mailbox_crud` (`lecturerName`, `boxNumber`, `lecturerNumber`) ";
            $query .= "VALUES ('$fullName', '$mailboxNumber', '$employeeNumber')";

            $result = mysqli_query($this->mysql, $query);
        }
    }

    public function updateMailbox($params) {
        $id = isset($params['id']) ? $params['id'] : -1;
        $fullName = isset($params['lecturerName']) ? $params['lecturerName'] : "";
        $mailboxNumber = isset($params['boxNumber']) ? $params['boxNumber'] : "";
        $employeeNumber = isset($params['lecturerNumber']) ? $params['lecturerNumber'] : "";

        if ($id > 0) {
            $query = "UPDATE `mailbox_crud` SET ";
            $query .= "`lecturerName`='$fullName', ";
            $query .= "`boxNumber`='$mailboxNumber', ";
            $query .= "`lecturerNumber`='$employeeNumber' ";
            $query .= "WHERE id=$id";

            $result = mysqli_query($this->mysql, $query);
        }
    }

    public function getMailboxList() {
        $q = "SELECT * FROM `mailbox_crud`";
        $result = mysqli_query($this->mysql, $q);

        if (!$result) {
            die("Error in query: " . mysqli_error($this->mysql));
        }

        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getMailbox($id) {
        $query = "SELECT * FROM `mailbox_crud` ";
        $query .= " WHERE id=$id";
        $result = mysqli_query($this->mysql, $query);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    public function deleteMailbox($id) {
        $query = "DELETE FROM `mailbox_crud` WHERE id=$id";
        $result = mysqli_query($this->mysql, $query);
    }
}
?>
