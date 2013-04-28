<?php

    $username = $_POST['benutzername'];
    $passwort = $_POST['passwort'];
    $passwort_wdh = $_POST['passwort_wdh']; 
    $email = $_POST['email'];
    $check_agbs = $_POST['agbs'];
    
    if($_POST['registrieren']){
        $mysql_connection = new mysql_connection();
        $mysql_connection ->connect_MYSQL();
        $errors = array();
        $result = mysql_query("SELECT ID FROM users WHERE username = '". $username ."'") or die(mysql_error());
        if(mysql_num_rows($result) != 0)
            $errors['benutzername_vorhanden'] = true;
         $result = mysql_query("SELECT ID FROM users WHERE email = '". $email ."'");
        if(mysql_num_rows($result) != 0)
            $errors['email_vorhanden'] = true;
        if($username == "" || $passwort == "" || $passwort_wdh == "" || $email == "")
            $errors['felder_leer'] = true;
        if(strlen($username) > 32)
            $errors['benutzername_laenge'] = "Username ist l&auml;nger als 32";
        if(strlen($passwort) < 6)
            $errors['passwort_laenge'] = true;
        if($passwort != $passwort_wdh)
            $errors['passwort_wdh'] = true;
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            $errors['email_falsch'] = true;
        if($check_agbs != "true")
            $errors['agbs'] = true;
        
        if(!count($errors)){
           $passwort = crypt($passwort, '$6$BR0WS3RG4M3');
           $passwort = explode('$', $passwort);
           $passwort = $passwort[3];
           mysql_query("INSERT INTO 
                            users(
                                username,
                                password,
                                email,
                                IP
                                )
                            VALUES(
                                '". mysql_real_escape_string($username) ."',
                                '". mysql_real_escape_string($passwort) ."',
                                '". mysql_real_escape_string($email) ."',
                                '". $_SERVER['REMOTE_ADDR'] ."'
                                )");
           $data['success'] = true;
        }else{
            $data["errors"] = $errors;       
            $data['form_data']['benutzername'] = $username;
            $data['form_data']['email'] = $email;
        }
        $mysql_connection->close_MYSQL();
    }
?>
