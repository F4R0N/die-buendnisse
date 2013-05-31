<?php

class map {

    public $position;
    public $size;

    function __construct($x, $y, $size) {
        $this->position["x"] = $x;
        $this->position["y"] = $y;

        if (is_numeric($size)) {
            $this->size = $size;
        } else {
            $this->size = 3;
        }
    }
    
    function getMapFields() {
        $mysql_connection = new mysql_connection();
        $mysql_connection->connect_MYSQL();

        $result = mysql_query("
            SELECT 
                * 
            FROM 
                map
            WHERE
                x <= " . ($this->position["x"] + $this->size) . " and 
                x >= " . ($this->position["x"] - $this->size) . " and
                y <= " . ($this->position["y"] + $this->size) . " and
                y >= " . ($this->position["y"] - $this->size)
        );


        while ($row = mysql_fetch_assoc($result)) {
            $map["fields"][$row['x']][$row['y']]['image'] = "/images/map/" . $row["epoch"] . $row["level"] . ".png";
            $map["fields"][$row['x']][$row['y']]['ID'] = $row['ID'];
            $map["fields"][$row['x']][$row['y']]['UserID'] = $row['UserID'];
        }

        $mysql_connection->close_MYSQL();
        return $map;
    }
    
    function getRow(){
        $mysql_connection = new mysql_connection();
        $mysql_connection->connect_MYSQL();

        $result = mysql_query("
            SELECT 
                * 
            FROM 
                map
            WHERE
                x <= " . ($this->size) . " and 
                x >= " . ($this->position["x"]) . " and
                y = " . ($this->position["y"])
        );


        while ($row = mysql_fetch_assoc($result)) {
            $map["fields"][$row['x']][$row['y']]['image'] = "/images/map/" . $row["epoch"] . $row["level"] . ".png";
            $map["fields"][$row['x']][$row['y']]['ID'] = $row['ID'];
            $map["fields"][$row['x']][$row['y']]['UserID'] = $row['UserID'];
        }

        $mysql_connection->close_MYSQL();
        return $map;
    }
    
    function getColumn(){
        $mysql_connection = new mysql_connection();
        $mysql_connection->connect_MYSQL();

        $result = mysql_query("
            SELECT 
                * 
            FROM 
                map
            WHERE
                y <= " . ($this->size) . " and 
                y >= " . ($this->position["y"]) . " and
                x = " . ($this->position["x"])
        );


        while ($row = mysql_fetch_assoc($result)) {
            $map["fields"][$row['x']][$row['y']]['image'] = "/images/map/" . $row["epoch"] . $row["level"] . ".png";
            $map["fields"][$row['x']][$row['y']]['ID'] = $row['ID'];
            $map["fields"][$row['x']][$row['y']]['UserID'] = $row['UserID'];
        }

        $mysql_connection->close_MYSQL();
        return $map;
    }

}

?>
