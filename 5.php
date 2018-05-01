<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
        if($_POST["pw"] == "password") {
            $_SESSION["id"] = $_POST["id"];
            echo ("<script> window.location='./6.php' </script>");
        } else {
            echo("<script> alert(\"Wrong password\") </script>");
            echo("<script> history.go(-1) </script>");
        }
    ?>
</body>
</html>