<?php

session_start();

include "../private/mysql.php";
include "includes/include.inc.php";
contain("class", "player");

$allowed_pages = array(
    "login",
    "registry",
    "create_village"
);

$page_name = $_GET['page'];

if (!isset($page_name) || !in_array($_GET['page'], $allowed_pages)) {
    $page_name = "login";
}


contain("tpl", "header");
contain("inc", $page_name);
contain("tpl", "footer");

