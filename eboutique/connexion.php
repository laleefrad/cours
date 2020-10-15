<?php 
include 'inc/init.inc.php'; // appel du fichier init.inc.php
include 'inc/functions.inc.php'; // appel du fichier contenant nos fonctions 

// DECONNEXION
if(isset($_GET['action']) && $_GET['action'] == 'deconnexion') {
    session_destroy(); // on détruit la session
    // la fonction session_destroy() n'est pas exécutée immédiatemment mais en fin de fichier.
    // du coup pour bien voir la deconnexion, on recharge la page via la fonction prédéfinie header()
    header('location:connexion.php');
}


// CONNEXION
if(isset($_POST['pseudo']) && isset($_POST['mdp'])) {

    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];

    // on vérifie si le pseudo et le mdp correspondent à une entrée dans la BDD
    $connexion = $pdo->prepare("SELECT * FROM membre WHERE pseudo = :pseudo");
    $connexion->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $connexion->execute();

    if($connexion->rowCount() > 0) {
      // pseudo ok, on vérifie le mdp
      // le mdp ayant été crypté avec la fonction password_hash pour le vérifier, on utilise password_verify()
      // password_verify(mdp_formulaire, mdp_bdd); // envoie true ou false

      // on rend les données de la BDD exploitable via la methode fetch()
      $membre = $connexion->fetch(PDO::FETCH_ASSOC);
      // echo '<pre>'; print_r($membre); echo '</pre>';

      if(password_verify($mdp, $membre['mdp'])) {
        // mdp ok

        // pour conserver les informations, on place les infos de l'utilisateur dans la $_SESSION
        $_SESSION['membre']['id_membre'] = $membre['id_membre'];
        $_SESSION['membre']['pseudo'] = $membre['pseudo'];
        $_SESSION['membre']['nom'] = $membre['nom'];
        $_SESSION['membre']['prenom'] = $membre['prenom'];
        $_SESSION['membre']['email'] = $membre['email'];
        $_SESSION['membre']['sexe'] = $membre['sexe'];
        $_SESSION['membre']['ville'] = $membre['ville'];
        $_SESSION['membre']['cp'] = $membre['cp'];
        $_SESSION['membre']['adresse'] = $membre['adresse'];
        $_SESSION['membre']['statut'] = $membre['statut'];

      } else {
          // erreur sur le mdp
          $msg = '<div class="alert alert-danger mt-3">Erreur sur le pseudo et/ou le mot de passe.</div>';
      }



    } else {
        // erreur sur le pseudo 
        $msg = '<div class="alert alert-danger mt-3">Erreur sur le pseudo et/ou le mot de passe.</div>';
    }


}





// debut des affichages :
include 'inc/header.inc.php'; // appel du haut de site
include 'inc/nav.inc.php'; // appel de la nav
?>

<main role="main" class="container">
  <?php echo '<pre>'; print_r($_SESSION); echo '</pre>'; ?>
  <div class="starter-template">
    <h1><i class="fas fa-ghost"></i> Connexion <i class="fas fa-ghost"></i></h1>
    <p class="lead">Bienvenue sur notre site.</p>
    <?php 
            echo $msg; // variable déclarée dans init pour afficher des messages utilisateur.  
    ?>
  </div>

  <div class="row">
      <div class="col-4 mx-auto">
          <form method="post">
              <div class="form-group">
                  <label for="pseudo">Pseudo</label>
                  <input type="text" class="form-control" id="pseudo" name="pseudo" value="" >
              </div>
              <div class="form-group">
                  <label for="mdp">Mot de passe</label>
                  <input type="text" class="form-control" id="mdp" name="mdp" value="">
              </div>
              <div class="form-group"> 
                  <hr>                         
                  <button type="submit" class="mt-2 w-100 btn btn-outline-primary" id="connexion" name="connexion" ><i class="fas fa-ghost"></i> Se connecter <i class="fas fa-ghost"></i></button>
              </div>
          </form>
      </div>
  </div>

</main><!-- /.container -->

<?php
include 'inc/footer.inc.php'; // appel du bas de site


