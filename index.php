<?php

session_start();

include "../private/mysql.php";
include "includes/include.php";

$allowed_pages = array(
    'login',
    'registry'
);

$page_name = $_GET['page'];

if (!isset($page_name) || !in_array($_GET['page'], $allowed_pages)) {
    $page_name = "login";
}
if ($page_name == "login") {
    include "includes/login.php";
    if ($data['login'])
        header('LOCATION: /game.php');
}if ($page_name == "registry") {
    include "includes/registry.php";
}

include_template("header");
include_template($page_name, $data);
include_template("footer");

