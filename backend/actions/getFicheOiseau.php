<?php
require_once('database.php');

$stmt = $bdd->prepare('SELECT nom_fiche_oiseau, image_fiche_oiseau, description_fiche_oiseau, contenu_fiche_oiseau, localisation_fiche_oiseau FROM fiche_oiseau');
$stmt->execute();

$fiche_oiseaux = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($fiche_oiseaux);