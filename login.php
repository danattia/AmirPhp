<?php
session_start();
$loginAttempts = isset($_SESSION['login_attempts']) ? $_SESSION['login_attempts'] : 0;

if ($loginAttempts < 5) {
    if (isset($_POST['login'])) {
        $password = isset($_POST['password']) ? $_POST['password'] : "";

        if ($password === "AAA") {
            header("location: MailBoxList.php");
            setcookie("User", $password); // Cookie position
            $_SESSION['TOKEN'] = substr(md5(rand(100, 999)), 0, 10); // CSRF protection
        } else {
            echo "Incorrect password. Try again.";
            setcookie("User", 0); // Cookie position
            $loginAttempts++; // Track login attempts
        }
    }
} else {
    echo " Please try again.";
}

$_SESSION['login_attempts'] = $loginAttempts; // Track login attempts
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mailbox Login</title>
    <style>
        body {
            background: gray;
        }

        h2 {
            text-align: center;
            padding: 20px;
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
            display: block;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<h2>Mailbox Login</h2>
<form method="POST" action="">
    <label for="password">Password:</label>
    <input type="password" name="password" required>

    <button type="submit" name="login" value="1">Login</button>
</form>
</body>
</html>
