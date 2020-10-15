<?php 
    // $couleur = 425781;

    // rand() est une fonction prédéfinie permettant d'obtenir un chiffre aléatoire compris entre 2 entiers fournis en argument à la fonction.

    $couleur = rand(100000, 999999);

    // EXERCICE : essayez de faire en sorte d'avoir un code hexadecimal avec la prise en compte également des lettres
    // Pour rappel : dans un code hexadecimal (6 caractères) on peut avoir tous les chiffres et les lettres de a jusqu'à f
    // Indice : tableau ARRAY

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Couleur aléatoire</title>
    </head>
    <body style="background-color: #<?php echo $couleur; ?>">
        <?php echo $couleur; ?>
    </body>
</html>