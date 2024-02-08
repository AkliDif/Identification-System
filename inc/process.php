<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['connect'])) {
        echo "Connect button clicked";
    } elseif (isset($_POST['reset'])) {
        echo "Reset button clicked";
    } elseif (isset($_POST['newAccount'])) {
        echo "New Account button clicked";
    }
}