<?php

include 'main.php';

$email = $_POST['email'];
$pass = $_POST['pass'];

$consulta = mysqli_query($connect,"SELECT * FROM user WHERE email = '$email' && password = '$pass'");

$filas = mysqli_fetch_array($consulta);

if($filas){
    session_start();
    $_SESSION['email'] = $email;
    header('location: products.html');
} else {
    header('location: login.html');
    echo "<h3>Error de autenticación</h3>";
}

mysqli_close($connect);

?>