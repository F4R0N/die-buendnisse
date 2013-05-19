<?php

$allowed_modi = array(
    'overview',
    'compose',
    'read',
);

$mode = $_GET["mode"];

contain("tpl", "messages");
?>
