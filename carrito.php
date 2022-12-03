<?php

session_start();

include ("conn.php");

$car = array(
    'productos' => array(),
    'subtotal' => 0,
    'total' => 0
);
echo '123';

if(isset($_SESSION["carrito"])){
    $car = $_SESSION["carrito"];
}
$carritosGuardados = [];
if(isset($_SESSION["carritos"])){
    $carritosGuardados = $_SESSION["carritos"];
}

calcular($car, $carritosGuardados);

if(isset($_GET["carrito"])){
    print $_SESSION["carrito"]['total'];
    $id = $_GET["carrito"];
    if($id){
        add($id, $car, $con, $carritosGuardados);
    }
}

if(isset($_GET["remove"])){
    $id = $_GET["remove"];
    echo $id;
    if(isset($id) || $id == 0){
        remove($id, $car, $carritosGuardados);
    }
}

function add($p = [], &$car, &$con, &$carritosGuardados){
    $sql = mysqli_query($con, "SELECT * FROM productos WHERE id = '$p' ");
    $resul = mysqli_fetch_array($sql);
    echo $resul['nombre']." . TOTAL: ".$resul['precio'];
    $resul['cantidad'] = 1;
    array_push($car['productos'], $resul);
    $_SESSION["carrito"] = $car;
    calcular($car, $carritosGuardados);
}

function calcular(&$car, &$carritosGuardados){
    $car['subtotal'] = 0;
    $car['total'] = 0;

    foreach($car['productos'] as &$p){
        $car['subtotal'] += $p['precio'] * $p['cantidad'];
    }
    $car['total'] = $car['subtotal'];
    $_SESSION["carrito"] = $car;

    $carritosGuardados[$car['index']] = $car;
    $_SESSION["carritos"] = $carritosGuardados;
}

function remove($index = 0, &$car, &$carritosGuardados){
    array_splice($car['productos'], $index, 1);
    echo"aelñfjnsgbjnsfibjns";
    echo sizeof($car['productos']);
    calcular($car, $carritosGuardados);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Carrito Total: <?php echo $car['total'] ?></h1>
    <form action="productos.php" method="get">
        <button type="submit" name="p" value="p">Seguir Comprando</button>
    </form>
    <form action="correo.php" method="get">
        <button type="submit" name="comprar" value="comprar">Comprar</button>
    </form>

    <div>
        <?php
            include("conn.php");
            foreach($car['productos'] as $key =>$row){
        ?>
        <div>
            <img src="<?php echo $row['imagen'] ?>">
            <h4>Nombre: <?php echo $row['nombre']?></h4>
            <p>Precio: <?php echo $row['precio']?></p>
            <p>Cantidad: <?php echo $row['cantidad']?></p>
            <form action="carrito.php" method="get">
                <button type="submit" name="remove" value="<?php echo $key ?>"> eli</button>
            </form>
        </div>
        <?php
            }
        ?>
    </div>

</body>
</html>