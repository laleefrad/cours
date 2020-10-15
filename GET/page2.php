<?php 
// $_GET représente l'url, il s'agit d'une superglobale, attention aux majuscules ! 
// dans une url, lorsque l'on voit un ?, avant le ? c'est l'adresse, après c'est des informations complémentaires que l'on retrouve dans $_GET naturellement

// ?article=jean&prix=40&couleur=bleu&quantite=1
// ?indice1=valeur1&indice2=valeur2&indice3=valeur3&indice4=valeur4

// Les superglobales sont des tableaux array ! 
// $_GET et $_POST existent toujours mais par défaut sont vides.

// terme superglobale car ces variables sont disponibles partout (environnement local et global)
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

        <h1 id="titre_page2">Page 2</h1>
        <hr>
        <a href="page1.php">Aller sur la page 1</a>

        <hr>

        <?php 
        
        // echo '<pre>';
        // print_r($_GET);
        // echo '</pre>';

        // Afficher proprement (echo) les 4 informations présentent dans le tableau array $_GET
        // <p>L'article demandé est : ...</p>
        /*
        if( 
            isset($_GET['article']) && 
            isset($_GET['prix']) && 
            isset($_GET['quantite']) && 
            isset($_GET['couleur'])) {
        */

        if(isset($_GET['article']) && isset($_GET['prix']) && isset($_GET['quantite']) && isset($_GET['couleur'])) {

            echo '<p>L\'article demandé est : ' . $_GET['article'] . '</p>';
            echo '<p>Le prix de cet article est : ' . $_GET['prix'] . '€</p>';
            echo '<p>La couleur de cet article est : ' . $_GET['couleur'] . '</p>';
            echo '<p>La quantité demandé est  : ' . $_GET['quantite'] . '</p>';
        }
            
        
        ?>


        
    </body>
</html>