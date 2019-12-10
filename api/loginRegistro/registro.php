<?php 
include '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {

$usuario = $con->real_escape_string(htmlentities($_POST['usuario']));
$pass = $con->real_escape_string(htmlentities($_POST['pass']));
$email = $con->real_escape_string(htmlentities($_POST['email']));

$extension = '';
$ruta = '../api/loginRegistro/foto_perfil';
$archivo = $_FILES['foto']['tmp_name'];
$nombrearchivo = $_FILES['foto']['name'];
$info = pathinfo($nombrearchivo);
if ($archivo != '' ) {
    $extension = $info['extension'];

    if ($extension == 'png' || $extension == 'PNG' || $extension == 'jpg' || $extension == 'JPG') {
        $nombreFile = $usuario.rand(0000,9999).'.'.$extension;
        move_uploaded_file($archivo,'foto_perfil/'.$nombreFile);
        $ruta = $ruta.'/'.$nombreFile;
    } else {
        echo "fail";
        exit;
    }
    

} else {
    $ruta = '../api/loginRegistro/foto_perfil/perfil.png';
}

$passEncriptada = password_hash($pass, PASSWORD_BCRYPT);
$ins = $con -> query("INSERT INTO usuarios VALUES(DEFAULT,'$usuario','$email','$passEncriptada','$ruta')");

if ($ins) {
    echo "success";
} else {
    echo "fail";
}



} else {
    header("location:../../index.php");
}


?>