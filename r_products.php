<?php
include 'main.php';

$sql = "SELECT *  FROM product";
$query = mysqli_query($connect, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registrar Productos</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="css/style.css" rel="stylesheet" />
</head>

<body>
    <header>
        <nav>
            <a href="index.html" class="logo">
                <h1>SamCoffee</h1>
            </a>
            <ul>
                <a href="index.html">
                    <li>Inicio</li>
                </a>
                <a href="#">
                    <li>Ingresar</li>
                </a>
                <a href="products.html">
                    <li>Productos</li>
                </a>
                <a href="index.html#mapa">
                    <li>Contáctanos</li>
                </a>
            </ul>
        </nav>
    </header>
    <div class="cover2">
        <h2>SamCoffee</h2>
        <p>El mejor café del condado</p>
    </div>
    <h1 class="titulo">Ingrese el producto</h1>
    <form action="insertar.php" method="POST">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre"  required/>
            <label for="descripcion">Descripcion</label>
            <input type="text" name="descripcion" id="descripcion" required>
            <label for="contenido">Contenido en ml.</label>
            <input type="text" name="contenido" id="contenido" required/>
            <label for="precio">Precio</label>
            <input type="number" name="precio" id="precio">
            <label for="imagen">Link de imagen</label>
            <input type="text" id="imagen" name="imagen" required>
            <button  type="submit" class="btn">Enviar</button>
    </form>
    <section class="grillita">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Contenido</th>
                    <th>Descripcion</th>
                    <th>URL imagen</th>
                </tr>
            </thead>

            <tbody>
                <?php
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['price'] ?></td>
                        <td><?php echo $row['content'] ?></td>
                        <td><?php echo $row['description'] ?></td>
                        <td><?php echo $row['image'] ?></td>
                        <td>
                            <a href="vista_update.php?id=<?php echo $row['id'] ?>" class="btn btn-info">Editar</a>
                        </td>
                        <td>
                            <a href="eliminar.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </section>
    <footer>
        <div>
            <p>©️ 2022 SamCoffee Company Reservados todos los derechos</p>
        </div>
    </footer>
</body>
</html>