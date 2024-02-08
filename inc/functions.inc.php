<?php

function add_user($username, $password) {
    global $pdo;
    $query = 'INSERT INTO users
                 (username, password)
              VALUES
                 (:username, :password)';
    $statement = $pdo->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor();
}


function connexion()
{
    global $pdo;
    $query = 'SELECT * FROM users WHERE username = :username AND password = :password';
    $statement = $pdo->prepare($query);
    $statement->bindValue(':username', $_POST['username']);
    $statement->bindValue(':password', $_POST['password']);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user;
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




