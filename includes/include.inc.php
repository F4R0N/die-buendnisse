<?php

function contain($type, $name, $data = array()) {

    $types = array("inc" => "includes", "class" => "classes", "tpl" => "templates", "cfg" => "configs", "ajax" => "ajax");
        
    $path = $types[$type] . '/' . $name . '.' . $type . '.php';
    
    if (file_exists($path) && isset($types[$type])) {
        include $path;
        return true;
    } else {

        $data['msg'] = htmlentities($path) . ' does not exist!';
        include "templates/error.tpl.php";

        return false;
    }
}
?>
