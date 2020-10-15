<?php
    // Comme pour setCookie(), l'ouverture d'une session passe par une fonction prédéfinie qui doit obligatoirement être appelée AVANT le moindre affichage dans la page.
    session_start(); // ouverture d'une session PHP
    // session_start() va créer un fichier de session PHP dans le dossier /tmp/ du serveur
    // MAMP, XAMPP, WAMP : à la racine dossier tmp
    // Un cookie est également créé sur le poste utilisateur et ce cookie est lié à la session.

    // l'outil PHP pour la session est une superglobale $_SESSION donc un tableau array !

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <?php
            echo '<hr>Affichage session 1ere fois : <br>';
            echo '<pre>'; print_r($_SESSION); echo '</pre>';

            $_SESSION['pseudo'] = 'admin';
            $_SESSION['mdp'] = 'soleil';
            $_SESSION['email'] = 'admin@mail.fr';
            $_SESSION['date_naissance'] = '1980-01-01';

            echo '<hr>Affichage session 2eme fois : <br>';
            echo '<pre>'; print_r($_SESSION); echo '</pre>';

            // le mot de passe ne devrait pas être dans la session, donc on le supprime :
            // pour supprimer un élément de la session unset()
            unset($_SESSION['mdp']);

            echo '<hr>Affichage session 3eme fois : <br>';
            echo '<pre>'; print_r($_SESSION); echo '</pre>';

            // Pour supprimer une session :
            session_destroy(); // cette instruction permet de supprimer le fichier de session du serveur mais PHP ne l'exécute pas immédiatement. PHP va d'abord exécuter toutes les lignes de code du fichier et ensuite supprimera la session.
            // C'est pour ça que les lignes suivantes peuvent encore afficher la session avant qu'elle soit détruite !
            

            echo '<hr>Affichage session 4eme fois : <br>';
            echo '<pre>'; print_r($_SESSION); echo '</pre>';


        ?>
    </body>
</html>
