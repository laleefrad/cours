<?php
    // Connexion à la BDD
    $host = 'mysql:host=localhost;dbname=eboutique';
    $login = 'root';
    $password = '';
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    );
    $pdo = new PDO($host, $login, $password, $options);


    // Variable destinée à afficher des messages utilisateurs.
    $msg = '';

    // Ouverture de la session notamment pour conserver les informations utilisateur lors de la connexion (voir dans connexion.php)
    session_start();