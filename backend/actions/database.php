<?php
    try {
        session_start();
        $bdd = new PDO('mysql:host=localhost;dbname=oiseautheque_bdd;charset=utf8', 'root', '');
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }


//     $fiche_oiseaux = json_decode(file_get_contents('../../frontend/data/ficheOiseau.json'), true);

//     foreach ($fiche_oiseaux as $fiche_oiseau) {
//         $stmt = $bdd->prepare('INSERT INTO fiche_oiseau (nom_fiche_oiseau, image_fiche_oiseau, description_fiche_oiseau, contenu_fiche_oiseau, localisation_fiche_oiseau) VALUES (?, ?, ?, ?, ?)');
//         $stmt->execute([
//             $fiche_oiseau['nom_fiche_oiseau'],
//             $fiche_oiseau['image_fiche_oiseau'],
//             $fiche_oiseau['description_fiche_oiseau'],
//             $fiche_oiseau['contenu_fiche_oiseau'],
//             $fiche_oiseau['localisation_fiche_oiseau']
//         ]);
//     }

// $bdd = null;