<?php 
include 'inc/init.inc.php'; // appel du fichier init.inc.php
include 'inc/functions.inc.php'; // appel du fichier contenant nos fonctions 


// CODE ...


// debut des affichages :
include 'inc/header.inc.php'; // appel du haut de site
include 'inc/nav.inc.php'; // appel de la nav
?>

<main role="main" class="container">

  <div class="starter-template">
    <h1><i class="fas fa-ghost"></i> Titre <i class="fas fa-ghost"></i></h1>
    <p class="lead">Bienvenue sur notre site.</p>
    <?php 
            echo $msg; // variable déclarée dans init pour afficher des messages utilisateur.  
    ?>
  </div>

</main><!-- /.container -->

<?php
include 'inc/footer.inc.php'; // appel du bas de site


