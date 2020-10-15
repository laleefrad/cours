<?php
// EXERCICE : Espace de dialogue (tchat, livre d'or, espace de commentaire)
// 01 - création de la BDD : dialogue (phpmyadmin)
// 02 - création de la table commentaire (phpmyadmin)
    // - id_commentaire INT (3) PK AI
    // - pseudo VARCHAR(255)
    // - message TEXT
    // - date_enregistrement (Date et heure) DATETIME (fonction permettant d'avoir cette information avec Mysql : NOW())
// 03 - Créer via PHP une connexion à cette BDD
// 04 - Création d'un formulaire html pour l'ajout des messages
    // - pseudo (input type="text")
    // - message (textarea)
    // - bouton submit
// 05 - Controle sur la récupération des informations du formulaire (isset sur les champs attendus) (var_dump() / print_r())
// 06 - Requete d'enregistrement dans la BDD
// 07 - Requete de récupération des messages afin de les afficher dans de l'html sous le formulaire (une boucle)
// 08 - Sur l'affichage des message : qui, quand et quoi
// 09 - Faire en sorte d'avoir les derniers messages en tête d'affichage (du plus récent vers le plus ancien)
// 10 - Afficher le nombre de message (Il y a X commentaires) (rowCount())
// 11 - Améliorer le visuel (html / css)


// 03 Connexion BDD
$host = 'mysql:host=localhost;dbname=dialogue';
$login = 'root';
$password = '';
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
);
$pdo = new PDO($host, $login, $password, $options);

// echo '<pre>'; print_r($_POST); echo '</pre>';

// 05 & 06 controle et enregistrement
if(isset($_POST['pseudo']) && isset($_POST['message'])) {

    $pseudo = trim($_POST['pseudo']);
    $message = trim($_POST['message']);


    // echo '<pre>'; print_r($_POST); echo '</pre>';

    // avec query() ou exec() MAIS ATTENTION aux injections SQL
    // pour éviter une erreur en cas de ' ou " dans le pseudo ou le message, on utilise la fonction prédéfinie addslashes() qui mettra un antislash devant les ' ou " éventuelles
    // $pseudo = addslashes($pseudo);
    // $message = addslashes($message);
    // $pdo->query("INSERT INTO commentaire (id_commentaire, pseudo, message, date_enregistrement) VALUES (NULL, '$pseudo', '$message', NOW())");

    // Avec prepare() donc sécurisé contre les injection SQL
    $enregistrement = $pdo->prepare("INSERT INTO commentaire (id_commentaire, pseudo, message, date_enregistrement) VALUES (NULL, :pseudo, :message, NOW())");
    $enregistrement->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $enregistrement->bindParam(':message', $message, PDO::PARAM_STR);
    $enregistrement->execute();
    
}






?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
    <!-- Own CSS -->
    <link href="style.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />

    <title>Dialogue</title>
  </head>
  <body class="bg-dark">
    <h1 class="text-white bg-dark p-3 text-center"><i class="far fa-comments"></i> Espace de commentaire <i class="far fa-comments"></i></h1>
    <div class="container border bg-white">
    
        <div class="row">            
            <div class="col-12">
                <form method="post" class="w-50 mx-auto p-3 border mb-3 mt-3">
                    <div class="form-group">
                        <label for="pseudo">Votre pseudo <i class="fas fa-user-astronaut"></i></label>
                        <input type="text" placeholder="Pseudo..." class="form-control" name="pseudo" id="pseudo" value="">
                    </div>
                    <div class="form-group">
                        <label for="message">Votre message <i class="far fa-comment-alt"></i></label>
                        <textarea class="form-control" placeholder="Blablabla..." name="message" id="message"></textarea>
                    </div>
                    <div class="form-group">
                        <hr>
                        <button type="submit" class="w-100 btn btn-outline-dark" name="valider" id="valider">Valider <i class="fas fa-check"></i></button>
                    </div>
                </form>
                <hr>
                <?php 
                    // Affichage des messages
                    // date_format() est une fonction Mysql permettant de formatter une date pour obtenir le format souhaité
                    // Pour obtenir une date au format fr : 
                    // date_format(date_enregistrement, '%d/%m/%Y à %H:%i:%s') // date et heure
                    // date_format(date_enregistrement, '%d/%m/%Y') // Uniquement la date
                    // date_format(date_enregistrement, '%H:%i:%s') // Uniquement l'heure

                    $liste_message = $pdo->query("SELECT pseudo, message, date_format(date_enregistrement, '%d/%m/%Y à %H:%i:%s') AS date_fr FROM commentaire ORDER BY date_enregistrement DESC");
                    echo 'Il y a ' . $liste_message->rowCount() . ' messages.<hr>';

                    while($message = $liste_message->fetch(PDO::FETCH_ASSOC)) {
                        // echo '<pre>'; print_r($message); echo '</pre>';
                        echo '<div class="w-50 mx-auto p-3 border mb-3 mt-3">';
                        echo '<div class="p-2 bg-dark text-white">';
                        echo '<b>Par : </b>' . $message['pseudo'] . '. Le ' . $message['date_fr'];
                        echo '</div>';
                        echo '<hr>' . $message['message'] . '<br>';
                        echo '</div>';
                    }
                
                ?>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>