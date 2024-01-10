<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un livre</title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
    <h1>Ajouter un livre</h1>
    <nav>
        <a href="./index.php">Home</a>
        <a href="./recherche.php">Rechercher </a>
        <a href="./ajouter.php">Ajouter un livre</a>
        <a href="./modifier.php">Modifier / Suprimer </a>
    </nav>
    <form action="./ajouter.php" method="post">
        <label>Titre du livre : </label>
        <input type="text" name="titre">
        <label>Auteur : </label>
        <input type="text" name="auteur">
        <label>Année : </label>
        <input type="text" name="anne">
        <input type="submit" value="ajouter un livre">
    </form>
    <?php 
        function checkTitre($t){
            return true;
        }
        function checkAuteur($a){
            return true;
        }
        function checkAnne($t){
            return true;
        }
        require './DB/conexion.php';
        if (isset($_POST['titre'])){
            $sql = "INSERT INTO livres (Titre,Auteur,Anne) VALUES (? , ? , ?)";
            $res = $pdo->prepare($sql);
            $titre = $_POST['titre'];
            $anne = $_POST['anne'];
            $auteur = $_POST['auteur'];


            if(checkTitre($titre) && checkAuteur($auteur) && checkAnne($anne)){
                $res->execute([$titre,$auteur,$anne]);
                if($res){
                    echo " 
                        <p> Titre : $titre </p>
                        <p> Anne : $anne </p>
                        <p> Auteur : $auteur </p>
                    ";
                }
            }
        }
    ?>
    
</body>
</html>