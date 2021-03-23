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
        <table>
                <thead>
                    <tr>
                        <td>Niu</td>
                        <td>Nom</td>
                        <td>Cognom</td>
                        <td>Telefon</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($users as $user) {
                            echo "<tr>";
                            echo "<td>".$user['niu']."</td>";
                            echo "<td>".$user['nombre']."</td>";
                            echo "<td>".$user['apellido']."</td>";
                            echo "<td>".$user['telefono']."</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
        </table>
    </div>
<?php include __DIR__ . '../../includes/footer.php'; ?>
</body>
</html>
