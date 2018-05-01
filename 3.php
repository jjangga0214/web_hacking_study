<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>admin page</title>
</head>
<body>
    <?php
        if($_POST["id"] == "admin") {
            echo ("Hello Admin : ".$_POST["pw"]);
        } else {
            echo "You're not admin. Get out of here!";
        }
    ?>
</body>
</html>