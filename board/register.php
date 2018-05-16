<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="./register.php" method="post">
    <label> ID:
        <input type="text" name="user_id" required>
    </label> <br>
    <label> PW:
        <input type="password" name="user_pw" required>
    </label> <br>
    <input type="submit" value="register">
</form>
<?php
if ($_POST["user_id"] && $_POST["user_pw"]) {
    $db_address = "localhost";
    $db_id = "root";
    $db_pw = "";
    $db_name = "free_board";

    $db = new mysqli($db_address, $db_id, $db_pw, $db_name);

    if ($db->connect_error) {
        die("while constructing database connection, error occurred" . $db->connect_error);
    }

    /** @noinspection SqlDialectInspection */
    $_POST["user_id"] = trim($_POST["user_id"]);
    $_POST["user_id"] = stripslashes($_POST["user_id"]);
    $_POST["user_id"] = htmlspecialchars($_POST["user_id"]);

    $_POST["user_pw"] = trim($_POST["user_pw"]);
    $_POST["user_pw"] = stripslashes($_POST["user_pw"]);
    $_POST["user_pw"] = htmlspecialchars($_POST["user_pw"]);

    /** @noinspection SqlDialectInspection */
    $sql = "INSERT INTO Users (user_id, user_pw) VALUES (" . $_POST["user_id"] . "," . $_POST["user_pw"] . ");";
    $result = $db->query($sql);
    echo "Register was success. We would redirect you to the index page";
    echo "<script>setTimeout(function () {window.location.href = \"index.html\";}, 3000)</script>";
}
?>
</body>
</html>