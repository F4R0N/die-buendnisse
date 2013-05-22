<?php

$player = new player($_SESSION['ID']);

if (isset($_POST["found"]) && $player->village_count == 0) {
    $mysql_connection = new mysql_connection;
    $mysql_connection->connect_MYSQL();

    $result = mysql_query("SELECT x,y FROM map ORDER BY ID ASC LIMIT 0, 1");
    $row = mysql_fetch_assoc($result);
    $pos["x"] = $row["x"] + rand(-5, 5);
    $pos["y"] = $row["y"] + rand(-5, 5);
    while (!$find_pos) {
        $result = mysql_query("SELECT x,y FROM map WHERE x='" . $pos["x"] . "' and y  ='" . $pos["y"] . "' ORDER BY ID ASC LIMIT 0, 1") or die(mysql_error());
        if (mysql_num_rows($result) == 1) {
            $pos["x"] = $row["x"] + rand(-2, 2);
            $pos["y"] = $row["y"] + rand(-2, 2);
        } else {
            $find_pos = true;
        }
    }

    mysql_query("
        INSERT INTO
            map 
        SET 
            x = '" . $pos["x"] . "',
            y = '" . $pos["y"] . "',
            UserID = '" . $player->ID . "',
            epoch = 'stone',
            level = '0'
    ");

    $mysql_connection->close_MYSQL();
    echo "Success!";
    header("LOCATION: game.php");
}

contain("tpl", "create_village");
?>
