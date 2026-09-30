<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "ijazah_tkj";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>
