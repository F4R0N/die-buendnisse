<?php
include_once "../../private/mysql.php";

if( $_POST["addTopic"]){
    $mysql_connection = new mysql_connection();
    $mysql_connection->connect_MYSQL();
    
    $sql = "
            INSERT INTO
                wiki_topic
            SET
                Topic = '" . mysql_real_escape_string($_POST["topic"]) . "'
    ";
    
    mysql_query($sql);
   
    
    $id = mysql_insert_id();
    
    foreach ($_POST["elements"] as $element ){
        mysql_query("INSERT INTO wiki_topic_element SET Element = '" . mysql_real_escape_string($element) . "', TopicID = $id");
    }
    
    
    $mysql_connection->close_MYSQL();
}

?>
