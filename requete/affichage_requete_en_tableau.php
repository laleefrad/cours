<?php
// Dans ce fichier, nous allons mettre en place un script permettant d'afficher n'importe quelle requete sous forme de tableau HTML

$host = 'mysql:host=localhost;dbname=bibliotheque';
$login = 'root';
$password = '';
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
);
$pdo = new PDO($host, $login, $password, $options);

$resultat = $pdo->query("SELECT * from emprunt");

echo '<table border="1" style="border-collapse: collapse; width: 100%;">';

// on commence par afficher la ligne des colonnes : 
echo '<tr>';
// $resultat->columnCount() : le nombre de colonnes contenues dans la réponse
for($i = 0; $i < $resultat->columnCount(); $i++) {
    // $resultat->getColumnMeta($i) : nous renvoie un ensemble d'information sur la colonne en cours, notamment le "name"
    $colonne = $resultat->getColumnMeta($i);
    // echo '<pre>'; print_r($colonne); echo '</pre>';
    echo '<th style="padding: 10px;">' . $colonne['name'] . '</th>';
}
echo '</tr>';

// nous pouvons maintenant afficher les données du tableau.
// comme les colonnes sont dans l'ordre de la réponse sql, les données aussi nous pouvons donc utiliser un foreach
while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
    echo '<tr>';
    foreach($ligne AS $valeur) {
        echo '<td style="padding: 10px;">' . $valeur . '</td>';
    }
    echo '</tr>';
}

echo '</table>';








