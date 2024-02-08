<?php

require_once('init.inc.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_POST['_token']) || $_POST['_token'] !== $_SESSION['_token']) {
        die('Token invalide');
    }
    

    if (isset($_POST['connect'])) {
        connect_user($_POST['username'], $_POST['password']);
    } elseif (isset($_POST['create'])) {
        add_user($_POST['username'], $_POST['password'], $_POST['password_conf']);
    }
}

$_SESSION['_token'] = bin2hex(random_bytes(32));