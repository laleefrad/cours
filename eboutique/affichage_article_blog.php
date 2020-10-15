<?php 
include 'inc/init.inc.php'; // appel du fichier init.inc.php
include 'inc/functions.inc.php'; // appel du fichier contenant nos fonctions 

// cette page nous sert à afficher un article du blog, on récupère l'id de l'article dans l'url. 
// Donc si l'id n'est pas présent dans l'url, on redirige sur la page blog
if(empty($_GET['article'])) {
  // controle avec empty car si l'indice article est vide, il n'y a rien à afficher
  header('location:blog.php');
}

// si on est pas redirigé, c'est que l'indice existe avec sa valeur donc on déclenche une requete pour récupérer les informations à afficher.
$recup_article = $pdo->prepare("SELECT * FROM actualite WHERE id_actualite = :id");
$recup_article->bindParam(":id", $_GET['article'], PDO::PARAM_STR);
$recup_article->execute();

// s'il n'y a pas de ligne dans $recup_article alors l'id ne correspond à aucune actualité (l'utilisateur peut changer l'id dans l'url).
// 0 ligne : on redirige
if($recup_article->rowCount() < 1) {
  // rien à afficher, on redirige
  header('location:blog.php');
} else {
  // nous avons bien récupéré l'actualité, on traite avec un fetch pour afficher ensuite dans la page.
  $actualite = $recup_article->fetch(PDO::FETCH_ASSOC);
}
// echo '<pre>'; print_r($actualite); echo '</pre>';


// debut des affichages :
include 'inc/header.inc.php'; // appel du haut de site
include 'inc/nav.inc.php'; // appel de la nav
?>

<main role="main" class="container">

  <div class="starter-template">
    <h1><i class="fas fa-ghost"></i> <?php echo $actualite['titre'] ?> <i class="fas fa-ghost"></i></h1>
    <p class="lead">Bienvenue sur notre site.</p>
    <?php 
            echo $msg; // variable déclarée dans init pour afficher des messages utilisateur.  
    ?>
  </div>

  <div class="row">
      <div class="col-12">
          <img src="<?php echo $actualite['image']; ?>" alt="<?php echo $actualite['titre']; ?>" class="w-100 img-fluid">
          <hr>
          <p><b>Par :</b> <?php echo $actualite['pseudo']; ?><br><b>Le : </b><?php echo $actualite['date_enregistrement']; ?> </p>
          <p><?php echo $actualite['contenu']; ?></p>
      </div>
  </div>

</main><!-- /.container -->

<?php
include 'inc/footer.inc.php'; // appel du bas de site


