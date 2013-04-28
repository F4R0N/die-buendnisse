<?php

    $username = $_POST['benutzername'];
    $passwort = $_POST['passwort'];
    $passwort_wdh = $_POST['passwort_wdh']; 
    $email = $_POST['email'];
    $check_agbs = $_POST['agbs'];
    
    $errors = array();
    if($_POST['registrieren']){
        if($username == "" || $passwort == "" || $passwort_wdh == "" || $email == "")
            $errors[] = "Felder nicht alle ausgef&uuml;t";
        if(strlen($username) > 32)
            $errors[] = "Username ist l&auml;nger als 32";
        if($passwort != $passwort_wdh)
            $errors[] = "Passw&ouml;rter stimmen nicht &uml;berein";
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            $errors[] = "Ung&uuml;ltige E-Mail-Adresse";
        if($check_agbs != "true")
            $errors[] = "Bitte AGBs akzeptieren";
        
        if(!count($errors)){
           $mysql_connection = new mysql_connection();
           $mysql_connection ->connect_MYSQL();
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
                                )") or die(mysql_error());
           $mysql_connection->close_MYSQL();
           echo "Erfolgreich";
        }else{
            echo "Fehler";
        }
    }
?>
