<?php
    include 'inc/init.inc.php';

    // déclaration de variable vide pour éviter des erreurs d'affichage. Cette information sera dans le champ caché du formulaire avant le bouton de validation et servira uniquement lors d'une modification : 
    $id_emprunt = '';

    $id_abonne_modif = '';
    $id_livre_modif = '';
    $date_sortie_modif = '';
    $date_rendu_modif = '';
    // Modification d'un emprunt : récupération des informations de l'emprunt
    if(isset($_GET['action']) && $_GET['action'] == 'modifier' && !empty($_GET['id_emprunt'])) {
        $id_emprunt =$_GET['id_emprunt'];
        // on va chercher les informations de l'emprunt que l'on veut modifier en BDD afin de placer les informations dans le formulaire via des variables : 
        $recup_emprunt = $pdo->prepare("SELECT id_emprunt, id_livre, id_abonne, date_format(date_sortie, '%d/%m/%Y') AS date_sortie_fr, date_format(date_rendu, '%d/%m/%Y') AS date_rendu_fr FROM emprunt WHERE id_emprunt = :id_emprunt");
        $recup_emprunt->bindParam(':id_emprunt', $id_emprunt, PDO::PARAM_STR);
        $recup_emprunt->execute();  
        // on vérifie si on a récupéré une ligne : 
        if($recup_emprunt->rowCount() > 0) {
            $infos_emprunt = $recup_emprunt->fetch(PDO::FETCH_ASSOC);
            $id_emprunt = $infos_emprunt['id_emprunt'];
            $id_abonne_modif = $infos_emprunt['id_abonne'];
            $id_livre_modif = $infos_emprunt['id_livre'];
            $date_sortie_modif = $infos_emprunt['date_sortie_fr'];
            $date_rendu_modif = $infos_emprunt['date_rendu_fr'];
        }
    }


    // Suppression d'un emprunt : 
    if(isset($_GET['action']) && $_GET['action'] == 'supprimer' && !empty($_GET['id_emprunt'])) {
        // si action existe dans $_GET & si sa valeur est égale à "supprimer" & si l'indice id_emprunt n'est pas vide dans $_GET
        $id_emprunt = $_GET['id_emprunt'];

        // on prépare la requete : 
        $enregistrement_abonne = $pdo->prepare("DELETE FROM emprunt WHERE id_emprunt = :id_emprunt");
        // on fourni la valeur au marqueur nominatif :id_emprunt
        $enregistrement_abonne->bindParam(':id_emprunt', $id_emprunt, PDO::PARAM_STR);
        // on déclenche l'enregistrement avec execute()
        $enregistrement_abonne->execute();

    }

    // Enregistrement dans la BDD d'un nouvel emprunt
    if(isset($_POST['id_abonne']) && isset($_POST['id_livre']) && isset($_POST['date_sortie']) && isset($_POST['date_rendu'])) { // si l'indice prénom auteur & l'indice titre existe dans $_POST (si le formulaire a été validé)
        $id_abonne = $_POST['id_abonne'];
        $id_livre = $_POST['id_livre'];
        $date_sortie = $_POST['date_sortie'];
        $date_rendu = $_POST['date_rendu'];

        // traitement de la date sortie en format EN
        $date_fr_to_en = explode('/', $date_sortie);
        // echo '<pre>'; print_r($date_fr_to_en); echo '</pre>';
        $date_sortie_en = $date_fr_to_en[2] . '-' . $date_fr_to_en[1] . '-' . $date_fr_to_en[0];

        // Si date rendu est vide alors on met NULL dedans pour la BDD sinon, traitement de la date pour l'avoir au format EN
        if(empty($date_rendu)) {
            $date_rendu = NULL;
        } else {
            $date_fr_to_en = explode('/', $date_rendu);
            // echo '<pre>'; print_r($date_fr_to_en); echo '</pre>';
            $date_rendu_en = $date_fr_to_en[2] . '-' . $date_fr_to_en[1] . '-' . $date_fr_to_en[0];
        }

        // on prépare la requete : 
        if(empty($_POST['id_emprunt'])) {
            // si id emprunt est vide dans post : ENREGISTREMENT
            $enregistrement_emprunt = $pdo->prepare("INSERT INTO emprunt (id_abonne, id_livre, date_sortie, date_rendu) VALUES (:id_abonne, :id_livre, :date_sortie, :date_rendu)");
        } else {
            // sinon : MODIFICATION
            $enregistrement_emprunt = $pdo->prepare("UPDATE emprunt SET id_abonne = :id_abonne, id_livre = :id_livre, date_sortie = :date_sortie, date_rendu = :date_rendu WHERE id_emprunt = :id_emprunt");
            $enregistrement_emprunt->bindParam(':id_emprunt', $_POST['id_emprunt'], PDO::PARAM_STR);
        }

        
        // on fourni la valeur aux marqueurs nominatifs :id_abonne, :id_livre, :date_sortie, :date_rendu
        $enregistrement_emprunt->bindParam(':id_abonne', $id_abonne, PDO::PARAM_STR);
        $enregistrement_emprunt->bindParam(':id_livre', $id_livre, PDO::PARAM_STR);
        $enregistrement_emprunt->bindParam(':date_sortie', $date_sortie_en, PDO::PARAM_STR);
        $enregistrement_emprunt->bindParam(':date_rendu', $date_rendu_en, PDO::PARAM_STR);
        // on déclenche l'enregistrement avec execute()
        $enregistrement_emprunt->execute();
    }


    include 'inc/header.inc.php';
    include 'inc/nav.inc.php';
    // echo '<pre>'; print_r($_POST); echo '</pre>';
