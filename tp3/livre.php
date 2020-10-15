<?php
    include 'inc/init.inc.php';

    // déclaration de variable vide pour éviter des erreurs d'affichage. Cette information sera dans le champ caché du formulaire avant le bouton de validation et servira uniquement lors d'une modification : 
    $id_livre = '';

    $auteur_modif = '';
    $titre_modif = '';
    // Modification d'un livre : récupération des informations du livre
    if(isset($_GET['action']) && $_GET['action'] == 'modifier' && !empty($_GET['id_livre'])) {
        $id_livre = $_GET['id_livre'];
        // on va chercher les informations du livre que l'on veut modifier en BDD afin de placer les informations dans le formulaire via des variables : 
        $recup_livre = $pdo->prepare("SELECT * FROM livre WHERE id_livre = :id_livre");
        $recup_livre->bindParam(':id_livre', $id_livre, PDO::PARAM_STR);
        $recup_livre->execute();  
        // on vérifie si on a récupéré une ligne : 
        if($recup_livre->rowCount() > 0) {
            $infos_livre = $recup_livre->fetch(PDO::FETCH_ASSOC);
            $auteur_modif = $infos_livre['auteur'];
            $titre_modif = $infos_livre['titre'];
            $id_livre = $infos_livre['id_livre'];
        }
    }
    

    // Suppression d'un livre : 
    if(isset($_GET['action']) && $_GET['action'] == 'supprimer' && !empty($_GET['id_livre'])) {
        // si action existe dans $_GET & si savaleur est égale à "supprimer" & si l'indice id_livre n'est pas vide dans $_GET
        $id_livre = $_GET['id_livre'];

        // on prépare la requete : 
        $enregistrement_abonne = $pdo->prepare("DELETE FROM livre WHERE id_livre = :id_livre");
        // on fourni la valeur au marqueur nominatif :id_livre
        $enregistrement_abonne->bindParam(':id_livre', $id_livre, PDO::PARAM_STR);
        // on déclenche l'enregistrement avec execute()
        $enregistrement_abonne->execute();

    }

    // Enregistrement dans la BDD d'un nouveau livre
    if(isset($_POST['auteur']) && isset($_POST['titre'])) { // si l'indice prénom auteur & l'indice titre existe dans $_POST (si le formulaire a été validé)
        $auteur = $_POST['auteur'];
        $titre = $_POST['titre'];

        // on prépare la requete : 
        if(empty($_POST['id_livre'])) {
            // si id livre est vide dans post : ENREGISTREMENT
            $enregistrement_livre = $pdo->prepare("INSERT INTO livre (auteur, titre) VALUES (:auteur, :titre)");
        } else {
            // sinon : MODIFICATION
            $enregistrement_livre = $pdo->prepare("UPDATE livre SET auteur = :auteur, titre = :titre WHERE id_livre = :id_livre");
            $enregistrement_livre->bindParam(':id_livre', $_POST['id_livre'], PDO::PARAM_STR);
        }

        // on fourni la valeur aux marqueurs nominatifs :auteur & :titre
        $enregistrement_livre->bindParam(':auteur', $auteur, PDO::PARAM_STR);
        $enregistrement_livre->bindParam(':titre', $titre, PDO::PARAM_STR);
        // on déclenche l'enregistrement avec execute()
        $enregistrement_livre->execute();
    }


    include 'inc/header.inc.php';
    include 'inc/nav.inc.php';
?>
        <div class="row">
            <div class="col-sm-12">
                <h1>Livres</h1>
                <hr>
                <form method="post" class="border p-3">
                    <div class="form-row">
                        <div class="form-group col-4">
                            <label for="auteur">Auteur</label>
                            <input type="text" name="auteur" id="auteur" value="<?php echo $auteur_modif; ?>" class="form-control">
                        </div>
                        <div class="form-group col-4">
                            <label for="titre">Titre</label>
                            <input type="text" name="titre" id="titre" value="<?php echo $titre_modif; ?>" class="form-control">
                        </div>
                        <div class="form-group col-4">
                            <label>&nbsp;</label>
                            <!-- AJOUT D'UN CHAMP CACHE POUR CONTENIR L'ID LIVRE EN CAS DE MODIF -->
                            <input type="hidden" name="id_livre" value="<?php echo $id_livre; ?>">
                            <button type="submit" class="btn btn-outline-primary w-100" name="enregistrer" id="enregistrer" >Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 mt-5">
                <h2>Affichage des livres</h2>
                <hr>
                <?php 
                    // récupération des livres depuis la BDD
                    $liste_livre = $pdo->query("SELECT * FROM livre");
                    echo '<p>Il y a ' . $liste_livre->rowCount() . ' livres</p><hr>';

                    // Construction du tableau : 
                    // les colonnes : 
                    echo '<table class="table table-bordered text-center">';
                    echo '<tr class="bg-dark text-white">';
                    echo '<th>Id livre</th><th>Auteur</th><th>Titre</th>';
                    // ajout des colonnes pour modifier et supprimer
                    echo '<th>Modifier</th>';
                    echo '<th>Supprimer</th>';
                    echo '</tr>';

                    // les lignes avec les données
                    while($livre = $liste_livre->fetch(PDO::FETCH_ASSOC)) {
                        echo '<tr>';
                        echo '<td>' . $livre['id_livre'] . '</td>';
                        echo '<td>' . $livre['auteur'] . '</td>';
                        echo '<td>' . $livre['titre'] . '</td>';
                        // ajout des cellules pour modifier et supprimer
                        echo '<th><a href="?action=modifier&id_livre=' . $livre['id_livre'] . '">✏</a></th>';
                        echo '<th><a href="?action=supprimer&id_livre=' . $livre['id_livre'] . '">✖</a></th>';
                        echo '</tr>';
                    }



                ?>
            </div>
        </div>




<?php       
    include 'inc/footer.inc.php';