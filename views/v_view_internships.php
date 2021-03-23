<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include __DIR__ . '../../includes/libraries.php'; ?>
</head>
<body>
    <?php include __DIR__ . '../../includes/header.php'; ?>
    <div class="main-container row col-12 p-5">
    <h1>VISTA DE ESTADES DE PRÀCTIQUES</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">ID Estancia</th>
            <th scope="col">Niu Estudiant</th>
            <th scope="col">Niu Profesor</th>
            <th scope="col">Data Inici</th>
            <th scope="col">Data Fi</th>
            </tr>
        </thead>
         <tbody>
                     <?php
                        foreach ($internships as $internship) {
                            echo "<tr>";
                            echo "<th scope='row'>".$internship['id_estancia']."</td>";
                            echo "<td>".$internship['niu_estudiante']."</td>";
                            echo "<td>".$internship['niu_profesor']."</td>";
                            echo "<td>".$internship['fecha_inicio']."</td>";
                            echo "<td>".$internship['fecha_fin']."</td>";
                            echo "</tr>";
                        }
                    ?>
        </tbody>
    </table>   
    </div>
<?php include __DIR__ . '../../includes/footer.php'; ?>
</body>
</html>