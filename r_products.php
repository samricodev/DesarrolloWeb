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
    <style>

        table{
            margin-top: 10px;
            border-collapse: collapse;
        }

        table thead {
            padding: 5px;
            background-color: #000;
            color: #fff;
        }

        table tbody{
            background-color: #c1cdca;
            color: #000;
        }

        table tbody tr td{
            text-align: justify;
            padding: 0 1rem ;
        }

        table tbody tr .url {
            text-align: justify;
        }
        
        .boton-editar{
            font-weight: 600;
            padding: 5px;
            width: auto;
            color: #fff;
            background-color: #21424f;
            border: none;
            border-radius: 10px;
        }

        .boton-editar:hover{
            background-color: #306073;
            cursor: pointer;
        }

        .boton-eliminar{
            font-weight: 600;
            padding: 5px;
            width: auto;
            color: #fff;
            background-color: #AF0200;
            border: none;
            border-radius: 10px;
        }

        .boton-eliminar:hover{
            background-color: #E20300;
            cursor: pointer;
        }

    </style>
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
                <a href="products.php">
                    <li>Productos</li>
                </a>
            </ul>
        </nav>
    </header>
    <div class="cover2">
        <h2>SamCoffee</h2>
        <p>El mejor café del condado</p>
    </div>
    <h1 class="titulo">Administrar Productos</h1>
    <form action="insertar.php" method="POST" class="formu">
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
            <button  type="submit" class="btn">Agregar</button>
    </form>
    <section>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Contenido</th>
                    <th>Descripcion</th>
                    <th>URL imagen</th>
                    <th>Opciones</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <tr class="filas">
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['price'] ?></td>
                        <td><?php echo $row['content'] ?></td>
                        <td><?php echo $row['description'] ?></td>
                        <td><?php echo $row['image'] ?></td>
                        <td>
                            <a href="vista_update.php?id=<?php echo $row['id'] ?>" class="boton-editar">Editar</a>
                        </td>
                        <td>
                            <a href="eliminar.php?id=<?php echo $row['id'] ?>" class="boton-eliminar">Eliminar</a>
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