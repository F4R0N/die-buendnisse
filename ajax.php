<?php
session_start();

include "../private/mysql.php";
include "includes/include.inc.php";

if (!isset($_SESSION['ID'])) {
    header('LOCATION: index.php');
    exit();
}

$allowed_pages = array(
    "map"
 );

$page_name = $_GET['page'];

if (isset($page_name) && in_array($_GET['page'], $allowed_pages)) {
    contain("ajax", $page_name);
}



?>
