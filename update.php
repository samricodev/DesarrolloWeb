<?php

include 'main.php';

$id_product = $_POST['id'];
$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];
$precio = $_POST['precio'];
$contenido=$_POST['contenido'];
$img = $_POST['imagen'];

$sql="UPDATE product SET name='$nombre',price='$precio',content='$contenido',description='$descripcion',image='$img' WHERE id ='$id_product'";
$query=mysqli_query($connect,$sql);

    if($query){
        Header("Location: r_products.php");
    }
?>