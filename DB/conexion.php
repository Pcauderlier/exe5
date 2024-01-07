<?php

$host = "localhost"; // ne change pas qu'on soit en local ou en distant
$db = "exe5"; //user de phpmyadmin
$user = "root"; // user de phpmyadmin
$pass= "root"; // mdp de phpmyadmin
$chrs = "utf8mb4";
$attr = "mysql:host=$host;dbname=$db;charset=$chrs";
$opts= [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_BOTH,
    // PDO::FETCH_ASSOC = lie le nom des colones du tableau a leurs valeurs
    //PDO::FETCH_NUM = lie le numéros des colonnes à leurs valeurs (commence a 0)
    //PDO::FETCH_BOTH = Lie les 2 du dessus mais en contrepartie => redondance des informations
    // chaque valeurs s'affiche 2 fois dans le tableau, une fois avec le num et une fois avec le nom de colonne

];

$pdo = new PDO ($attr, $user, $pass, $opts);

?>