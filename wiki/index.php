<?php

include_once "../../private/mysql.php";
include "add.php";
include "edit.php";


if (!is_null($_GET["topic"]) || !is_null($_GET["topicID"])) {
    // Connect to the database!
    $mysql_connection = new mysql_connection();
    $mysql_connection->connect_MYSQL();

    if (is_null($_GET["topicID"])) {

        // Fetch the TopicID of the searched topic
        $sql = "SELECT 
                    ID,
                    Topic
                From 
                    wiki_topic 
                Where 
                    Topic Like '%" . mysql_real_escape_string($_GET["topic"]) . "%'
               ";

        $result = mysql_query($sql);
        if (mysql_num_rows($result) == 0) {
            $html .= "This Topic is not avaible!";
            $failed = True;
        } elseif (mysql_num_rows($result) == 1) {
            $array = mysql_fetch_array($result);
            $topic = $array["Topic"];
            $topicID = $array["ID"];
        }
    } else {
        $sql = "SELECT 
                    Topic
                From 
                    wiki_topic 
                Where 
                    ID = '" . $_GET["topicID"] . "'
               ";

        $result = mysql_query($sql);

        $array = mysql_fetch_array($result);
        
        $topic = $array["Topic"];
        $topicID = $_GET["topicID"];
    }

    if (!$failed) {
        // Show results!
        if (!is_null($topicID)) {
            $elements = [];
            // Fetch all elements for the TopicID
            $sql = "SELECT 
                    Element,
                    ID
                From 
                    wiki_topic_element
                Where 
                    TopicID = " . mysql_real_escape_string($topicID) . "
               ";

            $result = mysql_query($sql);


            $html .= "<h3>" . $topic .  "</h3>";
            $html .= "<ul>";
            while ($obj = mysql_fetch_object($result)) {
                $html .= "<li>" . $obj->Element . "</li>";
                $elements[] = $obj;
            }
            $html .= "</ul>";
        } else {
            $html .= "<h3>Choose one!</h3>";
            $html .= "<ul>";
            while ($obj = mysql_fetch_object($result)) {
                $html .= '<li><a href="?topicID=' . $obj->ID . '">' . $obj->Topic . '</li>';
            }
            $html .= "</ul>";
        }
    }

    $mysql_connection->close_MYSQL();
}

include "templates/wiki.tpl.php";
?>

