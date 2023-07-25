<?php

include("../persistencia/conexion.php");
$conex = conectar();
$query = "SELECT * FROM persona"; //Select para mostrar todos los clientes persona
$res = mysqli_query($conex, $query);

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Rubber Ahiru">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar cliente persona </title>
    <!--<link rel="shortcut icon" type="image/x-icon" href="">
    <link rel="stylesheet" href="./assets/css/style.css">-->
</head>
<body>
    <h1>Lista de Clientes</h1>
        
    <div>
        <table border="2">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Tipo de Documento</th>
                    <th>Numero de Documento</th>
                    <th> </th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                <?php while($fila = mysqli_fetch_array($res)) :?>
                <tr>
                    <th><?= $fila['id']?></th>
                    <th><?= $fila['nombre']?></th>
                    <th><?= $fila['apellido']?></th>
                    <th><?= $fila['doc_tipo']?></th>
                    <th><?= $fila['doc_num']?></th>
                    <th><?= $fila['']?></th>
                </tr>
                <?php endwhile;?>
            </tbody>
        </table>
    </div>
</body>
</html>