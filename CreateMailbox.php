<?php
session_start();
include "mysql_connection.php";
$mysqlObj = new MysqlConnection();
$mysql = $mysqlObj->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['token']) && ($_POST['token'] == $_SESSION['TOKEN'])) { // CSRF protection
        include "MailboxCrud.php";
        $mailboxCrud = new MailboxCrud($mysql);
        $mailboxCrud->createMailbox();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Mailbox</title>
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
<h2>Create Mailbox</h2>
<form method="POST" action="">
    <input type="hidden" name="token" value="<?= $_SESSION['TOKEN'] ?>" /> <!-- CSRF protection !-->

    <label for="lecturerName">Full Name:</label>
    <input type="text" name="lecturerName" placeholder="Full Name" required />

    <label for="boxNumber">Mailbox Number:</label>
    <input type="text" name="boxNumber" placeholder="Mailbox Number" required />

    <label for="lecturerNumber">Employee Number:</label>
    <input type="text" name="lecturerNumber" placeholder="Employee Number" required />

    <button type="submit" name="createBtn" value="1">Create Mailbox</button>
</form>
</body>
</html>
