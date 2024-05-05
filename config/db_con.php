<?php

$db_server = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "dashboard";

$con = mysqli_connect($db_server, $db_user, $db_password, $db_name);

if (!$con){
    die("Connection failed: ". mysqli_connect_error());
}
?>