<?php require_once('./inc/init.inc.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./inc/css/style.css">
    <title>GloGlo</title>
</head>
<body>
    <div class="form">

        <!-- load the logo with php script -->
        <div class="logo">
            <img src="./inc/img/bird_2.jpg" alt="GloGlo">
        </div>

        <form action="./inc/process.php" method="post">
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
            
            <input type="submit" id="create_button" name="create" value="Create">
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
</body>
</html>