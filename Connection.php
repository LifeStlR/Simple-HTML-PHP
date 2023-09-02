<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "session";
 
$mysqli = new mysqli($host, $user, $pass, $db);
if (!$mysqli) {
    die("<script>alert('Gagal tersambung dengan database')</script>");
}
?>