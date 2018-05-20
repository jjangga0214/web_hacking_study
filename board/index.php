<?php
session_start();
?>
<html>
<head>
    <title>Free Board</title>
</head>
<body>
<header>
    <div>
        <?php
        if ($_SESSION["logged_in"]) {
            echo("Welcome, " . $_SESSION["user_id"] . ".");
        } else {
            echo("
            <form action='./login.php' method='post'>
                ID: <input type='text' name='user_id' required>
                PW: <input type='password' name='user_pw' required>
                <input type='submit' value='Login'>
            </form>
            <input type='submit' value='Register' onclick='window.location.replace(\"register.php\")'>
            ");
        }
        ?>
    </div>
</header>
</body>
</html>