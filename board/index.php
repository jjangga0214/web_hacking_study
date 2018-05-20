<?php
session_start();
?>
<html>
<head>
    <title>Free Board</title>
</head>
<body>
<header>
    <div style='border-bottom: 1px solid black; text-align: right; height: 2em; margin-bottom: 0;'>
        <?php
        if ($_SESSION["logged_in"]) {
            echo("Welcome, " . $_SESSION["user_id"] . ".");
            echo("
            <table style='width: 100%;'>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                </tr>
            ");
            for ($i = 0; $i < 20; ++$i) {
                /** @noinspection SqlResolve */
                $sql = "SELECT * FROM Board WHERE id = $i";
                require "db_info.php";
                $result = $db->query($sql);
                $result = $result->fetch_assoc();
                echo "
                    <tr>
                        <td>" . $result['title'] . "</td>
                        <td>" . $result['author'] . "</td>
                    </tr>
                ";
            }
        } else {
            echo("
            <form action='./login.php' method='post'>
                ID: <input type='text' name='user_id' required>
                PW: <input type='password' name='user_pw' required>
                <input type='submit' value='Login'>
                <button type='button' onclick='window.location.replace(\"register.php\")'>Register </button>
            </form>
            ");
        }
        ?>
    </div>
</header>
</body>
</html>