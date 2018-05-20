<?php
$db_address = "localhost";
$db_id = "root";
$db_pw = "";
$db_name = "free_board";

$db = new mysqli($db_address, $db_id, $db_pw, $db_name);

if ($db->connect_error) {
    die("while constructing database connection, error occurred" . $db->connect_error);
}