<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulaire 1</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        
        <div class="conteneur">
            <h1>Formulaire 1</h1>

            <?php
                //echo '<pre>';
                //print_r($_POST);
                //echo '</pre>';

                // afficher proprement (echo) les informations provenants du formulaire.
                if(isset($_POST['prenom']) && isset($_POST['description'])) {
                    echo '<p>Prénom : ' . $_POST['prenom'] . '</p><hr>';
                    echo '<p>Description : ' . $_POST['description'] . '</p><hr>';
                }
            ?>

            <hr>
            <!--
                Attribut du formulaire : 
                ------------------------
                method="" => soit POST soit GET : la méthode utilisée pour récupérer les données  

                action="" => l'url cible où l'on envoie les données lors de la validation du form. Si vide : on reste sur la même page

                enctype="multipart/form-data" => obligatoire si l'on a des pièces jointes (input type="file") dans le form sinon on ne récupère pas les pièces jointes.

                name="" => obligatoire sur les champs dont on veut récupérer la valeur.


             --> 
            <form method="post" action="" enctype="multipart/form-data">
            
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom" value=""><br><br>
                
                <label for="description">Description</label>
                <textarea id="description" rows="7" name="description"></textarea><hr>

                <input type="submit" name="valider" id="valider" value="Valider">
            </form>
        </div>

    </body>
</html>