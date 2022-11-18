<?php

include 'main.php';

$email = $_POST['email'];
$pass = $_POST['pass'];

$consulta = mysqli_query($connect,"SELECT * FROM users WHERE email = '$email' && password = '$pass'");
$consulta_admin = mysqli_query($connect,"SELECT * FROM users WHERE email = '$email' && password = '$pass' && login = 1");


$filas = mysqli_fetch_array($consulta);
$filas_admin = mysqli_fetch_row($consulta_admin);

if($filas_admin){
    session_start();
    $_SESSION['email'] = $email;
    header('location: r_products.php');
}else if($filas){
    session_start();
    $_SESSION['email'] = $email;
    header('location: products.html');
} else {
    header('location: login.html');
    echo "<h3>Error de autenticación</h3>";
}

mysqli_close($connect);

?>