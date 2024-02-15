<?php

require 'conexion.php';

$st = Conexion::conectar()->prepare('SELECT * FROM lugares');
$st->execute();
$res = $st->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FPDF - Reporte FPDF desde base de datos</title>
        <link href="./main.css" rel="stylesheet">
    </head>
    <body>

        <div class="content">
            <div class="header-content">
                <h3>Lugares</h3>
            </div>

            <div class="body-content">
                <table>
                    <thead>
                        <tr>
                            <td>Nombre</td>
                            <td>Descripción</td>
                            <td>Imagen</td>
                            <td>Reporte</td>
                        </tr>
                    </thead>

                    <template>
                        <tr>
                            <td cellName></td>
                            <td cellDescription></td>
                            <td cellImage><img></td>
                            <td cellButton><button type="button">Imprimir </button></td>
                        </tr>
                    </template>

                    <tbody>

                    <?php

                        foreach ($res as $key => $value) {
                            echo '<tr> 
                                    <td>'. $value['nombre'] .'</td> 
                                    <td>'. $value['descripcion'] .'</td> 
                                    <td><img src="./img/'. $value['img'] .'"></td> 
                                    <td><button type="button" id="'. $value['id'] .'">Imprimir</button></td> 
                                </tr>';
                        }

                    ?>


                        <!--<tr> 
                            <td>Nombre</td> 
                            <td>Descripcion</td> 
                            <td><img src="./img/tree.jpg"></td> 
                            <td><button type="button">Imprimir</button></td> 
                        </tr>-->

                    </tbody>

                </table>
            </div>
        </div>
    
    </body>

    <script src="./main.js"></script>
</html>
