<?php

contain("class", "login");

if (isset($_POST['Benutzername']) && isset($_POST['Passwort']) && isset($_POST['Einloggen'])) {
    $login = new login();
    $login->set_data($_POST['Benutzername'], $_POST['Passwort']);
    if ($login->login()){
        $data['login'] = True;
        header('LOCATION: /game.php');
    }
    else
        $data['login_msg'] = 'Login fehlgeschlagen!';
}

contain("tpl", "header");
contain("tpl", "login");