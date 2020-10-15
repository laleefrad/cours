<?php

// Fonction pour savoir si l'utilisateur est connecté
function user_is_connected() {
    if(isset($_SESSION['membre'])) {
        return true;
    } else {
        return false;
    }
}

// Fonction pour savoir si l'utilisateur est administrateur
function user_is_admin() {
    if(user_is_connected() && $_SESSION['membre']['statut'] == 2) {
        return true;
    } else {
        return false;
    }
}