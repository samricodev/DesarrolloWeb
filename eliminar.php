<?php

include 'main.php';

$id_product =$_GET['id'];

$sql="DELETE FROM product WHERE id ='$id_product'";

$query=mysqli_query($connect,$sql);

    if($query){
        Header("Location: r_products.php");
    }
?>