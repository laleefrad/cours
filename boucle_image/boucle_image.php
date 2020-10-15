<?php 
    // EXERCICES :
    // 01 - récupérer 5 images sur le web (pixabay.com), les enregistrer dans ce dossier et les renommer de cette manière : image1.jpg / image2.jpg / image3.jpg / image4.jpg / image5.jpg
    // 02 - afficher une des 5 images dans la page web avec un echo '<img src="...">'
    // 03 - afficher 5 fois la même image toujours avec un seul echo (boucle)
    // 04 - afficher les 5 images toujours avec un seul echo (boucle + ...)


?>

<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            h2 { background-color: MediumSlateBlue; padding: 20px; color: white; }
            img { max-width: 350px; }
        </style>
    </head>
    <body>
        <h2>Exercice 2</h2>
        <?php echo '<img src="image1.jpg" alt="une image blablabla">'; ?>

        <h2>Exercice 3</h2>
        <?php 
            for($i = 0; $i < 5; $i++) {
                echo '<img src="image2.jpg" alt="une image blablabla"> ';
            }
        
        ?>

        <h2>Exercice 4</h2>
        <?php 
            for($i = 1; $i < 6; $i++) {
                echo '<img src="image' . $i . '.jpg" alt="une image' . $i . ' blablabla"> ';
                // echo "<img src='image$i.jpg' alt='une image$i blablabla'> ";
            }
        
        ?>

        <h2>Exercice 4 bis</h2>
        <?php 
            $liste_image = array(
                                    '<img src="image1.jpg"> ', 
                                    '<img src="image2.jpg"> ', 
                                    '<img src="image3.jpg"> ', 
                                    '<img src="image4.jpg"> ', 
                                    '<img src="image5.jpg"> '
                                );

            // echo '<pre>'; print_r($liste_image); echo '</pre>';

            for($i = 0; $i < 5; $i++) {
                echo $liste_image[$i];
            }
        
        ?>


        
    </body>
</html>