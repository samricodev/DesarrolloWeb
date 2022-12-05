<?php 
    include 'main.php';

$id = $_GET['id'];

$sql="SELECT * FROM product WHERE id = '$id'";
$query=mysqli_query($connect,$sql);

$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Actualizar</title>        
    </head>
    <body>
        <section>
            <form action="update.php" method="POST" class="formu">
                    <input type="hidden" name="id" value="<?php echo $row['id']  ?>">    
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" value="<?php echo $row['name']  ?>">
                    <label for="precio">Precio</label>
                    <input type="text" name="precio" value="<?php echo $row['price']  ?>">
                    <label for="contenido">Contenido</label>
                    <input type="text" name="contenido" value="<?php echo $row['content']  ?>">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" name="descripcion" value="<?php echo $row['description']  ?>">
                    <label for="imagen">URL imagen</label>
                    <input type="text" name="imagen" value="<?php echo $row['image']  ?>">                                
                    <input type="submit" class="btn" value="Actualizar">
            </form>
        </section>
    </body>
</html>