<?php session_start(); ?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<?php
if ($_POST["user_id"] && $_POST["user_pw"]) {
    require "db_info.php";
    /** @noinspection SqlResolve */
    $sql = "SELECT id, user_id, user_pw FROM Users";
    $result = $db->query($sql);
    while ($row = $result->fetch_assoc()) {
        if ($row["user_id"] == $_POST["user_id"] && $row["user_pw"] == $_POST["user_pw"]) {
            $_SESSION["logged_in"] = true;
            $_SESSION["id"] = $row["id"];
            $_SESSION["user_id"] = $_POST["user_id"];
            echo "<script>window.location.replace(\"./index.php\");</script>";
            break;
        }
    }
    echo "Login failed. Your id was not found";
} else {
    echo "Invalid access!";
}
?>
</body>
</html>