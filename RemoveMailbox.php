<?php
include "mysql_connection.php";
$mysqlObj = new MysqlConnection();
$mysql = $mysqlObj->getConnection();

include "MailboxCrud.php";
$mailboxCrud = new MailboxCrud($mysql);

if (isset($_GET['remove_id'])) {
    $mailbox_id = $_GET['remove_id'];
    $mailboxCrud->deleteMailbox($mailbox_id);
    header("location: ./MailBoxList.php");
}
?>
