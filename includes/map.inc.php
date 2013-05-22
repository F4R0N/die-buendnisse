<?php


if (is_numeric($_GET["x"]) && is_numeric($_GET["y"])) {
    $data["pos"]["x"] = $_GET["x"];
    $data["pos"]["y"] = $_GET["y"];
} else {
    $village = new village($data["player"]->current_village);
    
    $data["pos"]["x"] = $village->position["x"];
    $data["pos"]["y"] = $village->position["y"];
   
}
if (is_numeric($_GET["size"])) {
    $data["map"]["size"] = $_GET["size"];
} else {
    $data["map"]["size"] = 3;
}

$mysql_connection = new mysql_connection();
$mysql_connection->connect_MYSQL();

$result = mysql_query("
    SELECT 
        * 
    FROM 
        map
    WHERE
        x <= " . ($data["pos"]["x"] + $data["map"]["size"]) . " and 
        x >= " . ($data["pos"]["x"] - $data["map"]["size"]) . " and
        y <= " . ($data["pos"]["y"] + $data["map"]["size"]) . " and
        y >= " . ($data["pos"]["y"] - $data["map"]["size"]));


while ($row = mysql_fetch_assoc($result)) {
    $data["map"]["fields"][$row['x']][$row['y']]['image'] = "/images/map/" . $row["epoch"] . $row["level"] . ".png";
    $data["map"]["fields"][$row['x']][$row['y']]['ID'] = $row['ID'];
    $data["map"]["fields"][$row['x']][$row['y']]['UserID'] = $row['UserID'];
}

$mysql_connection->close_MYSQL();


contain("tpl", "map", $data);
?>
