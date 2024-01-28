<?php 

$server = "localhost";
$user = "id18808262_myhelthyplus";
$pass = "Bassem96128565@@";
$database = "id18808262_myhelthyplus";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>