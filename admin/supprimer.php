<?php 
include '../init.php';
session_start();

if (!isset($_SESSION['id'])) {header("Location: ../index.php");}

    
    $idmed = $_GET['idmed'];
    $sql = "DELETE  FROM `medecin` WHERE id = ".$idmed;
    mysqli_query($conn, $sql);
    header("Location: index.php"); 
?>