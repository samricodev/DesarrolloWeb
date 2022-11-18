<?php

include 'main.php';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$pass = $_POST['pass'];

$insertion = "INSERT INTO users (id, name, last_name, email, password) VALUES ('0','$nombre','$apellido','$email','$pass')";

$set_insertion = mysqli_query($connect,$insertion);

if($set_insertion){
    echo '<h3>Te has registrado</h3>';
    header('location: login.html');
} else {
    header('location: register.html');
    echo '<h3>Error en el registro de usuario!</h3>';
}

mysqli_close($connect);

?>