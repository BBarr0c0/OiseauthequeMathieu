<?php
require('./backend/actions/loginAction.php');
?>

<!DOCTYPE html>
<html lang="fr">
<?php include './adminHead.php' ?>
<body>

<!--------MAIN-------->

    <main>
        <div class="centralContainer">
            <section class="sectConnexion">
                <form id="formConnexion" method="post" action="admin.php">
                    <h2>Connexion</h2>
                    
                    <?php 
                        if(isset($errorMsg)){
                            echo '<p class="messageFormulaire">'.$errorMsg.'</p>';
                        }
                        if(isset($testMsg)){
                            echo '<p class="messageFormulaire">'.$testMsg.'</p>';
                            echo '<a href="./admin.php"></a>';
                        }
                    ?>
                    
                    <label for="username">Nom d'utilisateur:</label>
                    <input type="text" name="username" id="username" size="25" required>
                    <label for="password">Mot de passe:</label>
                    <input type="password" name="password" id="password" size="25" required>

                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                    <div class="g-recaptcha" data-sitekey="6LdyZXAmAAAAAJB3fdIbTQm3kyOEms-xqdtmduLW"></div>

                    <input type="submit" name="validate" value="Se Connecter">
                </form>
            </section>
        </div>
    </main>


</body>
</html>