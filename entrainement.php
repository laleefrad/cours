<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrainement PHP</title>

    <style>
        * { font-family: sans-serif; } 
        h2 { padding: 20px; color: white; background-color: steelblue; }
        .couleur_bleu { color: blue; }
    </style>

</head>
<body>
    
    <h2>Ecriture et affichage</h2>
    <!-- il est possible d'écrire de l'html dans un fichier .php, en revanche, l'inverse n'est pas possible. -->

    <?php 
        // balise d'ouverture php

        // CODE PHP ...

        // balise de fermeture php 
    ?>


    <?php 
        // Doc officielle :
        // https://www.php.net/

        // Les bonnes pratiques du langage :
        // https://phptherightway.com/

        // Autres bonnes pratiques du langage : 
        // https://www.php-fig.org/psr/

        // SOMMAIRE : 
        // 01 - Instruction d'affichage
        // 02 - Variables : Types / déclaration / affectation
        // 03 - Concaténation
        // 04 - Guillemets et apostrophes (Doubles quotes/ simple quotes)
        // 05 - Constantes
        // 06 - Conditions et opérateurs de comparaison
        // 07 - Fonctions prédéfinies
        // 08 - Fonctions utilisateur
        // 09 - Boucles
        // 10 - Inclusions
        // 11 - Tableaux de données ARRAY
        // 12 - Classes & Objets


        // Chaque instruction en PHP doit se terminer par un ;

        //--------------------------------------------------------
        // 01 - Instruction d'affichage
        //--------------------------------------------------------
        echo 'Bonjour'; // echo est une instruction du langage nous permettant de générer un affichage.
        echo '<br>'; // il est possible d'écrire de l'html
        echo 'Bienvenue';

        print '<br>'; // print est une autre instruction d'affichage similaire à echo
        print 'Nous sommes lundi'; // nous utiliserons echo pour le cours

        // Les commentaires : 
        // commentaire sur une seule ligne
        /*
            Commentaire
            sur plusieurs 
            lignes.        
        */
        # commentaire sur une seule ligne.


        echo '<h2>02 - Variables : Types / déclaration / affectation</h2>';
        //--------------------------------------------------------
        // 02 - Variables : Types / déclaration / affectation
        //--------------------------------------------------------
        // une variable est un espace nommé permettant de conserver une valeur.
        // déclaration d'une variable avec le signe $

        // Caractères autorisés : 
        // toutes les lettres (sauf les caractères spéciaux), les chiffres et l'underscore _
        // PHP est sensible à la casse a != A
        // une variable ne peut pas commencer par un chiffre
        // $a1 => ok
        // $1a => interdit / nok (not ok)

        $a = 127; // création de la variable nommée "a" et affectation de la valeur numérique 127.

        // gettype() est une fonction prédéfinie nous permettant de connaitre le type d'une valeur.

        echo gettype($a); // integer (un entier)
        echo '<br>';

        $a = 1.5; // une valeur décimale
        echo gettype($a); // double (chiffre à virgule)
        echo '<br>';

        $b = 'Une chaine';
        echo gettype($b); // string (une chaine de caractères)
        echo '<br>';

        $c = '127'; // ou "127"
        echo gettype($c); // string (une chaine de caractères)
        echo '<br>';

        // les booléens ne sont pas sensibles à la casse
        $c = true; // ou TRUE ou false ou FALSE
        echo gettype($c); // boolean (vrai ou faux / 1 ou 0)
        echo '<br>';

        // il y a aussi les types array et object que nous verons dans d'autres chapitres (11 et 12)

        echo '<h2>03 - Concaténation</h2>';
        //--------------------------------------------------------
        // 03 - Concaténation
        //--------------------------------------------------------
        // la concaténation nous permet d'assembler des chaines de caractères (contenues dans des variables ou pas) les unes avec les autres.
        // le caractères de concaténation en php est le point "." que l'on peut toujours traduire par "suivi de"
        // il est possible d'utiliser la virgule pour la concaténation mais c'est à éviter car pose souci avec print

        $x = 'Bonjour';
        $y = "tout le monde !";

        echo $x . ' ' . $y . '<br>';
        echo $x , ' ' , $y , '<br>'; // ⚠ il est possible d'utiliser la virgule avec echo pas avec print !!!

        $prenom1 = 'Marie';
        $prenom1 = 'Bruno'; // on écrase la valeur

        echo $prenom1 . '<br>'; // affiche Bruno

        // concaténation lors de l'affectation : (on rajoute sans écraser l'existant)
        $prenom2 = 'Nicolas ';
        $prenom2 .= 'Céline'; // on rajoute grace au . de concaténation
        // raccourci, équivaut à écrire : $prenom2 = $prenom2 . ' Céline';

        echo $prenom2 . '<br>'; // affiche Nicolas Céline


        echo '<h2>04 - Guillemets et apostrophes</h2>';
        //--------------------------------------------------------
        // 04 - Guillemets et apostrophes
        //--------------------------------------------------------

        $message = 'aujourd\'hui';
        // ou
        $message = "aujourd'hui";

        $text = 'Bonjour';

        echo $text . ' tout le monde<br>'; // concaténation
        echo '$text tout le monde<br>'; // ⚠ dans des apostrophes, une variable n'est pas reconnue ⚠
        echo "$text tout le monde<br>"; // dans des guillemets, une variable est reconnue et interprétée en conséquence.

        echo '<h2>05 - Constantes</h2>';
        //--------------------------------------------------------
        // 05 - Constantes
        //--------------------------------------------------------

        // une constante comme une variable permet de conserver une valeur sauf que come son nom l'indique, cette valeur restera constante et on ne pourra pas la changer pendant l'exécution du script

        // Par convention d'écriture, une constante s'écrit en majuscule.
        // création d'une constante : 
        // define(nom_de_la_constante, sa_valeur_contenue);
        define('CAPITALE', 'Paris');

        // appel de la constante : 
        echo CAPITALE . '<br>';
        // CAPITALE = 'Berlin'; // erreur on ne peut pas changer la valeur d'une constante déjà définie
        // define('CAPITALE', 'Berlin'); // erreur : Constant CAPITALE already defined

        // Constantes magiques (déjà inscrites au langage)
        echo __LINE__ . '<br>'; // le numéro de la ligne
        echo __FILE__ . '<br>'; // le chemin complet du fichier

        
        echo '<h2>Exercice</h2>';
        //--------------------------------------------------------
        // Exercice sur les variables
        //--------------------------------------------------------
        // Créer 3 variables et mettre les informations suivantes dans ces variables :
        // 1ere : bleu
        // 2eme : blanc
        // 3eme : rouge

        // Afficher avec un seul echo en utilisant les variables créées :
        // bleu - blanc - rouge
        // la gestion des tirets peut également être via une variable.

        $a = 'bleu';
        $b = 'blanc';
        $c = 'rouge';
        $t = ' - ';

        echo $a . ' - ' . $b . ' - ' . $c . '<br>';
        echo $a . $t . $b . $t . $c . '<br>';
        echo "$a - $b - $c<br>";
        echo "$a $t $b $t $c<br>";

        $a = '<span class="couleur_bleu">bleu</span>';
        $b = '<span style="color: Gainsboro;">blanc</span>';
        $c = '<span style="color: red;">rouge</span>';
        echo $a . ' - ' . $b . ' - ' . $c . '<br>';


        echo '<h2>Opérateurs arithmétique</h2>';
        //--------------------------------------------------------
        // Opérateurs arithmétique
        //--------------------------------------------------------
        $var1 = 10; $var2 = 2;

        // Addition :
        echo $var1 + $var2 . '<br>'; // 12
        // Soustraction :
        echo $var1 - $var2 . '<br>'; // 8
        // Multiplication :
        echo $var1 * $var2 . '<br>'; // 20
        // Division :
        echo $var1 / $var2 . '<br>'; // 5

        // Modulo : 
        echo $var1 % 3 . '<br>'; // 1 // le modulo : le restant de la division en terme d'entier.
        
        // Puissance : 
        echo $var1 ** $var2 . '<br>'; // 100

        // operation/affectation
        $a = 10; $b = 2;

        $a += $b; // equivaut à écrire : $a = $a + $b
        // $a -= $b // $a = $a - $b;
        // $a *= $b // $a = $a * $b;
        // $a /= $b // $a = $a / $b;
        // $a %= $b // $a = $a % $b;
        // $a **= $b // $a = $a ** $b;

        
        echo '<h2>06 - Conditions et opérateurs de comparaison</h2>';
        //--------------------------------------------------------
        // 06 - Conditions et opérateurs de comparaison
        //--------------------------------------------------------

        // isset() - test si une information est définie, si elle existe
        // empty() - test si une information est définie mais surtout si cette information est vide !

        $test_si_existe = 0; // ou false ou ''

        if(isset($test_si_existe)) {
            echo '01 - La variable existe <br>'; // la variable existe donc on voit ce message
        }

        if(isset($existe_pas)) {
            echo '02 - La variable existe <br>'; // la variable n'existe pas donc on ne voit pas ce message
        }

        $pseudo = ""; // ou 0 ou false
        // on teste si la variable pseudo est vide
        if(empty($pseudo)) {
            echo 'La variable pseudo est vide<br>';
        } else {
            echo 'La variable pseudo n\'est pas vide<br>';
        }

        // ⚠ isset() ne fait que tester si une variable existe ⚠
        // ⚠ empty() test si une information est vide ou l'inverse ⚠
        // ⚠ une chaine vide "" ou 0 ou false sont considéré comme vide. ⚠
        // ⚠ Pour ne pas avoir d'erreur, empty() test au préalable si la variable existe ⚠
        
        /*
            avec empty : 
            ------------
            - la variable n'existe pas => true
            - la variable existe mais ne contient rien ou 0 ou false => true

            - la variable existe et contient quelque chose => false
        */

        // if / elseif / else
        $a = 10;
        $b = 5;
        $c = 2;

        if($a > $b) {
            echo 'La valeur de a est bien supérieure à la valeur de b <br>';
        } else {
            echo 'La valeur de a n\'est pas supérieure à la valeur de b <br>';
        }

        // Plusieurs conditions : &&
        if($a > $b && $b > $c) {
            echo 'Ok pour les deux conditions obligatoires<br>';
        }

        // l'une ou l'autre d'un ensemble de conditions : ||
        if($a < $c || $b > $c) {
            echo 'Ok pour au moins une des conditions<br>';
        }

        //-------------------

        if($a == 8) {
            echo 'Réponse 1<br>';
        } elseif($a != 10) {
            echo 'Réponse 2<br>';
        } else {
            echo 'Réponse 3<br>'; // réponse 3 ✨
        }

        //-----------------
        // forme contractée : ecriture ternaire :        
        echo ($a == 10) ? "la variable a est égale à 10<br>" : "la variable a est différente de 10<br>";

        // écriture classique : 
        if($a == 10) {
            echo "la variable a est égale à 10<br>";
        } else {
            echo "la variable a est différente de 10<br>";
        }

        //-------------------
        $varA = 1; // type int
        $varB = '1'; // type string

        // comparaison des valeurs
        if($varA == $varB) {
            echo 'C\'est la même valeur<br>';
        } else {
            echo 'Les valeurs sont différentes<br>';
        }

        // comparaison stricte en terme de valeur et de type
        if($varA === $varB) {
            echo 'C\'est la même valeur et le même type<br>';
        } else {
            echo 'Les valeurs et/ou les types sont différents<br>';
        }

        /*
            Opérateurs de comparaison
            -------------------------
            =       Affectation (ce n'est pas un opérateur de comparaison)
            ==      est égal à - Comparaison des valeurs uniquement
            ===     est strictement égal à - Comparaison des valeurs ET des types
            !=      est différent de - Comparaison des valeurs uniquement
            !==     est strictement différent de - Comparaison des valeurs ET des types
            >       strictement supérieur
            >=      supérieur ou égal
            <       strictement inférieur
            <=      inférieur ou égal            
        */

        echo '<b>Les conditions switch</b><hr>';

        // les 'case' représentent des cas différents dans lesquel nous pouvons entrer
        $couleur = 'jaune';

        switch($couleur) {
            case 'bleu' : 
                echo 'Vous aimez le bleu<br>';
            break;
            case 'rouge' : 
                echo 'Vous aimez le rouge<br>';
            break;
            case 'vert' : 
                echo 'Vous aimez le vert<br>';
            break;
            default : 
                echo 'Vous n\'aimez ni le rouge, ni le bleu, ni le vert<br>';
            break;
        }

        // Exercice: refaire la même condition avec if
        $couleur = 'jaune';
        if($couleur == 'bleu') {
            echo 'Vous aimez le bleu<br>';
        } elseif($couleur == 'rouge') {
            echo 'Vous aimez le rouge<br>';
        } elseif($couleur == 'vert') {
            echo 'Vous aimez le vert<br>';
        } else {
            echo 'Vous n\'aimez ni le rouge, ni le bleu, ni le vert<br>';
        }


        echo '<h2>07 - Fonctions prédéfinies</h2>';
        //--------------------------------------------------------
        // 07 - Fonctions prédéfinies
        //--------------------------------------------------------

        // déjà inscrite au langage, le developpeur ne fait que l'exécuter.

        // Quand on manipule une fonction, il faut savoir quels sont les arguments à fournir (s'il y en a) et quel sera la valeur de retour (la réponse de la fonction)

        // La fonction date() permettant d'obtenir la date du jour selon un format fourni en argument.
        // https://www.php.net/manual/fr/function.date.php

        echo 'Bonjour nous sommes le ' . date('d/m/Y H:i:s') . '<hr>';

        echo 'Bonjour nous sommes le ' . date('d/m/Y') . ' et il est ' . date('H:i:s') . '<hr>';


        // Fonction pour des traitements de chaine de caractères.

        // strpos()

        $email = 'mail@mail.fr';
        // strpos() permet de chercher une chaine de caractères contenue dans une autre chaine 
        // 1er argument : où on cherche
        // 2eme argument : ce que l'on cherche
        // Valeur de retour : un entier (int) représentant la position, si l'information n'est pas trouvée, on obtient le booleen false

        echo strpos($email, '@') . '<br>'; // affiche 4

        // ⚠ Attention, la position du premier caractère est 0. C'est pour ça que l'on obtient 4 et non pas 5 ! ⚠

        $email2 = 'bonjour';
        echo strpos($email2, '@') . '<br>'; // on obtient false car le @ n'est pas présent dans la chaine.
        // Le false ne sera pas visible avec un echo.
        // Pour voir le false, on peut utiliser une instruction d'affichage améliorée : var_dump(); // Outil majeur pour le développeur pour debugger !
        var_dump( strpos($email2, '@') );
        echo '<hr>';

        // strlen()
        $phrase = "Lorem ipsum";

        // strlen() permet de compter la taille d'une chaine
        // 1 argument : la chaine à compter
        // valeur de retour : une entier (int) représentant le nombre de caractères de la chaine.
        echo strlen($phrase) . '<hr>';
        // ⚠ Attention strlen() ne compte pas vraiment le nombre de caractères mais en fait compte le nombre d'octet. 1 caractère = 1 octet sauf pour les caractères spéciaux
        // exemple : 
        echo strlen('€') . '<hr>'; // 3

        // Pour éviter ce souci il faut privilégier une autre fonction similaire sauf que cette fonction compte bien le nombre de caractères qq soit le nombre d'octet
        // iconv_strlen()
        echo iconv_strlen($phrase) . '<hr>'; // 11
        echo iconv_strlen('€') . '<hr>'; // 1

        
        // substr()
        // pour découper une chaine.

        // 1er argument : la chaine à découper
        // 2eme argument : la position de départ pour découper la chaine.
        // 3eme argument (facultatif) : le nombre de caractères à découper depuis la position de départ. (si cet argument n'est pas fourni, on récupère toute la suite depuis la position de départ).

        // La valeur de retour : la chaine découpée.

        $text = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eu augue eget mauris luctus semper. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Fusce venenatis convallis imperdiet. Ut vehicula eu tellus ut scelerisque. Praesent blandit vel leo eu ornare. Donec lacinia tellus at varius tempus.';

        echo substr($text, 0, 50) . ' ... <a href="">Lire la suite</a>';


        echo '<h2>08 - Fonctions utilisateur</h2>';
        //--------------------------------------------------------
        // 08 - Fonctions utilisateur
        //--------------------------------------------------------
        // fonction déclarée par le developpeur pour ensuite l'exécuter.

        // déclaration d'une fonction
        // fonction simple sans argument pour écrire 3 fois hr dans le code source
        function separateur() {
            echo '<hr><hr><hr>';
        }

        // exécution : 
        separateur();
        
        //-------------

        // fonction avec argument (parametre)
        // les arguments sont des paramètres fournis à la fonction lui permettant de compléter ou modifier son comportement.

        // fonction pour dire bonjour à un utilisateur selon un pseudo fourni en argument.
        // $qui est un argument de réception permettant de représenter l'information attendue

        function dire_bonjour($qui) {
            return 'Bonjour ' . $qui . ' bienvenue sur notre site<br>';
            echo '<h1>TEST</h1>'; // ⚠ Attention, cette ligne ne sera jamais exécutée car après un return. Effectivement, dans une fonction, lorsque l'on tombe sur un return, la fonction s'arrete immédiatement. Les instructions après un return ne seront jamais exécutées !
        }
        

        // exécution : 
        // si une fonction attend un argument, nous devons lui fournir
        echo dire_bonjour('Mathieu');
        echo dire_bonjour('Pseudo');
        $pseudo = 'Julie';
        echo dire_bonjour($pseudo);
        // si on veut afficher le résultat de la fonction qui contient un return, à nous d'appeler un echo.

        // fonction permettant de calculer le prix ttc
        function applique_TVA($valeur) {
            return $valeur * 1.2;
        }

        separateur();

        echo 'Le prix TTC avec 20% de TVA pour 1000 : ' . applique_TVA(1000) . '<br>';
        echo 'Le prix TTC avec 20% de TVA pour 2500 : ' . applique_TVA(2500) . '<br>';

        separateur();

        // faire une fonction permettant de choisir le taux de TVA à appliquer
        // 20 % => 1.2
        // 5.5% => 1.055
        function applique_TVA2($valeur, $taux) {
            return $valeur * $taux;
        }
        echo 'Le prix TTC avec 5.5% de TVA pour 1000 : ' . applique_TVA2(1000, 1.055) . '<br>';
        echo 'Le prix TTC avec 20% de TVA pour 2500 : ' . applique_TVA2(2500, 1.2) . '<br>';

        $a1 = 2000;
        $t1 = 1.2;
        echo 'Le prix TTC avec 20% de TVA pour ' . $a1 . ' : ' . applique_TVA2($a1, $t1) . '<br>';

        separateur();

        // la même fonction mais avec un argument facultatif
        function applique_TVA3($valeur, $taux = 1.2) {
            return $valeur * $taux;
        }

        echo 'Le prix TTC avec 5.5% de TVA pour 1000 : ' . applique_TVA3(1000, 1.055) . '<br>'; 
        // avec deux arguments, le deuxième remplace la valeur par défaut de l'argument $taux
        
        echo 'Le prix TTC avec 20% de TVA pour 2500 : ' . applique_TVA3(2500) . '<br>'; 
        // avec un seul argument, $taux aura sa valeur par defaut (1.2)



        //--------
        // fonction pour renvoyer du texte selon une saison et selon une temperature
        function meteo($saison, $temperature) {
            $debut = 'Nous sommes en ' . $saison;

            $suite = ' et il fait ' . $temperature . ' degré(s)';

            return $debut . $suite . '<hr>';
        }

        separateur();
        
        echo meteo('hiver', -1);
        echo meteo('printemps', 15);
        echo meteo('été', 25);
        echo meteo('automne', 0);

        // Exercice : faire une fonction meteo2 permettant de gérer l'article "en" ou "au" pour la $saison et le (s) sur degré selon la valeur de $temperature

        function meteo2($saison, $temperature) {
            
            if($saison == 'printemps') {
                $debut = 'Nous sommes au ' . $saison;
            } else {
                $debut = 'Nous sommes en ' . $saison;
            }

            if($temperature == 0 || $temperature == 1 || $temperature == -1) {
            // if($temperature >= -1 && $temperature <= 1) {
                $suite = ' et il fait ' . $temperature . ' degré';
            } else {
                $suite = ' et il fait ' . $temperature . ' degrés';
            }

            return $debut . $suite . '<hr>';
        }
        echo meteo2('hiver', -1);
        echo meteo2('printemps', 15);
        echo meteo2('été', 25);
        echo meteo2('automne', 0);

        separateur();
        separateur();
        separateur();
        separateur();

        //----- la même fonction avec le moins de code possible
        echo meteo3('hiver', -1);
        echo meteo3('printemps', 15); // il est possible d'exécuter une fonction avant sa déclaration. Avec PHP, les fonctions sont préchargées avant l'exécution du script.
        echo meteo3('été', 25);
        echo meteo3('automne', 0);

        function meteo3($saison, $temperature) {
            $article = 'en';
            $s = 's';

            if($saison == 'printemps') {
                $article = 'au';
            }

            if($temperature == 0 || $temperature == 1 || $temperature == -1) {
                $s = '';
            }

            return 'Nous sommes ' . $article . ' ' . $saison . ' et il fait ' . $temperature . ' degré' . $s . '<hr>';
        }
        

        separateur();

        // Environnement Local & Global
        // l'environnement global représente tout le script
        // l'environnement local se trouve à l'intérieur des {} d'une fonction.

        function affichage_jour() {
            $jour = 'mardi'; // variable déclarée dans l'espace LOCAL !
            // cette variable $jour n'existe que dans la fonction
            return $jour;
        }

        echo $jour . '<br>'; // cette ligne affiche une erreur car la variable $jour n'existe pas dans l'espace global car déclarée dans l'espace local d'une fonction.


        $pays = 'France'; // variable déclarée dans l'espace global

        function affiche_pays() {
            global $pays; // avec le mot clé global, il est possible d'aller chercher une variable dans l'espace global. Sans cette ligne, la fonction déclencherait une erreur !
            echo $pays . '<hr>';
        }

        affiche_pays();


        echo '<h2>09 - Les boucles</h2>';
        //--------------------------------------------------------
        // 09 - Les boucles
        //--------------------------------------------------------

        // Une boucle sert à répéter un traitement autant de fois que nécessaire.
        // 3 informations nécessaires pour mettre en place une boucle.
        // 01 - une valeur de départ (compteur)
        // 02 - une condition d'entrée dans la boucle selon le compteur
        // 03 - incrémentation ou décrémentation pour modifier le compteur et ne pas avoir une boucle infinie.

        // boucle while() 

        $i = 0; // valeur de départ (compteur)

        while($i < 10) { // condition d'entrée
            echo $i . ' - ';
            $i++; // équivaut à écrire $i = $i + 1; // incrémentation
        }

        separateur();

        // boucle for()
        // for(valeur_de_depart; condition_dentree; incrémentation)
        for($i = 0; $i < 10; $i++) {
            echo $i . ' - ';
        }

        // reprendre une de ces deux boucles, et l'améliorer de façon à ne pas avoir le dernier - 
        // en l'état :  0 - 1 - 2 - 3 - 4 - 5 - 6 - 7 - 8 - 9 -
        // attendu :    0 - 1 - 2 - 3 - 4 - 5 - 6 - 7 - 8 - 9

        //---------------

        // Faire une boucle qui fait 100 tours et qui affiche les valeur de 0 à 99
        // - Le chiffre 50 doit être en rouge !



        separateur();
        // exemple : création d'une liste de selection html avec une boucle : 
        echo '<select style="width: 140px; height: 30px; border: 1px solid #dedede" >';
        
        for($i = 1930; $i <= 2020; $i++) {
            echo '<option>' . $i . '</option>';
        }

        echo '</select>';

        // Mélange html / php
        separateur();

        // Exercice : faire une boucle qui affiche de 0 à 9 sur une même ligne.
        // 0123456789

        for($i = 0; $i < 10; $i++) {
            echo $i;
        }

        // refaire la même boucle mais en l'affichant sous forme de tableau html
        separateur();

        // refaire le même tableau avec une boucle while()
        echo '<table border="1" style="border-collapse: collapse; width: 50%; margin: 0 auto;">';
        echo '<tr>';

        for($i = 0; $i < 10; $i++) {
            echo '<td>' . $i . '</td>';
        }

        echo '</tr>';
        echo '</table>';


        echo '<h2>10 - Inclusion de fichier</h2>';
        //--------------------------------------------------------
        // 10 - Inclusion de fichier
        //--------------------------------------------------------

        // Créer un fichier exemple.inc.php dans le même dossier que entrainement.php et copier coller du texte dans ce fichier.

        echo '<b>1er affichage avec include</b><hr>';
        include 'exemple.inc.php';

        echo '<hr><b>2eme affichage avec include_once</b><hr>';
        include_once 'exemple.inc.php';

        echo '<hr><b>1er affichage avec require</b><hr>';
        require 'exemple.inc.php';

        echo '<hr><b>2eme affichage avec require_once</b><hr>';
        require_once 'exemple.inc.php';

        // Avec le _once, on vérifie si le fichier a déjà été appelé, si c'est le cas, on le rappelle pas !
        // Différence entre include et require :
        // En cas d'erreur, include provoque un warning et continu l'exécution du code.
        // En cas d'erreur, require provoque une erreur fatale et bloque l'exécution du code. 


        echo '<h2>11 - Les tableaux de données array</h2>';
        //--------------------------------------------------------
        // 11 - Les tableaux de données array
        //--------------------------------------------------------
        // un tableau array est un nouveau type de données. Toujours contenu dans une variable mais cette fois ci, au lieu d'avoir une seule information, on a un ensemble d'information.
        // Un tableau array est toujours composé de deux colonnes : 
        // 1 colonne contenant l'indice
        // 1 colonne contenant la valeur correspondante.
        // On appelle toujours l'indice pour obtenir la valeur.

        // déclaration d'un tableau array : 
        $liste_fruit = array('fraises', 'oranges', 'pommes', 'bananes', 'kiwis', 'pêches', 'ananas');

        // pour voir le contenu du tableau, nous avons 2 outils d'affichage amélioré : 
        // var_dump() & print_r()
        echo 'Affichage du tableau avec print_r : <br>';
        echo '<pre>'; print_r($liste_fruit); echo '</pre>';
        
        separateur();
        
        echo 'Affichage du tableau avec var_dump : <br>';
        echo '<pre>'; var_dump($liste_fruit); echo '</pre>';

        // autre façon de déclarer un tableau array : 
        $liste_pays[] = 'France';
        $liste_pays[] = 'Espagne';
        $liste_pays[] = 'Ecosse';
        $liste_pays[] = 'Belgique';
        $liste_pays[] = 'Egypte';
        $liste_pays[] = 'Brésil';
        echo '<pre>'; print_r($liste_pays); echo '</pre>'; 
        /*
            [0] => France
            [1] => Espagne
            [2] => Ecosse
            [3] => Belgique
            [4] => Egypte
            [5] => Brésil
        */
        // essayez d'afficher Ecosse avec un echo en piochant dans le tableau array 
        separateur();
        echo $liste_pays[2] . '<br>';

        // il est possible d'écraser une des valeurs du tableau
        $liste_pays[2] = 'Portugal';
        echo '<pre>'; print_r($liste_pays); echo '</pre>'; 

        // il est possible de rajouter un élément dans le tableau à tout moment.
        $liste_fruit[] = 'Cerises';
        echo '<pre>'; print_r($liste_fruit); echo '</pre>';

        // il est possible de forcer nous même les indices (numériques ou chaines de caractères)
        $utilisateur = array('pseudo' => 'admin', 'mdp' => 'soleil', 'email' => 'admin@mail.fr', 'age' => 40, 'date_inscription' => '2019-02-24');

        $utilisateur['telephone'] = '0102030405';

        echo '<pre>'; print_r($utilisateur); echo '</pre>';

        echo $utilisateur['email'] . '<hr>';

        // Boucle foreach() spécifique aux tableaux array et aux objets
        // cet outil permet de parcourir les éléments d'un tableau ou d'un objet. Ne fonctionne pas avec autre chose.

        // AS est un mot clé obligatoire.
        // si on met une seule variable après le AS, cette variable récupère les valeur l'une après l'autre à chaque tour de boucle.
        foreach($liste_fruit AS $valeur_en_cours) {
            echo '- ' . $valeur_en_cours . '<br>';
        }

        separateur();

        // si on met 2 variables après le AS, la première récupère l'indice, la deuxième récupère la valeur
        foreach($utilisateur AS $ind => $val) {
            echo '- ' . $ind . ' : ' . $val . '<br>';
        }

        separateur();

        // il est possible de faire une boucle for() ou while() pour afficher le contenu du tableau à la condition que les indices soient numériques !!!

        // pour connaitre le nombre d'élément dans un tableau :
        // sizeof()
        // count()
        echo 'Nombre d\'élément dans le tableau array liste_fruit : ' . sizeof($liste_fruit) . '<hr>';
        echo 'Nombre d\'élément dans le tableau array liste_pays : ' . count($liste_pays) . '<hr>';

        separateur();
        // sizeof() ou count() => similaires.
        // affichage des fruits dans une liste html
        echo '<ul>';
        $i = 0;
        while($i < sizeof($liste_fruit)) {
            echo '<li>' . $liste_fruit[$i] . '</li>';
            $i++;
        }
        echo '</ul>';

        separateur();
        
        echo '<ul>';        
        for($i = 0; $i < count($liste_fruit); $i++) {
            echo '<li>' . $liste_fruit[$i] . '</li>';
        }
        echo '</ul>';


        echo '<br><b>Les tableaux ARRAY multidimensionnel</b><hr>';

        $tab_multi = array( array('prenom' => 'Jean-pierre', 'nom' => 'Laborde', 'service' => 'direction'), array('prenom' => 'Clément', 'nom' => 'Gallet', 'service' => 'commercial'), array('prenom' => 'Thomas', 'nom' => 'Winter', 'service' => 'commercial') );

        $tab_multi = array( 
                            array(
                                'prenom' => 'Jean-pierre', 
                                'nom' => 'Laborde', 
                                'service' => 'direction'
                            ), 
                            array(
                                'prenom' => 'Clément', 
                                'nom' => 'Gallet', 
                                'service' => 'commercial'
                            ), 
                            array(
                                'prenom' => 'Thomas', 
                                'nom' => 'Winter', 
                                'service' => 'commercial'
                            ) );

        echo '<pre>'; print_r($tab_multi); echo '</pre>';

        // Pour afficher une information d'un tableau array multidimensionnel : une succession de [] pour chaque sous niveau dans le tableau.
        // Affichage de l'information "Thomas" en passant par le tableau : 
        echo $tab_multi[2]['prenom']; 
        
        separateur();

        echo $tab_multi[2]['prenom'] . ' ' . $tab_multi[2]['nom']; 

        echo '<h2>12 - Les objets</h2>';
        //--------------------------------------------------------
        // 12 - Les objets
        //--------------------------------------------------------
        // Un objet est un autre type de données.
        // Toujours contenu dans une variable, un objet possède ses propres informations (propriétés ou attributs de l'objet) et du fonctionnel (methodes de l'objet)
        // Avec PHP, un objet est toujours issu d'une classe (son modèle de construction)
        // Une class PHP n'est pas sensible à la casse.
        
        // Un objet est un conteneur symbolique permettant de regrouper des propriétés et des methodes.

        // Déclaration d'une class
        class Etudiant {
            // public permet de préciser que l'information est disponible directement en l'appelant depuis l'objet.
            public $prenom = 'Julien'; // propriété "prenom"
            public $nom = 'Durand'; // propriété "nom"
            public $age = 25; 
            public $competences = array('html', 'css', 'js', 'php', 'sql'); // propriété de type array

            // methode :
            public function ajouter_competence($nouvelle) {
                return $this->competences[] = $nouvelle;
                // $this représnte l'élément parent (l'objet qui sera créé)
            }
        }

        // création d'un objet issu de la class Etudiant
        // new est un mot clé obligatoire permettant de créer l'objet
        $objet1 = new Etudiant();

        // Pour voir les propriétés d'un objet : 
        echo '<pre>'; var_dump($objet1); echo '</pre>'; // ou print_r()

        // Pour voir les methodes d'un objet :
        echo '<pre>'; var_dump( get_class_methods($objet1) ); echo '</pre>';
        
        // il est possible de créer autant d'objet que nécessaire depuis une même class
        $objet2 = new Etudiant();
        echo '<pre>'; var_dump($objet2); echo '</pre>';

        // Pour appeler une propriété sur l'objet : ->
        echo $objet1->prenom . '<hr>';
        echo $objet1->nom . '<hr>';
        echo $objet1->age . '<hr>';
        echo '<pre>'; print_r($objet1->competences); echo '</pre>';

        // pareil pour une methode
        $objet1->ajouter_competence('Wordpress');

        echo '<pre>'; print_r($objet1->competences); echo '</pre>';
        /*
            [0] => html
            [1] => css
            [2] => js
            [3] => php
            [4] => sql
            [5] => Wordpress
        */












    ?> 




    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>



</body>
</html>