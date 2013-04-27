<?php

session_start();

include "../private/mysql.php";
include "includes/login.php";
include "includes/include.php";

if (isset($_POST['Benutzername']) && isset($_POST['Passwort']) && isset($_POST['Einloggen'])) {
    $login = new login();
    $login->set_data($_POST['Benutzername'], $_POST['Passwort']);
    if ($login->login())
        header('LOCATION: game.php');
    else
        $data['login_msg'] = 'Login fehlgeschlagen!';
}

include_template("header");
include_template("login", $data);
include_template("footer");

