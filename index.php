<?php

session_start();

include "../private/mysql.php";
include "includes/include.inc.php";

$allowed_pages = array(
    'login',
    'registry'
);

$page_name = $_GET['page'];

if (!isset($page_name) || !in_array($_GET['page'], $allowed_pages)) {
    $page_name = "login";
}
if ($page_name == "login") {
    include("includes/login.inc.php");
    if ($data['login'])
        header('LOCATION: /game.php');
}if ($page_name == "registry") {
    include("includes/registry.inc.php");
}

contain("tpl", "header");
contain("tpl", $page_name, $data);
contain("tpl", "footer");

