<?php

require_once('init.inc.php');

function add_user($username, $password, $password_conf) {

    if (empty($username) || empty($password) || empty($password_conf))
    {
        $_SESSION['input_data_error'] = 'Please fill in all the fields.';
        // header('Location: ../registration.php');
        return;
    }

    if (valide_password($password) !== 0)
    {
        return;
    }
    

    if (empty($username) || empty($password) || empty($password_conf))
    {
        $_SESSION['input_data_error'] = 'The username and the passwords are required.';
        // header('Location: ../registration.php');
        return;
    }
    global $pdo;

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = 'INSERT INTO users
                 (username, password)
              VALUES
                 (:username, :password)';
    $statement = $pdo->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $hashed_password);

    if (get_user($username))
    {

        $_SESSION['username_error'] = 'The username is already used.';
        echo "The username is already used.";
        echo $username;
        // header('Location: ../registration.php');
        return 1; // user already exists
    }

    if ($password !== $password_conf )
    {   
        $_SESSION['password_error'] = 'The passwords do not match.';
        // adding a delay to see the error message
        // header('Location: ../registration.php');
        return 2; // password and password_conf are different
    }

    $statement->execute();
    $statement->closeCursor();

    header('Location: ../index.php');

    return 0; // user added
}


function connect_user($username, $password)
{   
    if (empty($username) || empty($password))
    {
        $_SESSION['input_data_error'] = 'The username and the password are required.';
        return;
    }

    global $pdo;
    $query = 'SELECT * FROM users WHERE username = :username';
    $statement = $pdo->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    if ($user && password_verify($password, $user['password']))
    {
        $_SESSION['username'] = $username;
        header('Location: ../connected.php');
    }
    else
    {
        $_SESSION['password_error'] = ' The user doesn\'t exists or the passwords do not match.';
        sleep(3);
    }
}

function get_user($username)
{
    global $pdo;
    $query = 'SELECT * FROM users WHERE username = :username';
    $statement = $pdo->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user;
}

function valide_password($password)
{
    if (strlen($password) < 12)
    {
        $_SESSION['password_error'] = 'The password must be at least 12 characters long.';
        // header('Location: ../registration.php');
        return 1;
    }
    if (!preg_match('/[A-Z]/', $password))
    {
        $_SESSION['password_error'] = 'The password must contain at least one uppercase letter.';
        // header('Location: ../registration.php');
        return 2;
    }
    if (!preg_match('/[a-z]/', $password))
    {
        $_SESSION['password_error'] = 'The password must contain at least one lowercase letter.';
        // header('Location: ../registration.php');
        return 3;
    }
    if (!preg_match('/[0-9]/', $password))
    {
        $_SESSION['password_error'] = 'The password must contain at least one number.';
        // header('Location: ../registration.php');
        return 4;
    }
    if (!preg_match('/[^a-zA-Z0-9]/', $password))
    {
        $_SESSION['password_error'] = 'The password must contain at least one special character(!@#$%^&*).';
        // header('Location: ../registration.php');
        return 5;
    }
    return 0;
}

function user_connected()
{
    if (isset($_SESSION['username']))
    {
        echo ($_SESSION['username']);
        return true;
    }
    return false;
}