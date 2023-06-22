<?php require('./backend/actions/signupAction.php'); ?>


<!DOCTYPE html>
<html lang="fr">

<?php include './frontend/includes/head.php'; ?>

<body>

<!-------HEADER-------->

<?php include './frontend/includes/navbar.php'; ?>

<!--------MAIN-------->

    <main>
        <div class="centralContainer">
            <section class="sectConnexion">
                <form id="formCreation" method="post" action="">
                    <h2>S'inscrire</h2>

                    <?php 
                        if(isset($errorMsg)){
                            echo '<p class="messageFormulaire">'.$errorMsg.'</p>';
                        }
                        /*if(isset($testMsg)){
                            echo '<p>'.$testMsg.'</p>';
                        }*/
                    ?>

                    <label for="username">Pseudo:</label>
                    <input type="text" name="username" id="username" size="25" required>
                    <label for="mail">Mail:</label>
                    <input type="email" name="mail" id="mail" size="25" required>
                    <label for="password">Mot de passe:</label>
                    <input type="password" name="password" id="password" size="25" required>

                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                    <div class="g-recaptcha" data-sitekey="6LdyZXAmAAAAAJB3fdIbTQm3kyOEms-xqdtmduLW"></div>
                    
                    <input type="submit" name="validate" value="S'inscrire">
                </form>
                <a href="./login.php">Déjà un compte ? Se connecter</a>
                <a href="https://www.youtube.com/watch?v=oI1ZN2H-gzA" target="_blank">Mot de passe oublié ?</a>
            </section>
        </div>
    </main>

<!-------FOOTER--------->

<?php include './frontend/includes/footer.php'; ?>
</body>
</html>