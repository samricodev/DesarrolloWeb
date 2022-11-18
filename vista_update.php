<?php 
    include 'main.php';

$id = $_GET['id'];

$sql="SELECT * FROM products WHERE id = '$id'";
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
            <form action="update.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id']  ?>">    
                    <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $row['name']  ?>">
                    <input type="text" name="precio" placeholder="Precio" value="<?php echo $row['price']  ?>">
                    <input type="text" name="contenido" placeholder="Contenido" value="<?php echo $row['content']  ?>">
                    <input type="text" name="descripcion" placeholder="Descripcion" value="<?php echo $row['description']  ?>">
                    <input type="text" name="imagen" placeholder="URL imagen" value="<?php echo $row['image']  ?>">                                
                    <input type="submit" class="btn" value="Actualizar">
            </form>
        </section>
    </body>
</html>