<input id="theme" type="checkbox" title="Changer de thème"><!--POUR FAIRE THEME EN CSS-->
<header>
    <div class="navBar">
        <div class="logoNavBar">
            <a href="./index.php">
                <img src="./frontend/assets/logos/logoPieTrans.png" alt="Une pie vue d'en haut avec la France en fond" title="Accueil">
                <p>Accueil</p>
            </a>
        </div>
        <nav class="centerNavBar">
            <label for="toggle">☰</label>
            <input type="checkbox" id="toggle">
            <ul class="centerMenu">
                <li class="liOiseautheque">
                    <a href="./l'oiseauthèque.php">L'oiseauthèque</a>
                </li>
                <li class="liSauvetage">
                    <a href="./sauvetage.php">Sauvetage</a>
                </li>
                <li class="liForum">
                    <a href="./forum-les-pies-bavardes.php">Forum</a>
                </li>
                <li class="liJeux">
                    <a href="./jeux.php">Jeux</a>
                </li>
                <li class="liArticles">
                    <a href="./articles.php">Articles</a>
                </li>
            </ul>
        </nav>
        <div class="idNavBar">
            <ul class="menu">
                <li class="liConnexion">
                    <a href="./login.php">S'identifier</a>
                    <ul class="subMenu">
                        <li class="liSubMenu">
                            <a href="./login.php">Se connecter</a>
                        </li>
                        <li class="liSubMenu">
                            <a href="./signup.php">Créer un compte</a>
                        </li>
                    </ul>
                </li>
                <li class="theme">
                    <div class="themeL">
                        <img src="./frontend/assets/logos/logoThemeSombre.png" alt="btnJN" title="Changer de thème">
                    </div>
                    <div class="themeD">
                        <img src="./frontend/assets/logos/logoThemeClair.png" alt="btnJN" title="Changer de thème">
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="banner">
        <img id="imgDay" src="./frontend/assets/logos/BanniereClaireTitreOiseautheque_50.jpg" alt="oiseaudiurne">
        <img id="imgNight" src="./frontend/assets/logos/BanniereSombreTitreOiseautheque_50.jpg" alt="oiseaunocturne">
    </div>
</header>