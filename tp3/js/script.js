$(document).ready(function() {

    $( function() {
        // pour avoir datepicker :

        //<input type="text" autocomplete="off" name="date_sortie" id="date_sortie" class="form-control">
        
        //<input type="text" autocomplete="off" name="date_rendu" id="date_rendu" class="form-control">


        // jquery js complet (pas la version slim)
        // <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

        // jquery ui js 
        // <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

        // jquery ui css (pour la mise en forme des éléments)
        // <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        // Pour traiter la date et la transformer au format en :
        // exemple : 
        /*
        if(isset($_POST['date_sortie'])) {
            // explode permet de découper une chaine selon un caractère, ici le / et de placer chaque morceau dans un tableau array
            $date_fr_to_en = explode('/', $_POST['date_sortie']);
            echo '<pre>'; print_r($date_fr_to_en); echo '</pre>';
            // on pioche dans le tableau pour reproduire la date au format en
            $date_sortie_en = $date_fr_to_en[2] . '-' . $date_fr_to_en[1] . '-' . $date_fr_to_en[0];
            echo $date_sortie_en; 
        }
        */



        // pour déclencher le ou les calendriers
        $( "#date_rendu, #date_sortie" ).datepicker( { } )

        // pour avoir le calendrier en fr
        $.datepicker.regional['fr'] = {
            clearText: 'Effacer',
            closeText: 'Fermer', 
            prevText: '&lt;Préc', 
            nextText: 'Suiv&gt;',
            currentText: 'Courant', 
            monthNames: ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'],
            monthNamesShort: ['Jan','Fév','Mar','Avr','Mai','Jun','Jul','Aoû','Sep','Oct','Nov','Déc'],
            weekHeader: 'Sm', 
            dayNames: ['Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'],
            dayNamesShort: ['Dim','Lun','Mar','Mer','Jeu','Ven','Sam'],
            dayNamesMin: ['Di','Lu','Ma','Me','Je','Ve','Sa'],
            dateFormat: 'dd/mm/yy', 
            firstDay: 1,
            isRTL: false
        };
        $.datepicker.setDefaults($.datepicker.regional['fr']);
      } );

});