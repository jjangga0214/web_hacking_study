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
if ($_POST['user_id'] && $_POST["user_pw"]) {
    $db_address = "localhost";
    $db_id = "root";
    $db_pw = "";
    $db_name = "free_board";

    $db = new mysqli($db_address, $db_id, $db_pw, $db_name);

    if ($db->connect_error) {
        die("while constructing database connection, error occurred" . $db->connect_error);
    }
    $user_id = $db->real_escape_string($_POST["user_id"]);
    $user_pw = $db->real_escape_string($_POST["user_pw"]);

    $sql = "INSERT INTO User(user_id, user_pw) VALUES('$user_id', '$user_pw')";
    if ($db->query($sql) === TRUE) {
        echo "Register was success. We would redirect you to the index page in 3 seconds";
        echo "<script>setTimeout(function () {window.location.href = \"index.php\";}, 3000)</script>";
    } else {
        echo "Error occurs".$db->error;
    };
}
$db->close();
?>
</body>
</html>