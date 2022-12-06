<?php

session_start();

include ("main.php");

$car = array(
    'productos' => array(),
    'subtotal' => 0,
    'total' => 0
);

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
        add($id, $car, $connect, $carritosGuardados);
    }
}

if(isset($_GET["remove"])){
    $id = $_GET["remove"];
    // echo $id;
    if(isset($id) || $id == 0){
        remove($id, $car, $carritosGuardados);
    }
}

function add($p = [], &$car, &$connect, &$carritosGuardados){
    $sql = mysqli_query($connect, "SELECT * FROM product WHERE id = '$p' ");
    $resul = mysqli_fetch_array($sql);
    $resul['content'] = 1;
    array_push($car['productos'], $resul);
    $_SESSION["carrito"] = $car;
    calcular($car, $carritosGuardados);
}

function calcular(&$car, &$carritosGuardados){
    $car['subtotal'] = 0;
    $car['total'] = 0;
    $car['index'] = 0;

    foreach($car['productos'] as &$p){
        $car['subtotal'] += $p['price'];
    }
    $car['total'] = $car['subtotal'];
    $_SESSION["carrito"] = $car;

    $carritosGuardados[$car['index']] = $car;
    $_SESSION["carritos"] = $carritosGuardados;
}

function remove($index = 0, &$car, &$carritosGuardados){
    array_splice($car['productos'], $index, 1);
    calcular($car, $carritosGuardados);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet" />
    <title>Carrito</title>
    <style>
        body{
            background-color: #efefef;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .boton{
            font-weight: 600;
            padding: 5px;
            width: auto;
            color: #fff;
            background-color: #000;
            border: none;
            border-radius: 10px;
        }

        .boton:hover{
            background-color: rgba(0,0,0,0.85);
            cursor: pointer;
        }
        
        footer{
            position: fixed !important;
            bottom: 0;
            width: 100%;
        }

    </style>
</head>
<body>
<header>
        <nav>
        <h1>Carrito Total: <?php echo $car['total'] ?></h1>
            <ul>
                <li>
                    <form action="products.php" method="get">
                        <button type="submit" name="p" value="p" class="boton" >Seguir Comprando</button>
                    </form>
                </li>
                <li>
                    <form action="#" method="get">
                        <button type="submit" name="comprar" value="comprar" class="boton" >Comprar</button>
                    </form>
                </li>
            </ul>
        </nav>
</header>
    <div class="quedabien">
        <div class="products">
        <?php
            include("main.php");
            foreach($car['productos'] as $key =>$row){
        ?>
            <div class="product">
                <div class="img-products">
                    <img src="<?php echo $row['image']?>" alt="<?php echo $row['description']?>">
                </div>
                <div>
                    <p><?php echo $row['name']?></p>
                    <p><b>$<?php echo $row['price']?></b></p>
                    <form action="carrito.php" method="get">
                        <button type="submit" name="remove" value="<?php echo $key ?>" class="btn">Eliminar</button>
                    </form>
                </div>
            </div>
        <?php
            }
        ?>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <footer>
         <div>
            <ul>
                <li><a href="#"><img src="./assets//facebook.png"></a></li>
                <li><a href="#"><img src="./assets/instagram.png"></a></li>
                <li><a href="#"><img src="./assets/twitter.png"></a></li>
            </ul>
        </div>
        <div>
            <p>SamCoffee ©️ Todos los derechos reservados</p>
        </div>
    </footer>
</body>
</html>