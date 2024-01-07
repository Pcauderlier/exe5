<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
    <h1>Home</h1>
    <nav>
        <a href="./index.php">Home</a>
        <a href="./recherche.php">Rechercher </a>
        <a href="./ajouter.php">Ajouter un livre</a>
        <a href="./modifier.php">Modifier / Suprimer </a>
    </nav>
    <?php
        require './DB/conexion.php';
    ?>
</body>
</html>