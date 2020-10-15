<?php 
include 'inc/init.inc.php'; // appel du fichier init.inc.php
include 'inc/functions.inc.php'; // appel du fichier contenant nos fonctions 

// Pour la conservation des saisies dans les champs, on appelle ces variables avec des echo dans les values des champs. Mais pour ne pas avoir une erreur ça n'existe pas avant la validation du form, on les crée vide par défaut. C'est dans le if plus bas que la variable recevra la saisie.
$pseudo = '';
$nom = '';
$prenom = '';
$sexe = '';
$ville = '';
$cp = '';
$adresse = '';
$email = '';


// si le formulaire est validé : 
if(
    isset($_POST['pseudo']) && 
    isset($_POST['mdp']) &&
    isset($_POST['nom']) &&
    isset($_POST['prenom']) &&
    isset($_POST['sexe']) &&
    isset($_POST['ville']) &&
    isset($_POST['cp']) &&
    isset($_POST['adresse']) &&
    isset($_POST['email'])     
  )  {

    // trim() est une fonction prédéfinie permettant d'enlever les espaces en début et en fin de chaine (pas au milieu)
    $pseudo = trim($_POST['pseudo']);
    $mdp = trim($_POST['mdp']);
    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $sexe = trim($_POST['sexe']);
    $ville = trim($_POST['ville']);
    $cp = trim($_POST['cp']);
    $adresse = trim($_POST['adresse']);
    $email = trim($_POST['email']);

    // Controle sur la taille du pseudo : entre 4 et 14 caracatères inclus
    if(iconv_strlen($pseudo) < 4 || iconv_strlen($pseudo) > 14) {
        $msg = '<div class="alert alert-danger mt-3">Attention,<br>le pseudo doit avoir entre 4 et 14 caractères inclus.</div>';
    } else {
        // le pseudo a la bonne taille

        // controle sur la disponibilite du pseudo car unique en BDD
        $verif_pseudo = $pdo->prepare("SELECT * FROM membre WHERE pseudo = :pseudo");
        $verif_pseudo->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $verif_pseudo->execute();

        // on vérifie avec rowCount() si on obtient une ligne de résultat. Si c'est le cas, le pseudo est déjà pris.
        if($verif_pseudo->rowCount() > 0) {
            // pseudo indisponible
            $msg = '<div class="alert alert-danger mt-3">Attention,<br>le pseudo est indisponible.</div>';
        } else {
            // pseudo disponible

            // on crypte le mdp avant l'insertion dans la base
            $mdp = password_hash($mdp, PASSWORD_DEFAULT);

            // on insert dans la BDD
            $enregistrement = $pdo->prepare("INSERT INTO membre (id_membre, pseudo, mdp, nom, prenom, email, sexe, ville, cp, adresse, statut) VALUES (NULL, :pseudo, :mdp, :nom, :prenom, :email, :sexe, :ville, :cp, :adresse, 1)");
            $enregistrement->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
            $enregistrement->bindParam(':mdp', $mdp, PDO::PARAM_STR);
            $enregistrement->bindParam(':nom', $nom, PDO::PARAM_STR);
            $enregistrement->bindParam(':prenom', $prenom, PDO::PARAM_STR);
            $enregistrement->bindParam(':email', $email, PDO::PARAM_STR);
            $enregistrement->bindParam(':sexe', $sexe, PDO::PARAM_STR);
            $enregistrement->bindParam(':ville', $ville, PDO::PARAM_STR);
            $enregistrement->bindParam(':cp', $cp, PDO::PARAM_STR);
            $enregistrement->bindParam(':adresse', $adresse, PDO::PARAM_STR);
            $enregistrement->execute();
            

        }







    }









} // Fin du controle validation du formulaire



// debut des affichages :
include 'inc/header.inc.php'; // appel du haut de site
include 'inc/nav.inc.php'; // appel de la nav
?>

<main role="main" class="container">
<?php // echo '<pre>'; print_r($_POST); echo '</pre>'; ?>

    <div class="starter-template">
        <h1><i class="fas fa-ghost"></i> Inscription <i class="fas fa-ghost"></i></h1>
        <p class="lead">Bienvenue sur notre site.</p>
        <?php 
            echo $msg; // variable déclarée dans init pour afficher des messages utilisateur. 

        ?>
    </div>

    <div class='row'>
        <div class="col-10 mx-auto">
            <form method="post" >
                <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                          <label for="pseudo">Pseudo</label>
                          <input type="text" class="form-control" id="pseudo" name="pseudo" value="<?php echo $pseudo; ?>" autocomplete="off">
                      </div>
                      <div class="form-group">
                          <label for="mdp">Mot de passe</label>
                          <input type="text" class="form-control" id="mdp" name="mdp" value="">
                      </div>
                      <div class="form-group">
                          <label for="nom">Nom</label>
                          <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $nom; ?>">
                      </div>
                      <div class="form-group">
                          <label for="prenom">Prénom</label>
                          <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $prenom; ?>">
                      </div>
                      <div class="form-group">
                          <label for="email">Email</label>
                          <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                      </div>
                      
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label for="sexe">Sexe</label>
                          <select name="sexe" id="sexe" class="form-control">
                              <option value="f">femme</option>
                              <option value="m" <?php if($sexe == 'm') { echo 'selected'; } ?> >homme</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="ville">Ville</label>
                          <input type="text" class="form-control" id="ville" name="ville" value="<?php echo $ville; ?>">
                      </div>
                      <div class="form-group">
                          <label for="cp">Code postal</label>
                          <input type="text" class="form-control" id="cp" name="cp" value="<?php echo $cp; ?>">
                      </div>
                      <div class="form-group">
                          <label for="adresse">Adresse</label>
                          <textarea class="form-control" id="adresse" name="adresse" ><?php echo $adresse; ?></textarea>
                      </div>
                      <div class="form-group">                          
                          <button type="submit" class="mt-2 w-100 btn btn-primary" id="inscription" name="inscription" ><i class="fas fa-ghost"></i> S'inscrire <i class="fas fa-ghost"></i></button>
                      </div>
                    </div>
                </div>
            </form>
        </div>
        
    </div>















    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>




</main><!-- /.container -->

<?php
include 'inc/footer.inc.php'; // appel du bas de site


