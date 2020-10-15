<?php
    // Connexion à la BDD
    $host = 'mysql:host=localhost;dbname=connexion';
    $login = 'root';
    $password = '';
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    );
    $pdo = new PDO($host, $login, $password, $options);


?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Connexion</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        
        <div class="conteneur">
            <h1>Connexion</h1>
            <?php
                if(isset($_POST['pseudo']) && isset($_POST['mdp'])) {
                    // si le formulaire a été validé

                    $pseudo = $_POST['pseudo'];
                    $mdp = $_POST['mdp'];

                    $req = "SELECT * FROM utilisateur WHERE pseudo = '$pseudo' AND mdp = '$mdp'"; // avec injection
                    echo $req . '<hr>';

                    // on execute la requete.
                    $resultat = $pdo->query($req); // avec injection

                    
                    if($resultat->rowCount() < 1) {
                        // s'il n'y a pas de ligne dans $resultat, alors erreur sur le pseudo et ou le mdp
                        echo '<div style="padding: 20px; background-color: red; color: white; text-align : center;">Attention,<br> erreur sur le pseudo et/ou le mot de passe.<br>Veuillez vérifier vos saisies</div>';
                    } else {
                        // on a une ligne donc le pseudo et le mdp sont corrects
                        // on traite la ligne avec un fetch pour la transformer en tableau array
                        $infos = $resultat->fetch(PDO::FETCH_ASSOC);
                        echo '<div style="padding: 20px; background-color: green; color: white; text-align: center;">Connexion Ok!</div><hr>';

                        foreach($infos AS $ind => $val) {
                            echo '<b>' . $ind . ' : </b>' . $val . '<hr>';
                        }

                    } 
                }// fin des if isset
            ?>

            <hr>
            
            <form method="post" action="" >
            
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" id="pseudo" value=""><br><br>
                
                <label for="mdp">Mot de passe</label>
                <input type="text" name="mdp" id="mdp" value=""><hr>

                <input type="submit" name="valider" id="valider" value="Connexion">
            </form>

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>

    </body>
</html>