<?php

function include_template($tpl_name, $data = array()) {

    $path = 'templates/' . $tpl_name . '.tpl.php';

    if (file_exists($path)) {
        include $path;
        return true;
    } else {

        $data['msg'] = 'Template "' . htmlentities($tpl_name) . '" does not exist!';
        include "templates/error.tpl.php";

        return false;
    }
}

function include_includes($inc_name, $data = array()) {

    $path = 'includes/' . $inc_name . '.inc.php';

    if (file_exists($path)) {
        include $path;
        return true;
    } else {
        $data['msg'] = 'Page "' . htmlentities($inc_name) . '" does not exist!';
        include "templates/error.tpl.php";

        return false;
    }
}

?>
