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
        } else if ($_POST["user_id"] && $_POST["user_pw"]) {
            $db_address = "localhost";
            $db_id = "root";
            $db_pw = "";
            $db_name = "free_board";

            $db = new mysqli($db_address, $db_id, $db_pw, $db_name);

            if ($db->connect_error) {
                die("while constructing database connection, error occurred" . $db->connect_error);
            }

            /** @noinspection SqlDialectInspection */
            $sql = "SELECT user_id, user_pw FROM free_board";
            $result = $db->query($sql);
            while ($row = $result->fetch_assoc()) {
                if ($row["user_id"] == $_POST["user_id"] && $row["user_pw"] == $_POST["user_pw"]) {
                    $_SESSION["logged_in"] = true;
                    $_SESSION["user_id"] = "user_id";
                    echo "<script>window.location.replace(\"./index.php\");</script>";
                    break;
                }
            }
            echo "Login failed. Your id was not found";
        } else {
            echo("
            <form action='' method='post'>
                ID: <input type='text' name='user_id' required>
                PW: <input type='password' name='user_pw' required>
                <input type='submit' value='Login'>
            </form>
            <input type='submit' value='Register' onclick='window.location.replace(\"index.php\")'>
            ");
        }
        ?>
    </div>
    ?>
</header>
</body>
</html>