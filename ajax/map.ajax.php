<?php

contain("class", "map");

if ($_GET["getRow"] == true) {
    $map = new map($_GET["x"], $_GET["y"], $_GET["x_max"]);
    $row = $map->getRow();

    echo json_encode($row["fields"]);
}
elseif ($_GET["getColumn"] == true) {
    $map = new map($_GET["x"], $_GET["y"], $_GET["y_max"]);
    $column = $map->getColumn();

    echo json_encode($column["fields"]);
}
?>
