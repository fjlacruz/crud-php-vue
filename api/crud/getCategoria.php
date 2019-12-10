<?php 
include '../conexion.php';

$cat = $con->real_escape_string(htmlentities($_GET['cat']));
$temporal = array();
$resultado = array();

$sel = $con->query("SELECT * FROM snippets WHERE categoria = '$cat' ");

while ($f = $sel->fetch_assoc()) {
    $temporal = $f;
    array_push($resultado, $temporal);
}

echo json_encode($resultado);

$sel->close();
$con->close();

?>