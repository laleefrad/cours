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
    <h1><i class="fas fa-ghost"></i> Blog <i class="fas fa-ghost"></i></h1>
    <p class="lead">Bienvenue sur notre site.</p>
    <?php 
            echo $msg; // variable déclarée dans init pour afficher des messages utilisateur.  
    ?>
  </div>

  <div class="row">
    <div class="col-sm-9">
      <div class="row">
      
    <?php 
        // récupération des articles du blog en BDD
        $liste_article = $pdo->query("SELECT * FROM actualite ORDER BY date_enregistrement DESC");

        echo '<div class="col-12"><p>Il y a <b>' . $liste_article->rowCount() . '</b> articles</p><hr></div>';

        // Affichage des articles
        while($article = $liste_article->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="col-sm-6  p-3 mb-3">';
            echo '<h2>' . $article['titre'] . '</h2>';
            echo '<img src="' . $article['image'] . '" alt="' . $article['titre'] . '" class="img-fluid">';
            echo '<hr>Auteur : ' . $article['pseudo'] . '. Date : ' . $article['date_enregistrement'] . '<hr>';
            echo '<p>' . substr($article['contenu'], 0, 247) . ' ... <a href="affichage_article_blog.php?article=' . $article['id_actualite'] . '">Lire la suite</a></p>';
            

            echo '</div>';
        }
    ?>
      </div>
    </div>
    <div class="col-sm-3">
        Nous trouver : 
        <hr>
        <!-- exemple intégration gmap -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d21005.14052863798!2d2.354859!3d48.845956199999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1600679040637!5m2!1sfr!2sfr" width="100%" height="140" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        <hr>
        <!-- exemple intégration twitter --> 
        <blockquote class="twitter-tweet"><p lang="fr" dir="ltr">👀 On a quelques précisions à te partager ! <br><br>🎮 Précommandes de la Xbox Series X et la Xbox Series S : le 22 septembre dès 9h00.<br><br>🌍 Lancement mondial le 10 novembre<br><br> 👉 <a href="https://t.co/Eh2QsVmBMv">https://t.co/Eh2QsVmBMv</a> <a href="https://t.co/exM4yj0mGG">pic.twitter.com/exM4yj0mGG</a></p>&mdash; Xbox FR (@XboxFR) <a href="https://twitter.com/XboxFR/status/1306913182980734977?ref_src=twsrc%5Etfw">September 18, 2020</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>
  </div>

</main><!-- /.container -->

<?php
include 'inc/footer.inc.php'; // appel du bas de site


