<nav class="navbar navbar-expand-md navbar-dark ma_nav fixed-top">
        <a class="navbar-brand" href="#">eBoutique</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Boutique <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="panier.php">Panier</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="blog.php">Blog</a>
            </li>

            <?php

            if(user_is_admin()) {
                // on regarde si l'utilisateur est administrateur via cette foncton, si ça répond par vrai, on affiche le lien de gestion
                echo '<li class="nav-item">
                        <a class="nav-link" href="gestion_blog.php">Gestion Blog</a>
                    </li>';
            }

            ?>

            <?php if(user_is_connected()) { ?> 
                
            <li class="nav-item">
                <a class="nav-link" href="profil.php">Profil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="connexion.php?action=deconnexion">Déconnexion</a>
            </li>

            <?php } else { ?>    

            <li class="nav-item">
                <a class="nav-link" href="connexion.php">Connexion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="inscription.php">Inscription</a>
            </li>

            <?php } ?>   


            <!--
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administration</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            -->
            </ul>
            <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Rechercher" aria-label="Search">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Rechercher</button>
            </form>
        </div>
    </nav>