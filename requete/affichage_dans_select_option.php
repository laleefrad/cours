<?php

$host = 'mysql:host=localhost;dbname=entreprise';
$login = 'root';
$password = '';
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
);
$pdo = new PDO($host, $login, $password, $options);


$liste_employes = $pdo->query('SELECT * FROM employes');

echo '<select name="test" id="test" style="height: 30px; width: 250px; border: 1px solid #dedede">';

while($ligne = $liste_employes->fetch(PDO::FETCH_ASSOC)) {
    echo '<option value="' . $ligne['id_employes'] . '">' . $ligne['prenom'] .  '</option>';
}

echo '</select>';