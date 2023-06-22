<?php
require('./backend/actions/database.php');
?>


<!DOCTYPE html>
<html lang="fr">

<?php include './frontend/includes/head.php'; ?>

<body>

    <!-------HEADER-------->

    <?php include './frontend/includes/navbar.php'; ?>

    <!--------MAIN-------->

    <main>
        <div class="centralContainer">
            <div id="ficheOiseau">
            <!-- <div class="input"> -->
                <input type="text" name="searchInput" placeholder="Rechercher un oiseau" id="searchInput">
            <!-- </div> -->
                <!--voir gallerieFO.js-->
            </div>
        </div>
    </main>

    <!-------FOOTER--------->


    <?php include './frontend/includes/footer.php'; ?>

    <script src="./frontend/script/gallerieFO.js"></script>

</body>
</html>