<?php
    include "main.php";

    $sql = "SELECT *  FROM product";
    $query = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" type="image/jpg" href="/assets/taza-de-cafe.png"/>
    <title>Productos</title>
</head>
<body>
    <header>
        <nav>
            <a href="index.html" class="logo"><h1>SamCoffee</h1></a>
            <ul>
                <a href="index.html"><li>Inicio</li></a>
                <a href="login.html"><li>Ingresar</li></a>
                <a href="carrito.php">
                    <li><img src="./assets/carrito-de-compras.png" alt=""></li>
                </a>
            </ul>
        </nav>
    </header>
    <div class="cover2">
        <h2>SamCoffee</h2>
        <p>El mejor café del condado</p>
    </div>
    <div class="grillita">
        <h2>Disfruta de lo mejor</h2>
        <p>
            Tenemos una variedad de productos
            que satisfacen todos tus gustos
        </p>
    </div>
    <div class="products">
        <?php while($row = mysqli_fetch_array($query)){
        ?>
        <div class="product">
            <div class="img-products">
                <img src="<?php echo $row['image']?>" alt="<?php echo $row['description']?>">
            </div>
            <div>
                <p><?php echo $row['name']?></p>
                <p><b>$<?php echo $row['price']?></b></p>
                <form action="carrito.php" method="get">
                    <button type="submit" class="btn" name="carrito" value="<?php echo $row['id']?>">Agregar</button>
                </form>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
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