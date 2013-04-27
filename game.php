<?php

session_start();

include "../private/mysql.php";
include "includes/check_login.php";
include "includes/include.php";
include "includes/login.php";

if (!isset($_SESSION['ID'])) {
    header('LOCATION: index.php');
}

if ($_GET['logout']) {
    $logout = new login();
    $logout->logout();
    header('LOCATION: index.php');
}

$allowed_pages = array(
    'overview',
    'messages',
    'map'
);

$page_name = $_GET['page'];

if (!isset($page_name) || !in_array($_GET['page'], $allowed_pages) || $page_name = "overview") {
    $page_name = "overview";
}

include_template("header");
include_template("menu_top");
include_template("menu_left");
include_includes($page_name);
include_template("footer");
?>
