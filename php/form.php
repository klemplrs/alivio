<?php

if (isset($_POST['message'])) {
    $position_arobase = strpos($_POST['email'], '@');
    if ($position_arobase === false)
        echo '<p>Votre email doit comporter un arobase.</p>';
    else {
        $retour = mail('clementperso.dp@gmail.com', 'Envoi depuis le formulaire de Contact', $_POST['message'], 'From: ' . $_POST['email']);
        if ($retour)
            echo '<p>Votre message a été envoyé.</p>';
        else
            echo '<p>Erreur.</p>';
    }
}
