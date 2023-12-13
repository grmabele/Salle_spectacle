<?php
require_once('Backoffice/bdd.class.php');
$bdd = new Bdd();

if (isset($_GET['id_evenement'])) {
    $id_evenement = $_GET['id_evenement'];

    $deleteMessage = $bdd->delete($id_evenement);
    echo $deleteMessage;
} else {
    echo "ID de l'événement non spécifié.";
}

