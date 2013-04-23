<?php
session_start();

if( !isset($_SESSION['ID'])){
    header('LOCATION: index.php');
}

include 'includes/login.php';
include 'includes/template.php';


//$logout = new login();
//$logout->logout();

$allowed_templates = array(
    'overview',
    'messages'
);

$template_name = $_GET['page'];

if(!isset($template_name) || !in_array($_GET['page'],$allowed_templates)){
    $template_name = "overview";
}

include_template("header");
include_template($template_name);
include_template("footer");

?>
