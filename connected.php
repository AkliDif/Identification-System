<?php
    if (file_exists("inc/init.inc.php")) {
        require_once("inc/init.inc.php");
    } else {
        die("Error: init.inc.php not found");
    }
?>
<?php
    if (file_exists("inc/haut.inc.php")) {
        require_once("inc/haut.inc.php");
    } else {
        die("Error: inc/haut.inc.php not found");
    }
?>

    <div class="welcome-message-div">
        <p class="welcome-message">Bienvenue <?php echo $_SESSION['username']?></p>
    </div>
    <div class="logout-button">
        <input type="button" value="Deconnexion" onclick="window.location.href='index.php?action=deconnexion'">
    </div>

<?php
    if (file_exists("inc/bas.inc.php")) {
        require_once("inc/bas.inc.php");
    } else {
        die("Error: inc/bas.inc.php not found");
    }
?>