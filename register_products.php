<?php

include 'main.php';

$nombre = $_POST['nombre'];
$contenido = $_POST['contenido'];
$precio = $_POST['precio'];
$descripcion = $_POST['descripcion'];
$imagen = $_POST['imagen'];

$insertion_products = "INSERT INTO products (id, name, price, content, description, image) VALUES ('0','$nombre','$precio','$contenido','$descripcion','$imagen')";

$set_insertion_products = mysqli_query($connect,$insertion_products);

if($set_insertion_products){
    echo '<h3>Producto registrado!</h3>';
    header('location: register_products.html');
} else{
    echo '<h3>Registro de producto denegado</h3>';
}

mysqli_close($connect);

?>