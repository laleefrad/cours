<?php
session_start(); // session_start() crée une session ou ne fait que l'ouvrir si elle existe déjà
echo '<pre>'; print_r($_SESSION); echo '</pre>';
