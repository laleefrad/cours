<?php 
include 'inc/init.inc.php'; // appel du fichier init.inc.php
include 'inc/functions.inc.php'; // appel du fichier contenant nos fonctions 

// RESTRICTION D'ACCES : si l'utilisateur n'est pas admin, on le redirige sur une autre page : connexion.php
if(!user_is_admin()) {
    header('location:connexion.php'); // redirection sur connexion.php
}

$pseudo = "";
$titre = '';
$contenu = '';
$image = '';


// enregistrement de l'article
if(isset($_POST['pseudo']) && isset($_POST['titre']) && isset($_POST['image']) && isset($_POST['contenu'])) {
    // on place les informations dans une variable plus simple d'écriture et on applique au passage un trim() pour enlever les espaces en début et en fin de chaine
    $pseudo = trim($_POST['pseudo']);
    $titre = trim($_POST['titre']);
    $image = trim($_POST['image']);
    $contenu = trim($_POST['contenu']);

    // Controle, le pseudo ne doit pas etre vide
    if(empty($pseudo)) { // est-ce que la variable pseudo est vide
        $msg .= '<div class="alert alert-danger mt-3">Le pseudo est obligatoire</div>';
    }
    // Controle, le titre ne doit pas etre vide
    if(empty($titre)) { // est-ce que la variable titre est vide
        $msg .= '<div class="alert alert-danger mt-3">Le titre est obligatoire</div>';
    }
    // Controle, le contenu ne doit pas etre vide
    if(empty($contenu)) { // est-ce que la variable contenu est vide
        $msg .= '<div class="alert alert-danger mt-3">Le contenu est obligatoire</div>';
    }

    // Controle sur le format de l'url de l'image
    if(!filter_var($image, FILTER_VALIDATE_URL)) {  
        // filter_var($image, FILTER_VALIDATE_URL) permet de vérifier le format de l'url, renvoie false si url non valide.
        // le ! devant le filter_var dans le if demande la réponse false pour rentrer ici
        $msg .= '<div class="alert alert-danger mt-3">L\'url de l\'image n\'est pas valide</div>';
    }


    // Enregistrement
    // Pour savoir s'il n'y a pas eu d'erreur dans nos controles préalables, on vérifie si la variable $msg est vide :
    // empty($msg) si vide => pas d'erreur
    // empty($msg) si pas vide => erreur
    if(empty($msg)) {
      // pas d'erreur dans nos controles, on déclenche l'enregistrement.
      $enregistrement = $pdo->prepare("INSERT INTO actualite (pseudo, titre, image, contenu, date_enregistrement) VALUES (:pseudo, :titre, :image, :contenu, NOW())");
      $enregistrement->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
      $enregistrement->bindParam(':titre', $titre, PDO::PARAM_STR);
      $enregistrement->bindParam(':image', $image, PDO::PARAM_STR);
      $enregistrement->bindParam(':contenu', $contenu, PDO::PARAM_STR);
      $enregistrement->execute();
      
        $pseudo = "";
        $titre = '';
        $contenu = '';
        $image = '';
      // pour enlever les saisies du form :
      // header('location:gestion_blog.php');
      // pour afficher un message de validation
      // $msg .= '<div class="alert alert-success mt-3">Enregistrement de l\'article terminé.</div>';
    }

}


// debut des affichages :
include 'inc/header.inc.php'; // appel du haut de site
include 'inc/nav.inc.php'; // appel de la nav
// echo '<pre>'; print_r($_POST); echo '</pre>';
?>

<main role="main" class="container">

  <div class="starter-template">
    <h1><i class="fas fa-ghost"></i> Gestion blog <i class="fas fa-ghost"></i></h1>
    <p class="lead">Bienvenue sur notre site.</p>
    <?php 
            echo $msg; // variable déclarée dans init pour afficher des messages utilisateur.  
    ?>
  </div>




  <div class="row">
      <div class="col-8 mx-auto">
          <form method="post" >
              <div class="form-group">
                  <label for="pseudo">Pseudo</label>
                  <input type="text" name="pseudo" id="pseudo" class="form-control" value="<?php echo $pseudo; ?>">
              </div>
              <div class="form-group">
                  <label for="titre">Titre</label>
                  <input type="text" name="titre" id="titre" class="form-control" value="<?php echo $titre; ?>">
              </div>
              <div class="form-group">
                  <label for="image">Url de l'image</label>
                  <input type="text" name="image" id="image" class="form-control" value="<?php echo $image; ?>">
              </div>
              <div class="form-group">
                  <label for="contenu">Contenu</label>
                  <textarea name="contenu" id="contenu" class="form-control"><?php echo $contenu; ?></textarea>
              </div>
              <div class="form-group">
                  <hr>
                  <input type="submit" name="enregistrer" id="enregistrer" class="btn btn-outline-primary w-100" value="Enregistrer">
              </div>
          </form>
      </div>
  </div>







</main><!-- /.container -->

<?php
include 'inc/footer.inc.php'; // appel du bas de site


