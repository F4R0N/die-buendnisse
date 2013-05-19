<?php

$time_start = microtime(true);

session_start();

include "../private/mysql.php";
include "classes/player.class.php";
include "includes/check_login.inc.php";
include "includes/include.inc.php";
include "classes/login.class.php";

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
    'map',
    'settings'
);

$page_name = $_GET['page'];

if (!isset($page_name) || !in_array($_GET['page'], $allowed_pages)) {
    $page_name = "overview";
}

include_template("header");
include_template("menu_top");
include_template("menu_left");
include_includes($page_name);

$time_end = microtime(true);
$data['time'] = round(($time_end - $time_start) * 1000);

include_template("footer", $data);
?>
