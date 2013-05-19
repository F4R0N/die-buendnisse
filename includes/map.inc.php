<?php


if(is_numeric($_GET["x"]) && is_numeric($_GET["y"])){

$data["pos"]["x"] = $_GET["x"];
$data["pos"]["y"] = $_GET["y"];

} else {
    $data["pos"]["x"] = 0;
    $data["pos"]["y"] = 0;
}

contain("tpl" ,"map", $data);

?>
