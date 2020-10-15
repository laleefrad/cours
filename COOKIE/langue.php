<?php 
    if(isset($_GET['langue'])) {

        $langue = $_GET['langue']; 

    } elseif(isset($_COOKIE['langue'])) {

        $langue = $_COOKIE['langue'];

    } else {

        $langue = 'fr';
        
    }

    // setCookie(le_nom, sa_valeur, duree_de_vie)
    $un_an = 365*24*3600; // le nombre de seconde dans une année
    // ⚠ ATTENTION, la fonction setCookie() doit être exécutée avant le moindre affichage html !!!!!! ⚠
    setCookie("langue", $langue, time() + $un_an); 
    
    // on teste la valeur de la variable langue
    switch($langue) {
        case 'fr' : 
            $message = '<h3>Bonjour</h3><p>Vous visitez actuellement le site en langue française</p>';
        break;
        case 'es' : 
            $message = '<h3>Hola</h3><p>Vous visitez actuellement le site en langue espagnole</p>';
        break;
        case 'it' : 
            $message = '<h3>Ciao</h3><p>Vous visitez actuellement le site en langue italienne</p>';
        break;
        case 'en' : 
            $message = '<h3>Hello</h3><p>Vous visitez actuellement le site en langue anglaise</p>';
        break;
        default : 
            $message = '<h3>Langue inconnue</h3>';
        break;
    }


?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h2>Votre langue : </h2>
        <ul>
            <li><a href="?langue=fr">français</a></li>
            <li><a href="?langue=es">espagnol</a></li>
            <li><a href="?langue=it">italien</a></li>
            <li><a href="?langue=en">anglais</a></li>
        </ul>
        <hr>
        <?php 
            echo $message; 
            echo '<hr>';
            echo time(); // affiche le timestamp (nb de secondes écoulées depuis le 1er janvier 1970)
            echo '<pre>'; print_r($_COOKIE); echo '</pre>';















            
        ?>
    </body>
</html>