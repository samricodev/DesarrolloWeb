<?php
$db_name = "samcoffe_bd";
$db_host = "localhost";
$db_user = "root";
$db_password = "";

$connect = mysqli_connect($db_host,$db_user,$db_password,$db_name);

if(!$connect){
    die("Error". mysqli_connect_error());
}

echo "Connected..";
?>