<?php

class village {

    public $ID;
    public $UserID;
    public $position;
    public $epoch;
    public $level;

    public function __construct($ID) {
        $mysql_connection = new mysql_connection();
        $mysql_connection->connect_MYSQL();
        $result = mysql_query("
            SELECT 
                ID,
                UserID,
                x,
                y,
                epoch,
                level
            FROM
                map
            WHERE ID = '" . $ID . "'        
        ") or die(mysql_error());

        $row = mysql_fetch_assoc($result);

        $this->ID = $ID;
        $this->UserID = $row["UserID"];
        $this->position["x"] = $row["x"];
        $this->position["y"] = $row["y"];
        $this->epoch = $row["epoch"];
        $this->level = $row["level"];
        
        $mysql_connection->close_MYSQL();
    }

    public function updateLevel() {
        mysql_query("
            UPDATE
                map
            SET
                level += 1;
            WHERE
                ID = '" . $this->ID . "'
        ");
    }

}

?>
