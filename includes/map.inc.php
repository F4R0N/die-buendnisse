<?php

$player = new player($_SESSION['ID']);

$data['player'] = $player;


if (is_numeric($_GET["x"]) && is_numeric($_GET["y"])) {

    $data["pos"]["x"] = $_GET["x"];
    $data["pos"]["y"] = $_GET["y"];
} else {
    $data["pos"]["x"] = 0;
    $data["pos"]["y"] = 0;
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
    $data["map"]["fields"][$row['x']][$row['x']]['image'] = $row['img'];
    $data["map"]["fields"][$row['x']][$row['x']]['ID'] = $row['ID'];
    $data["map"]["fields"][$row['x']][$row['x']]['UserID'] = $row['UserID'];
}

$mysql_connection->close_MYSQL();


contain("tpl", "map", $data);
?>
