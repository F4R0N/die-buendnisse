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
            $errors[] = "Benutzername bereits vorhanden";
         $result = mysql_query("SELECT ID FROM users WHERE email = '". $email ."'");
        if(mysql_num_rows($result) != 0)
            $errors[] = "E-Mail wird bereits verwendet";
        if($username == "" || $passwort == "" || $passwort_wdh == "" || $email == "")
            $errors[] = "Felder nicht alle ausgef&uuml;t";
        if(strlen($username) > 32)
            $errors[] = "Username ist l&auml;nger als 32";
        if($passwort != $passwort_wdh)
            $errors[] = "Passw&ouml;rter stimmen nicht &uml;berein";
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            $errors[] = "Ung&uuml;ltige E-Mail-Adresse";
        if($check_agbs != "true")
            $errors[] = "AGBs sind nicht akzeptiert";
        
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
           echo "Erfolgreich";
        }else{
            $data["errors"] = $errors;
        }
        $mysql_connection->close_MYSQL();
    }
?>
