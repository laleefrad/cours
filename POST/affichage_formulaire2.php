<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Affichage formulaire 2</title>
    </head>
    <body>
        <div class="conteneur">

            <?php 
                // echo '<pre>'; var_dump($_POST); echo '</pre>';

                // afficher proprement le pseudo et le mail (si ça existe)
                if(isset($_POST['pseudo']) && isset($_POST['email'])) {
                    echo '<p>Pseudo : ' . $_POST['pseudo'] . '</p>';
                    echo '<p>Email : ' . $_POST['email'] . '</p><hr>';

                    $pseudo = $_POST['pseudo'];
                    $email = $_POST['email'];

                    // EXERCICE : 
                    // Controler la taille du pseudo, le pseudo doit avoir entre 4 et 14 caractères inclus. ( iconv_strlen() )
                    // Si la pseudo n'a pas la bonne taille, on affiche un message d'erreur ( <p>Attention, le pseudo doit avoir entre 4 et 14 caractères inclus</p> )

                    echo '<p>Taille du pseudo ' . iconv_strlen($pseudo) . '</p>';

                    // controle sur la taille du pseudo
                    if(iconv_strlen($pseudo) < 4 || iconv_strlen($pseudo) > 14) {
                        echo '<div class="erreur">Attention,<br>Le pseudo doit avoir entre 4 et 14 caractères inclus.<br>Veuillez vérifier vos saisies</div>';
                    }

                    // controle sur le format du mail
                    // filter_var() avec le filtre FILTER_VALIDATE_EMAIL renvoie false si le mail n'est pas correct, sinon renvoie le mail

                    // if(filter_var($email, FILTER_VALIDATE_EMAIL) == false)
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        // avec le ! devant le filter_var() on demande si la réponse est false
                        echo '<div class="erreur">Attention,<br>Le mail n\'a pas un format valide.<br>Veuillez vérifier vos saisies</div>';
                    }




















                } // fin des if isset




            ?>

        </div>
    </body>
</html>