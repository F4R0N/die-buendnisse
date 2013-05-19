<?php

class player {

    public $username;
    public $ID;
    public $email;
    public $last_action;
    public $last_login;

    public function __construct($ID) {
        $mysql_connection = new mysql_connection();
        $mysql_connection->connect_MYSQL();
        
        $result = mysql_query('
            SELECT 
                username,
                ID,
                email,
                last_action,
                last_login
            FROM
                users
            WHERE ID = "' . $_SESSION['ID'] . '"            
        ');
        
        $mysql_connection->close_MYSQL();

        $row = mysql_fetch_assoc($result);

        $this->username     = $row['username'];
        $this->ID           = $row['ID'];
        $this->email        = $row['email'];
        $this->last_action  = $row['last_action'];
        $this->last_login   = $row['last_login'];
    }

}

?>
