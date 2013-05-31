<?php

contain("class", "map");

if (is_numeric($_GET["x"]) && is_numeric($_GET["y"])) {
    $x = $_GET["x"];
    $y = $_GET["y"];
} else {
    $village = new village($data["player"]->current_village);

    $x = $village->position["x"];
    $y = $village->position["y"];
}

$map = new map($x, $y, $_GET["size"]);

$data["map"] = $map->getMapFields();
$data["map"]["size"] = $map->size;

$data["pos"]["x"] = $map->position["x"];
$data["pos"]["y"] = $map->position["y"];

contain("tpl", "map", $data);
?>
