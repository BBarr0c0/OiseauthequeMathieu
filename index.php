<?php
require('./backend/actions/database.php');
//require('actions/securityAction.php')
?>








<!DOCTYPE html>
<html lang="fr">

<?php include './frontend/includes/head.php'; ?>

<body>

    <!-------HEADER-------->

<?php include 'frontend/includes/navbar.php'; ?>

    <!--------MAIN-------->

    <main>


        <?php if (isset($_SESSION['auth'])) { 
            echo "TEST: vous êtes connecté";
            echo '<small><a href="./backend/actions/logoutAction.php">Déconnexion</a></small>';
        } ?>


        <div class="centralContainer"> <!--Créé pour le changement de thème-->
            <section id="welcome">
                <h1>Bienvenue sur <strong>l'oiseauthèque</strong> !</h1>
                <p>Ce site a pour but de promouvoir les oiseaux de la France métropolitaine et leur sauvegarde.</p>
                <p>Il se veut accessible et ludique, pour que tout les âges puissent s'y retrouver afin de partager leur passion de l'ornithologie ou simplement leur émerveillement des créatures à plumes, ainsi que leur protection.</p>
                <p>Vous trouverez sur ce site:</p>
                <ul>
                    <li>Des fiches d'oiseaux détaillés</li>
                    <li>Des conseils lorsque vous trouvez un oiseau</li>
                    <li>Des coordonnées pour avoir des conseils professionnels ou un lieu pour amener un oiseau blessé</li>
                    <li>Un forum baptisé "les pies bavardes"</li>
                    <li>Un espace quizz pour tester vos connaissances</li>
                    <li>Des articles</li>
                </ul>
                <p>N'hésitez pas à créer un compte et participer autour de notre passion commune !</p>
                <p>Bonne navigation sur notre site !</p>
            </section>

            <!-----DEBUT SLIDER----->

            <div class="titleSlider">
                <h2>Une sélection d'oiseaux:</h2>
            </div>

            <div id="birdSlider">
                <div class="slides">
                    <div id="slide" class="slide">
                        <!--voir birds.js et birds.json-->
                    </div>
                </div>
            </div>

            <!-----FIN SLIDER----->

        </div>
    </main>

    <!-------FOOTER--------->

<?php include 'frontend/includes/footer.php'; ?>

<script src="./frontend/script/birds.js"></script>

<script src="./frontend/script/scriptSlider.js"></script>

</body>

</html>