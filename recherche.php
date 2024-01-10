<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rechercher</title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
    <h1>Rechercher</h1>
    <nav>
        <a href="./index.php">Home</a>
        <a href="./recherche.php">Rechercher </a>
        <a href="./ajouter.php">Ajouter un livre</a>
        <a href="./modifier.php">Modifier / Suprimer </a>
    </nav>
    <form method="get" action="./recherche.php">
        <input type="text" name='recherche'>
        <select name="type">
            <?php
                require './DB/conexion.php';
                $sql = "DESCRIBE livres";
                $res = $pdo->query($sql);
                $colonnes = $res->fetchAll();
                foreach ($colonnes as $row){
                    echo "<option value=".$row[0].">".$row[0]."</option>";
                }
            ?>
        </select>
        <input type="submit" value="rechercher">
    </form>
    <?php
        function checkType($t){
            return true;
        }
        function checkRecherche($r){
            return true;
        }
        if( isset($_GET['recherche'])){
            $type = $_GET['type'];
            $recherche = $_GET['recherche'];
            if (checkType($type)){
                $sql = "SELECT * FROM livres WHERE $type LIKE ?";
                $res = $pdo->prepare($sql);
                if (checkRecherche($recherche))
                $res->execute([$recherche]);
                $tab = $res->fetchAll(PDO::FETCH_NUM);
                if (count($tab) > 0){
                    echo '<table>';
                    foreach ($tab as $row){
                        for ($i=0 ; $i< count($row);$i++){
                            echo "<td>".htmlentities($row[$i])."</td>";
                        }
                        echo'</tr>';
                    }
                    echo '</table>';
                }
                else{
                    echo "<p> Livre introuvable </p>";
                }
            }

        }
    ?>
</body>
</html>