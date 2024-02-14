<?php require_once('inc/init.inc.php'); ?>
<?php require_once('./inc/haut.inc.php'); ?>

    <div class="welcome-message-div">
        <p class="welcome-message">Bienvenue <?php echo $_SESSION['username']?></p>
    </div>
    <div class="logout-button">
        <input type="button" value="Deconnexion" onclick="window.location.href='index.php?action=deconnexion'">
    </div>

<?php require_once('./inc/bas.inc.php'); ?>