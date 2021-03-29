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
    <?php echo "Bienvenido " . $_SESSION["user"]["nombre"] . " " . $_SESSION["user"]["apellido"] ?>
    <div class="main-container">
    <h1>VISTA DEL PROFESOR</h1>
    <h5>ESTADES PENDENTS DE REVISAR</h5>
    </div>
<?php include __DIR__ . '../../includes/footer.php'; ?>
</body>
</html>
