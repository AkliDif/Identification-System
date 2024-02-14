<?php require_once('./inc/init.inc.php'); ?>
<?php
    
    if (isset($_GET['action']) && $_GET['action'] == 'deconnexion') {
        session_destroy();
        // header('Location: index.php');

        unset($_SESSION);
        unset($_COOKIE);
        header('Location: index.php');

    }

    if(user_connected()) 
    {
        header("location:connected.php");
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (!isset($_POST['_token']) || $_POST['_token'] !== $_SESSION['_token']) {
            die('Token invalide');
        }
        if (isset($_POST['connect'])) {
            connect_user($_POST['username'], $_POST['password']);
        }
    }
    $_SESSION['_token'] = bin2hex(random_bytes(32));
?>

<?php require_once('./inc/haut.inc.php'); ?>
    <div class="form">

        <!-- load the logo with php script -->
        <div class="logo">
            <img src="./inc/img/bird_2.jpg" alt="GloGlo" style="width: 100px; height: 100px;">
        </div>

        <form action="index.php" method="post">
            <input type="text" name="username" placeholder="Username"> </br>
            <input type="password" name="password" placeholder="Password"></br>

                <?php if (isset($_SESSION['input_data_error'])): ?>
                    <p class="error-message"><?php echo $_SESSION['input_data_error']; ?></p>
                    <?php unset($_SESSION['input_data_error']);?>
                <?php endif; ?>
                <?php if (isset($_SESSION['password_error'])): ?>
                    <p class="error-message"><?php echo $_SESSION['password_error']; ?></p>
                    <?php unset($_SESSION['password_error']);?>
                <?php endif; ?>
            <div class="buttons">
                <input type="submit" name="connect" value="Connect">
                <input type="reset" name="reset" value="Reset">
                <input type="button" name="newAccount" value="New Account" onclick="location.href='registration.php'">
            </div>
            <!-- to prevent crsf -->
            <input type="hidden" name="_token" value="<?php
                if (isset($_SESSION['_token'])): 
                        echo $_SESSION['_token']; 
                    else: 
                        echo ''; // Replace 'default_value' with the value you want to use if _token is not set
                    endif; 
                ?>">
        </form>
    </div>
<?php require_once('./inc/bas.inc.php'); ?>