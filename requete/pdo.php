<?php

/*
    PDO : Php Data Object
    ---------------------

    - exec()
    --------
        - permet d'exécuter des requetes uniquement d'action INSERT / UPDATE / DELETE

        Valeur de retour :
        ------------------
        - Echec : false (erreur de syntaxe dans la requete)
        - Succes : un entier (int) représentant le nombre de lignes impactées.

    - query()
    ---------
        - permet d'exécuter tous types de requetes SELECT / INSERT / UPDATE / DELETE

        Valeur de retour :
        ------------------
        - Echec : false (erreur de syntaxe dans la requete)
        - Succes : un nouvel objet PDOStatement contenant la réponse de la BDD

    
    - prepare() + execute() (A privilégier pour la sécurité !!!)
    -----------------------
        - permet d'exécuter tous types de requetes SELECT / INSERT / UPDATE / DELETE

        Valeur de retour :
        ------------------
        - prepare() 
            - Renvoi toujours un nouvel objet PDOStatement
        - execute()
            - Echec : false (erreur de syntaxe dans la requete)
            - Succes : un nouvel objet PDOStatement contenant la réponse de la BDD 

*/


echo '<h2>01 - PDO : CONNEXION </h2>';
// pour déclencher une connexion à la BDD nous avons besoin de 4 informations :
// l'adresse serveur (localhost)
// le login de la bdd (root)
// le mdp de la bdd (xampp et wamp : pas de mdp / mamp : mdp = root)
// le nom de la bdd (entreprise)    

// new PDO('serveur+nom_de_la_bdd', 'login', 'mdp', 'options(array)')
// $pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING : Pour la gestion des erreurs
// PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' : Pour forcer l'utf-8 au cas où.

$host = 'mysql:host=localhost;dbname=entreprise';
$login = 'root';
$password = '';
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
);
$pdo = new PDO($host, $login, $password, $options);

// Pour voir les propriétés de notre objet :
echo '<pre>'; var_dump($pdo); echo '</pre>';

// pour voir les methodes de notre objet : 
echo '<pre>'; var_dump( get_class_methods($pdo) ); echo '</pre>';

echo '<h2>02 - PDO : exec() - INSERT / UPDATE / DELETE</h2>';
// on fait une insertion dans la BDD
// $reponse = $pdo->exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('Mathieu', 'Quittard', 'm', 'Web', CURDATE(), 2000)");

// echo 'Nombre de lignes impactées par la requete d\'insert : ' . $reponse . '<hr>';

// Pour récupère le dernier id inséré dans la base : lastInsertId()
// echo 'Dernier id inséré dans la BDD : ' . $pdo->lastInsertId() . '<hr>';

echo '<h2>03 - PDO : query() + fetch() pour une seule ligne de résultat</h2>';

$resultat = $pdo->query("SELECT * FROM employes WHERE id_employes = 350");
// $resultat est un nouvel objet (PDOStatement)
echo '<pre>'; var_dump($resultat); echo '</pre>';
echo '<pre>'; var_dump( get_class_methods($resultat) ); echo '</pre>';

// En l'état, la réponse contenue dans la variable $resultat est inexploitable.
// pour rendre la réponse exploitable on va utiliser la methode fetch() qui permet de traiter les lignes de la réponse l'une après l'autre et de la transformer en quelque chose d'exploitable avec PHP notamment en tableau array.

// FETCH_ASSOC : Pour obtenir un tableau array avec le nom des colonnes comme indice.
$ligne = $resultat->fetch(PDO::FETCH_ASSOC); 

// FETCH_NUM : Pour obtenir un tableau array avec des indices numériques
// $ligne = $resultat->fetch(PDO::FETCH_NUM);

// FETCH_BOTH : (cas par défaut) mélange de FETCH_ASSOC & FETCH_NUM
// $ligne = $resultat->fetch(PDO::FETCH_BOTH);

// FETCH_OBJ : Pour obtenir un nouvel objet avec les noms des colonnes comme propriétés publiques.
// $ligne = $resultat->fetch(PDO::FETCH_OBJ);
// echo $ligne->prenom;

echo '<pre>'; print_r($ligne); echo '</pre>';


echo '<h2>04 - PDO : query() + fetch() pour plusieurs lignes dans la réponse</h2>';

$resultat = $pdo->query("SELECT * FROM employes");
// pour connaitre le nombre de lignes obtenues par la requete : 
// rowCount()
echo '<b>Nombre d\'employés dans la table employes : </b>' . $resultat->rowCount() . '<hr>';

// fetch() ne traite qu'une seule ligne à la fois.
// Pour traiter toutes les lignes obtenues : une boucle
// La boucle while va tourner tant qu'il y a une ligne à traiter, une fois toutes les lignes traitées, on récupère false et ça bloque la boucle.
while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) { // tant qu'il y a une ligne à traiter
    echo '<pre>'; print_r($ligne); echo '</pre>';
    echo '<hr>';
}

