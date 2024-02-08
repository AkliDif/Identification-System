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
            <div class="buttons">
                <input type="submit" name="connect" value="Connect">
                <input type="submit" name="reset" value="Reset">
                <input type="submit" name="newAccount" value="New Account">
            </div>
        </form>
    </div>
</body>
</html>