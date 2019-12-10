<?php 
include '../conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
$email = $con ->real_escape_string(htmlentities($_POST['email']));
$pass = $con ->real_escape_string(htmlentities($_POST['pass']));

$sel = $con->query("SELECT user,foto,email,pass FROM usuarios WHERE email = '$email' ");

if ($f = $sel->fetch_assoc()) {
   $correo = $f['email'];
   $password = $f['pass'];
   $user = $f['user'];
   $foto = $f['foto'];
}

$passEncriptada = password_verify($pass,$password);

if ($email == $correo && $passEncriptada == true) {
    $_SESSION['user'] = $user;
    $_SESSION['foto'] = $foto;
    echo "success";
} else {
    echo "fail";
}


$sel->close();
$con->close();
}
else{
    header("location:../../index.php");
}
?>