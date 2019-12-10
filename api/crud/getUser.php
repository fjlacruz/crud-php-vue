<?php 
include '../conexion.php';
$user = $_SESSION['user'];
echo json_encode($user);
?>