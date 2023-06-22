<?php
require('./backend/actions/database.php'); //require est un équivalent de include mais plus sécurisé, car si il y a une erreur il ne permettra pas d'afficher le reste du code ci dessous

// Validation du formulaire
if(isset($_POST['validate'])) {
    
    // Vérification du reCaptcha
    $recaptchaResponse = $_POST['g-recaptcha-response'];
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array(
        'secret' => '6LdyZXAmAAAAAJZEKJnsCG0VdqkMVi5rsS1YHMT7',
        'response' => $recaptchaResponse
    );

    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $response = json_decode($result, true);

    if(!$response['success']) {
        // Le reCaptcha n'est pas valide
        $errorMsg = "Veuillez cocher la case prouvant que vous n'êtes pas un robot";
    }else{  
        // Vérification des autres champs du formulaire
        if(!empty($_POST['username']) && !empty($_POST['password'])) {

        // Appliquer les fonctions pour nettoyer les données entrées par l'utilisateur
        $username     = trim($_POST['username']);
        $password     = trim($_POST['password']);

        $username     = htmlentities($username, ENT_QUOTES, 'UTF-8');
        $password     = htmlentities($password, ENT_QUOTES, 'UTF-8');

        $username     = strip_tags($username);
        $password     = strip_tags($password);

        $username     = stripslashes($username);
        $password     = stripslashes($password);

        // Données de l'utilisateur
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

            // Vérifier si le pseudo existe
            $checkIfUserExists = $bdd->prepare('SELECT * FROM utilisateur WHERE pseudo_utilisateur = ?');
            $checkIfUserExists->execute(array($username));

            if($checkIfUserExists->rowCount() > 0) {
                // Pseudo existant, vérifier le mot de passe
                $infoUser = $checkIfUserExists->fetch();
                if(password_verify($password, $infoUser['mdp_utilisateur'])) {
                    // Mot de passe correct, l'utilisateur est connecté
                    //$testMsg = "Vous êtes connecté";
                    
                    // Pour authentifier l'utilisateur (récupération de ses données dans des variables sessions)
                    $_SESSION['auth'] = true;
                    $_SESSION['id'] = $infoUser['Id_Utilisateur'];
                    $_SESSION['username'] = $infoUser['pseudo_utilisateur'];

                    // Redirection vers une autre page
                    header("Location: index.php");
                    exit(); // Terminer l'exécution du script ici

                }else{
                    // Mot de passe incorrect
                    $errorMsg = "Mot de passe incorrect";
                }
            }else{
                // Pseudo inexistant
                $errorMsg = "L'utilisateur n'existe pas";
            }
        }else{
            // Champs du formulaire non remplis
            $errorMsg = "Veuillez compléter tous les champs";
        }
    }
}

?>