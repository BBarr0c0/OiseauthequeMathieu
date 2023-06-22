<?php
require('../backend/actions/database.php'); //rajout récent
// session_start(); //mise en commentaire récent
if(!isset($_SESSION['auth'])){
    header('location: adminLogin.php');
}
?>