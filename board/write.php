<?php session_start(); ?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Board - Write</title>
</head>
<body>

<?php
if ($_SESSION["logged_in"]) {
    if ($_POST["author"] && $_POST["title"] && $_POST["content"]) {
        require "db_info.php";
        $author = $db->real_escape_string($_POST["author"]);
        $title = $db->real_escape_string($_POST["title"]);
        $content = $db->real_escape_string($_POST["content"]);

        /** @noinspection SqlResolve */
        $sql = "INSERT INTO Board (author, title, conetent) VALUES ('$author', '$title', '$content');";
        if ($db->query($sql) === TRUE) {
            echo "Writing was success. We would redirect you to the index page in 3 seconds";
            echo "<script>setTimeout(function () {window.location.href = \"index.php\";}, 3000)</script>";
        } else {
            echo "Error occurs" . $db->error;
        };
    } else {
        echo "
        <form method='post' action='write.php'>
            title: <input type='text' name = 'title'> <br>
            content: <input type='text' name='content' style='height: 40%; overflow: scroll;'> <br>
            <input type='submit' value='write'>
        </form>
        ";
    }
} else {
    echo "invalid access, login pleases";
}
?>
</body>
</html>