?>

        <div class="row">
            <div class="col-sm-12">
                <h1>Emprunts</h1>
                <hr>
                <form method="post" class="border p-3">
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="id_abonne">Abonné</label>
                            <select name="id_abonne" class="form-control">
                                <?php 
                                    // récupération des abonnés de la BDD pour construire les options
                                    $liste_abonnes = $pdo->query("SELECT * FROM abonne");
                                    while($abonne = $liste_abonnes->fetch(PDO::FETCH_ASSOC)) {
                                        $selected = '';
                                        if($id_abonne_modif == $abonne['id_abonne']) {
                                            $selected = 'selected';
                                        }
                                        echo '<option value="' . $abonne['id_abonne'] . '" ' . $selected . '>' . $abonne['id_abonne'] . ' - ' . $abonne['prenom'] . '</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="id_livre">Livre</label>
                            <select name="id_livre" class="form-control">
                            <?php 
                                    // récupération des livres de la BDD pour construire les options
                                    $liste_livre = $pdo->query("SELECT * FROM livre");
                                    while($livre = $liste_livre->fetch(PDO::FETCH_ASSOC)) {
                                        $selected = '';
                                        if($id_livre_modif == $livre['id_livre']) {
                                            $selected = 'selected';
                                        }
                                        echo '<option value="' . $livre['id_livre'] . '" ' . $selected . '>' . $livre['id_livre'] . ' - ' . $livre['titre'] . ' - ' . $livre['auteur'] . '</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="date_sortie">Date sortie</label>
                            <input type="text" autocomplete="off" name="date_sortie" id="date_sortie" class="form-control" value="<?php echo $date_sortie_modif; ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="date_rendu">Date rendu</label>
                            <input type="text" autocomplete="off" name="date_rendu" id="date_rendu" class="form-control" value="<?php echo $date_rendu_modif; ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label>&nbsp;</label>
                            <!-- AJOUT D'UN CHAMP CACHE POUR CONTENIR L'ID EMPRUNT EN CAS DE MODIF -->
                            <input type="hidden" name="id_emprunt" value="<?php echo $id_emprunt; ?>">
                            <button type="submit" class="btn btn-outline-primary w-100" name="enregistrer" id="enregistrer" >Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 mt-5">
                <h2>Affichage des emprunts</h2>
                <hr>
                <?php 
                    // récupération des emprunts depuis la BDD
                    $liste_emprunt = $pdo->query("SELECT id_emprunt, id_livre, id_abonne, date_format(date_sortie, '%d/%m/%Y') AS date_sortie_fr, date_format(date_rendu, '%d/%m/%Y') AS date_rendu_fr FROM emprunt");
                    echo '<p>Il y a ' . $liste_emprunt->rowCount() . ' emprunts</p><hr>';

                    // Construction du tableau : 
                    // les colonnes : 
                    echo '<table class="table table-bordered text-center">';
                    echo '<tr class="bg-dark text-white">';
                    echo '<th>Id Emprunt</th><th>Id Abonné</th><th>Id Livre</th><th>Date sortie</th><th>Date rendu</th>';
                    // ajout des colonnes pour modifier et supprimer
                    echo '<th>Modifier</th>';
                    echo '<th>Supprimer</th>';
                    echo '</tr>';

                    // les lignes avec les données
                    while($emprunt = $liste_emprunt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<tr>';
                        echo '<td>' . $emprunt['id_emprunt'] . '</td>';
                        echo '<td>' . $emprunt['id_abonne'] . '</td>';
                        echo '<td>' . $emprunt['id_livre'] . '</td>';
                        echo '<td>' . $emprunt['date_sortie_fr'] . '</td>';
                        echo '<td>' . $emprunt['date_rendu_fr'] . '</td>';
                        // ajout des cellules pour modifier et supprimer
                        echo '<th><a href="?action=modifier&id_emprunt=' . $emprunt['id_emprunt'] . '">✏</a></th>';
                        echo '<th><a href="?action=supprimer&id_emprunt=' . $emprunt['id_emprunt'] . '">✖</a></th>';
                        echo '</tr>';
                    }



                ?>
            </div>
        </div>



<?php       
    include 'inc/footer.inc.php';