echo '<hr>';
// affichage dans des blocs (div)
$resultat = $pdo->query("SELECT * FROM employes");
echo '<div style="display: flex; flex-wrap: wrap; justify-content: space-between;">';
while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) { 
    
    echo '<div style="width: 22%; margin-top: 10px; background-color: red; padding: 20px; box-sizing: border-box; color: white;">';

    echo '<b>Prénom : </b>' . $ligne['prenom'] . '<br>';
    echo '<b>Nom : </b>' . $ligne['nom'] . '<br>';
    echo '<b>Service : </b>' . $ligne['service'] . '<br>';
    echo '<b>Salaire : </b>' . $ligne['salaire'] . '€<br>';

    echo '</div>';

}
echo '</div>';

echo '<hr>';
// affichage dans un tableau html
$resultat = $pdo->query("SELECT * FROM employes");

echo '<style>th, td { padding: 10px; }</style>'; // du style css pour le tableau

echo '<table border="1" style="width: 100%; border-collapse: collapse;">';

echo '<tr style="background-color: #333; color: white;">';
echo '<th>Id employés</th>';
echo '<th>Prénom</th>';
echo '<th>Nom</th>';
echo '<th>Sexe</th>';
echo '<th>Service</th>';
echo '<th>Date d\'embauche</th>';
echo '<th>Salaire</th>';
echo '</tr>';

while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
    echo '<tr>';
    echo '<td>' . $ligne['id_employes'] . '</td>';
    echo '<td>' . $ligne['prenom'] . '</td>';
    echo '<td>' . $ligne['nom'] . '</td>';
    echo '<td>' . $ligne['sexe'] . '</td>';
    echo '<td>' . $ligne['service'] . '</td>';
    echo '<td>' . $ligne['date_embauche'] . '</td>';
    echo '<td>' . $ligne['salaire'] . '</td>';
    echo '</tr>';
}

echo '</table>';

echo '<h2>05 - PDO : prepare() + bindParam() + execute()</h2>';

// Pour la sécurité il faudra privilégier prepare()
// Une information dans la requete provient de l'extérieur ($_GET, $_POST, $_COOKIE) : prepare() obligatoire !!! 
// Aucune information ne provient de l'extérieur, dans ce cas query() ou prepare() : au choix

// Avec prepare() on prépare la requete et on représente les informations attendues via un marqueur nominatif, ensuite on fournit la valeur au marqueur nominatif avec bindParam() puis on execute()

$nom = 'laborde';
$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom"); // :nom est un marqueur nominatif

// on fournit maintenat la valeur au marqueur nominatif via bindParam(), un bindParam() par marqueur nominatif
$resultat->bindParam(':nom', $nom, PDO::PARAM_STR);
// bindParam(marqueur_nominatif, sa_valeur, son_type);
// PDO::PARAM_STR (string) / PDO::PARAM_INT (int)

$resultat->execute();
echo '<pre>'; print_r($resultat); echo '</pre>';

$infos = $resultat->fetch(PDO::FETCH_ASSOC);
echo '<pre>'; print_r($infos); echo '</pre>';


echo '<h2>06 - PDO : Exercice</h2>';

// Affichez la liste des différents services de la table employé sous forme de liste html ul li
// 01 - faire une requete permettant d'avoir la liste des différents services
// 02 - via php utiliser pdo pour déclencher cette requete et il faut la récupèrer dans une variable (query())
// 03 - vérifier le nombre de lignes obtenues (Il y a X services dans la table employes) (rowCount())
// 04 - faire une boucle (while) pour appliquer un fetch à chaque tour et permettre de récupérer dans une variable le tableau array resultant du fetch
// 05 - placer les noms des services dans des li (ne pas oublier le ul global)

// la requete
// SELECT DISTINCT service FROM employes
$resultat = $pdo->query("SELECT DISTINCT service FROM employes ORDER BY service");

echo '<hr>';
echo 'Nombre de différent service : ' . $resultat->rowCount() . '<hr>';

echo '<ul>';
while($service = $resultat->fetch(PDO::FETCH_ASSOC)) {
    // echo '<pre>'; print_r($ligne); echo '</pre>';
    // echo '<li>' . ucfirst($service['service']) . '</li>';
    echo '<li>';
    echo ucfirst($service['service']); // ucfirst() permet de passer la première lettre en majuscule
    echo '</li>';
}
echo '</ul>';

echo '<hr>';
// Refaire la même chose pour lister les bdd du serveur. (SHOW DATABASES)
$liste_bdd = $pdo->query("SHOW DATABASES");
echo 'Nombre de BDD sur le serveur : ' . $liste_bdd->rowCount() . '<br>';

echo '<ul>';
while($bdd = $liste_bdd->fetch(PDO::FETCH_ASSOC)) {
    // echo '<pre>'; print_r($bdd); echo '</pre>';
    echo '<li>' . $bdd['Database'] . '</li>';
}
echo '</ul>';



















echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
