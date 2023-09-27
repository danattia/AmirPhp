<?php
include "mysql_connection.php";
$mysqlObj = new MysqlConnection();
$mysql = $mysqlObj->getConnection();

include "MailboxCrud.php";
$mailboxCrud = new MailboxCrud($mysql);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mailboxCrud->updateMailbox($_POST);
    header("location:./MailBoxList.php");
}

$id = isset($_GET['mid']) ? $_GET['mid'] : -1;
$row = $mailboxCrud->getMailbox($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Mailbox</title>
    <style>
        body {
            background: gray;
        }

        label, input {
            display: block;
            margin-bottom: 10px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<h1>Update Mailbox</h1>
<form method="POST" action="">
    <input type="hidden" name="id" value="<?= $id ?>" />
    <label for="lecturerName">Full Name:</label>
    <input type="text" name="lecturerName" value="<?= $row['lecturerName'] ?>" required />

    <label for="boxNumber">Mailbox Number:</label>
    <input type="text" name="boxNumber" value="<?= $row['boxNumber'] ?>" required />

    <label for="lecturerNumber">Employee Number:</label>
    <input type="text" name="lecturerNumber" value="<?= $row['lecturerNumber'] ?>" required />

    <button type="submit" name="editBtn" value="1">Update</button>
</form>
</body>
</html>
