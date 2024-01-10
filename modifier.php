<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier / Suprimer</title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
    <h1>Modifier / Suprimer</h1>
    <nav>
        <a href="./index.php">Home</a>
        <a href="./recherche.php">Rechercher </a>
        <a href="./ajouter.php">Ajouter un livre</a>
        <a href="./modifier.php">Modifier / Suprimer </a>
    </nav>
    <div class="modifier">
        <?php
            require_once './DB/conexion.php';
            $sql = "DESCRIBE livres";
            $res = $pdo->query($sql);
            $colonnes = $res->fetchAll();
            echo'<div>';
            foreach ($colonnes as $row){
                echo '<span>'.$row[0]."</span>";
            }
            echo '<span>.</span>';
            echo '<span>.</span>';
            echo'</div>';
            if (isset($_POST['suprimer'])){
                $id = $_POST['suprimer'];
                $sql = "DELETE FROM livres WHERE ID_Livre = ?";
                $res = $pdo->prepare($sql);
                $res->execute([$id]);
           }
            if (isset($_POST['0'])){
                $id = $_POST['0'];
                $titre = $_POST['1'];
                $auteur = $_POST['2'];
                $anne = $_POST['3'];
                $sql = "UPDATE livres SET Titre = ? ,Auteur = ? ,Anne = ? WHERE ID_Livre = ?";
                $res = $pdo->prepare($sql);
                $res->execute([$titre,$auteur,$anne,$id]);
            }
            $sql= "SELECT * FROM livres";
            $res = $pdo->query($sql);
            $tab = $res->fetchAll(PDO::FETCH_NUM);
            
            if (isset($_POST['idRow'])){
                $id = $_POST['idRow'];
                foreach ($tab as $row){
                    if ($row[0] == $id){
                        echo "<form method='post' action='./modifier.php'>";
                        echo "<span>$id</span>;
                        <input type='hidden' name='0' value=".$row[0].">";
                        for ($i=1 ; $i< count($row);$i++){
                            echo "<input type='text' name='$i' value='".htmlentities($row[$i])."'/>";
                        }
                        

                        echo "
                        <input type='submit' value='sauvegarder'/>
                        </form>";
                        
                    }
                    else{
                        echo'<div>';

                        for ($i=0 ; $i< count($row);$i++){
                            echo "<span>".htmlentities($row[$i])."</span>";
                        }
                        echo'</div>';
                    }
                }   
                
            }
            else{
                
                foreach ($tab as $row){
                    echo'<div>';
                    for ($i=0 ; $i< count($row);$i++){
                        echo "<span>".htmlentities($row[$i])."</span>";
                    }
                    echo"
                        <form method='post' action='./modifier.php'>
                        <input type='hidden' name='idRow' value=".$row[0].">
                        <input type='submit' value='modifier'>
                        </form>
                        <form method='post' action='./suprimer.php'>
                        <input type='hidden' name='idSupr' value=".$row[0].">
                        <input type='submit' value='suprimer'>
                        </form>
                    ";
                    echo'</div>';
                }

            }
        ?>
    </div>
</body>
</html>
