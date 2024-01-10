<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suprimer</title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
    <h2>Voulez vous vraiment suprimer : </h2>
    <?php
        require './DB/conexion.php';
        $id = $_POST['idSupr'];
        $sql = "SELECT * FROM livres WHERE ID_Livre = ?";
        $res = $pdo->prepare($sql);
        $res->execute([$id]);
        $row = $res->fetch();
        $titre = $row[1];
        $auteur = $row[2];
        $anne = $row[3];

        echo "
        <p> Titre : $titre </p>
        <p> Anne : $anne </p>
        <p> Auteur : $auteur </p>
        <form method='post' action='modifier.php'>
        <input type='hidden' name='suprimer' value='$id'/>
        <input type='submit' value='suprimer'/>
        </form>
        "

    ?>
    
</body>
</html>