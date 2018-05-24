<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    if(isset($_SESSION["id"])) {
        echo "Hello, ".$_SESSION["id"];
    } else {
        echo "<script> alert('login required'); window.location('./5.html'); </script>";
    }
    ?>
</body>
</html>
