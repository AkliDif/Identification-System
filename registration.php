<?php 
    if (file_exists("inc/init.inc.php")) {
        require_once("inc/init.inc.php");
    } else {
        die("Error: init.inc.php not found");
    }
?>
<?php
    if(user_connected()) 
    {
        header("location:connected.php");
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if (!isset($_POST['_token']) || $_POST['_token'] !== $_SESSION['_token']) {
            die('Token invalide');
        }

        $_POST['username'] = addslashes($_POST['username']);
        $_POST['password'] = addslashes($_POST['password']);
        $_POST['password_conf'] = addslashes($_POST['password_conf']);
    
        if (isset($_POST['create'])) {
            add_user($_POST['username'], $_POST['password'], $_POST['password_conf']);
        }
    }
    
    $_SESSION['_token'] = bin2hex(random_bytes(32));
?>

<?php
    if (file_exists("inc/haut.inc.php")) {
        require_once("inc/haut.inc.php");
    } else {
        die("Error: inc/haut.inc.php not found");
    }
?>
    <div class="form">

        <!-- load the logo with php script -->
        <div class="logo">
            <img src="./inc/img/bird_2.jpg" alt="GloGlo">
        </div>

        <form action="registration.php" method="post">
            <input type="text" name="username" placeholder="Username"> </br>
            <input type="password" name="password" placeholder="Password"></br>
            <input type="password" name="password_conf" placeholder="Password confirmation"></br>
                
                <?php if (isset($_SESSION['input_data_error'])): ?>
                    <p class="error-message"><?php echo $_SESSION['input_data_error']; ?></p>
                    <?php unset($_SESSION['input_data_error']);?>
                <?php endif; ?>

                <?php if (isset($_SESSION['password_error'])): ?>
                    <p class="error-message"><?php echo $_SESSION['password_error']; ?></p>
                    <?php unset($_SESSION['password_error']);?>
                <?php endif; ?>

                <?php if (isset($_SESSION['username_error'])): ?>
                    <p class="error-message"><?php echo $_SESSION['username_error']; ?></p>
                    <?php unset($_SESSION['username_error']);?>
                <?php endif; ?>
            
                <div class="buttons">
                    <input type="submit" id="create_button" name="create" value="Create">
                    <input type="button" value="Connexion" onclick="window.location.href='index.php'">
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
<?php
    if (file_exists("inc/bas.inc.php")) {
        require_once("inc/bas.inc.php");
    } else {
        die("Error: bas.inc.php not found");
    }
?>