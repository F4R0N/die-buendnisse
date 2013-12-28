<?php

include_once "../../private/mysql.php";

if ($_GET["deleteTopic"]) {
        $mysql_connection = new mysql_connection();
        $mysql_connection->connect_MYSQL();

        $sql = "
                DELETE FROM
                    wiki_topic
                WHERE
                    ID = '" . mysql_real_escape_string($_GET["ID"]) . "'
        ";

        mysql_query($sql);
        
        
        $sql = "
                DELETE FROM
                    wiki_topic_element
                WHERE
                    TopicID = '" . mysql_real_escape_string($_GET["ID"]) . "'
        ";
        
   
        mysql_query($sql);
        
        $mysql_connection->close_MYSQL();
} elseif ($_GET["deleteTopicElement"]) { 
        $mysql_connection = new mysql_connection();
        $mysql_connection->connect_MYSQL();
        $sql = "
                DELETE FROM
                    wiki_topic_element
                WHERE
                    ID = '" . $_GET["ID"] . "'
        ";
        
        // @TODO ESCAPE STRING!!! //
        mysql_query($sql);
        $mysql_connection->close_MYSQL();
}

header("location: index.php");
?>
