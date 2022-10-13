<?php

$db_name = "samcoffe_bd";
$db_host = "localhost";
$db_user = "root";
$db_password = "";

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$pass = $_POST['pass'];

$connect = mysqli_connect($db_host,$db_user,$db_password,$db_name);

if(!$connect){
    die("Error". mysqli_connect_error());
}

echo "Connected..";

$insertion = "INSERT INTO user (id, name, last_name, email, password) VALUES ('0','$nombre','$apellido','$email','$pass')";

$set_insertion = mysqli_query($connect,$insertion);

if($set_insertion){
    echo "Register done";
} else {
    echo "Syntax error";
}

mysqli_close($connect);

?>