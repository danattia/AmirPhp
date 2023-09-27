<?php
session_start();
include "mysql_connection.php";

$mysqlObj = new MysqlConnection();
$mysql = $mysqlObj->getConnection();

include "MailboxCrud.php";
$mailboxCrud = new MailboxCrud($mysql);
$mailboxList = $mailboxCrud->getMailboxList();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            background: gray;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h1>Mailboxes List</h1>
<table>
    <tr>
        <th>Edit</th>
        <th>Full Name</th>
        <th>Mailbox Number</th>
        <th>Employee Number</th>
        <th>Remove</th>
    </tr>
    <?php foreach ($mailboxList as $row) { ?>
        <tr>
            <td><a href="./EditMailbox.php?mid=<?= $row['id'] ?>">Edit</a></td>
            <td><?= htmlspecialchars($row['lecturerName']) ?></td>
            <td><?= htmlspecialchars($row['boxNumber']) ?></td>
            <td><?= htmlspecialchars($row['lecturerNumber']) ?></td>
            <td><a href="./RemoveMailbox.php?remove_id=<?= $row['id'] ?>">Remove</a></td>
        </tr>
    <?php } ?>
</table>
</body>
</html>