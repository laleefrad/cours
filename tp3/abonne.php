<?php
    include 'inc/init.inc.php';

    // déclaration de variable vide pour éviter des erreurs d'affichage. Cette information sera dans le champ caché du formulaire avant le bouton de validation et servira uniquement lors d'une modification : 
    $id_abonne = '';

    $prenom_modif = '';
    // Modification d'un abonné : récupération des informations de l'abonné
    if(isset($_GET['action']) && $_GET['action'] == 'modifier' && !empty($_GET['id_abonne'])) {
        $id_abonne = $_GET['id_abonne'];
        // on va chercher les informations de l'abonné que l'on veut modifier en BDD afin de placer les informations dans le formulaire via des variables : 
        $recup_abonne = $pdo->prepare("SELECT * FROM abonne WHERE id_abonne = :id_abonne");
        $recup_abonne->bindParam(':id_abonne', $id_abonne, PDO::PARAM_STR);
        $recup_abonne->execute();  
        // on vérifie si on a récupéré une ligne : 
        if($recup_abonne->rowCount() > 0) {
            $infos_abonne = $recup_abonne->fetch(PDO::FETCH_ASSOC);
            $prenom_modif = $infos_abonne['prenom'];
            $id_abonne = $infos_abonne['id_abonne'];
        }
    }

    // Suppression d'un abonne : 
    if(isset($_GET['action']) && $_GET['action'] == 'supprimer' && !empty($_GET['id_abonne'])) {
        // si action existe dans $_GET & si savaleur est égale à "supprimer" & si l'indice id_abonne n'est pas vide dans $_GET
        $id_abonne = $_GET['id_abonne'];

        // on prépare la requete : 
        $enregistrement_abonne = $pdo->prepare("DELETE FROM abonne WHERE id_abonne = :id_abonne");
        // on fourni la valeur au marqueur nominatif :prenom
        $enregistrement_abonne->bindParam(':id_abonne', $id_abonne, PDO::PARAM_STR);
        // on déclenche l'enregistrement avec execute()
        $enregistrement_abonne->execute();

    }

    // Enregistrement dans la BDD d'un nouvel abonné
    if(isset($_POST['prenom'])) { // si l'indice prénom existe dans $_POST (si le formulaire a été validé)
        $prenom = $_POST['prenom'];

        // on prépare la requete : 
        if(empty($_POST['id_abonne'])) {
            // si id abonne est vide dans post : ENREGISTREMENT
            $enregistrement_abonne = $pdo->prepare("INSERT INTO abonne (prenom) VALUES (:prenom)");
        } else {
            // sinon : MODIFICATION
            $enregistrement_abonne = $pdo->prepare("UPDATE abonne SET prenom = :prenom WHERE id_abonne = :id_abonne");
            $enregistrement_abonne->bindParam(':id_abonne', $_POST['id_abonne'], PDO::PARAM_STR);
        }
        // on fourni la valeur au marqueur nominatif :prenom
        $enregistrement_abonne->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        // on déclenche l'enregistrement avec execute()
        $enregistrement_abonne->execute();
    }

    


    include 'inc/header.inc.php';
    include 'inc/nav.inc.php';
?>

        <div class="row">
            <div class="col-sm-12">
                <h1>Abonnés</h1>
                <hr>
                <form method="post" class="border p-3">
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="prenom">Prénom</label>
                            <input type="text" name="prenom" id="prenom" class="form-control" value="<?php echo $prenom_modif; ?>">
                        </div>
                        <div class="form-group col-6">
                            <label>&nbsp;</label>
                            <!-- AJOUT D'UN CHAMP CACHE POUR CONTENIR L'ID ABONNE EN CAS DE MODIF -->
                            <input type="hidden" name="id_abonne" value="<?php echo $id_abonne; ?>">
                            <button type="submit" class="btn btn-outline-primary w-100" name="enregistrer" id="enregistrer" >Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 mt-5">
                <h2>Affichage des abonnés</h2>
                <hr>
                <?php 
                    // récupération des abonnés depuis la BDD
                    $liste_abonnes = $pdo->query("SELECT * FROM abonne");
                    echo '<p>Il y a ' . $liste_abonnes->rowCount() . ' abonnés</p><hr>';

                    // Construction du tableau : 
                    // les colonnes : 
                    echo '<table class="table table-bordered text-center">';
                    echo '<tr class="bg-dark text-white">';
                    echo '<th>Id abonné</th><th>Prénom</th>';
                    // ajout des colonnes pour modifier et supprimer
                    echo '<th>Modifier</th>';
                    echo '<th>Supprimer</th>';
                    echo '</tr>';

                    // les lignes avec les données
                    while($abonne = $liste_abonnes->fetch(PDO::FETCH_ASSOC)) {
                        echo '<tr>';
                        echo '<td>' . $abonne['id_abonne'] . '</td>';
                        echo '<td>' . $abonne['prenom'] . '</td>';
                        // ajout des cellules pour modifier et supprimer
                        echo '<th><a href="?action=modifier&id_abonne=' . $abonne['id_abonne'] . '">✏</a></th>';
                        echo '<th><a href="?action=supprimer&id_abonne=' . $abonne['id_abonne'] . '">✖</a></th>';
                        echo '</tr>';
                    }



                ?>
            </div>
        </div>



<?php       
    include 'inc/footer.inc.php';