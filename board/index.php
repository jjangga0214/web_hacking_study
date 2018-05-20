<?php
session_start();
?>
<html>
<head>
    <title>Free Board</title>
    <style>
        #btn_write {
            border: 1px solid black;
        }
    </style>
</head>
<body>
<header>
    <div style='border-bottom: 1px solid black; text-align: right; height: 2em; margin-bottom: 0;'>
        <?php
        if ($_SESSION["logged_in"]) {
            echo("Welcome, " . $_SESSION["user_id"] . ".");
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
<?php
echo("
    <table style='width: 100%; text-align: center;border-bottom: 1px solid black;'>
        <tr>
            <th>Title</th>
            <th>Author</th>
        </tr>
        ");
for ($i = 1; $i < 20; ++$i) {
    /** @noinspection SqlResolve */
    $sql = "SELECT * FROM Board WHERE id = $i";
    require "db_info.php";
    $result = $db->query($sql);
    $result = $result->fetch_assoc();
    if (!$result) {
        continue;
    }
    /** @noinspection SqlResolve */
    $id = $result['author'];

    /** @noinspection SqlResolve */
    $user_id = $db->query("SELECT user_id FROM Users WHERE id = $id");
    $user_id = $user_id->fetch_assoc();
    echo "
        <tr>
            <td><a href='index.php?id=$i'>" . $result['title'] . "</a></td>
            <td>" . $user_id["user_id"] . "</td>
        </tr>
        ";
}
echo "</table>";
if ($_SESSION["logged_in"]) {
    echo "<a id='btn_write' href='write.php'>write</a>";
} else {
    echo "<a id='btn_write' onclick='alert(\"login please\")'>write</a>";
}
if ($_GET["id"]) {
    $id = $_GET["id"];
    /** @noinspection SqlResolve */
    $result_c = $db->query("SELECT content FROM Board WHERE id = $id;");
    $result_c = $result_c->fetch_assoc();
    echo ($result_c["content"]);
}
?>
</body>
</html>