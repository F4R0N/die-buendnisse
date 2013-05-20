<?php

class player {

    public $username;
    public $ID;
    public $email;
    public $last_action;
    public $last_login;
    public $village_count;

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
            WHERE ID = "' . $ID . '"            
        ');

        $row = mysql_fetch_assoc($result);

        $this->username = $row['username'];
        $this->ID = $row['ID'];
        $this->email = $row['email'];
        $this->last_action = $row['last_action'];
        $this->last_login = $row['last_login'];

        $result = mysql_query('
            SELECT 
                ID
            FROM
                map
            WHERE UserID = "' . $this->ID . '"         
        ');
        $this->village_count = mysql_num_rows($result);
        $mysql_connection->close_MYSQL();
        
    }
}

?>
