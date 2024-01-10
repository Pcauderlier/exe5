<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
    <h1>Ma librairie</h1>
    <nav>
        <a href="./index.php">Home</a>
        <a href="./recherche.php">Rechercher </a>
        <a href="./ajouter.php">Ajouter un livre</a>
        <a href="./modifier.php">Modifier / Suprimer </a>
    </nav>
    <?php
        require './DB/conexion.php';
        $sql = "DESCRIBE livres";
        $res = $pdo->query($sql);
        $colonnes = $res->fetchAll();
        echo'<table><tr>';
        foreach ($colonnes as $row){
            echo '<th>'.$row[0]."</th>";
        }
        echo'</tr>';
        $sql= "SELECT * FROM livres";
        $res = $pdo->query($sql);
        $tab = $res->fetchAll(PDO::FETCH_NUM);
        foreach ($tab as $row){
            echo'<tr>';
            for ($i=0 ; $i< count($row);$i++){
                echo "<td>".htmlentities($row[$i])."</td>";
            }
            echo'</tr>';
        }
        echo'</table>';
       
    ?>
</body>
</html>

<!-- 
[
    [titre, auteur, anne , id,titre, auteur, anne , id],
    [titre, auteur, anne , id],
    [titre, auteur, anne , id],
    [titre, auteur, anne , id],
] -->