<?php

include_once "../../private/mysql.php";

if ($_POST["editTopic"]) {

    if ($_POST["topic"] == "") {

        echo "<script>alert('Topic can not be nothing!')</script>";
    } else {

        $mysql_connection = new mysql_connection();
        $mysql_connection->connect_MYSQL();

        $sql = "
            UPDATE
                wiki_topic
            SET
                Topic = '" . mysql_real_escape_string($_POST["topic"]) . "'
            WHERE
                ID = '" . mysql_real_escape_string($_POST["topicID"]) . "'
        ";


        mysql_query($sql);

        for ($i = 0; $i < count($_POST["oldElements"]); $i++) {
            if ($_POST["oldElements"][$i] !== "") {
                mysql_query("UPDATE wiki_topic_element SET Element = '" . mysql_real_escape_string($_POST["oldElements"][$i]) . "' WHERE ID = '" . $_POST["oldElementsID"][$i] . "'");
            }
        }
        if (count($_POST["elements"]) != 0) {

            foreach ($_POST["elements"] as $element) {
                if ($element !== "") {
                    mysql_query("INSERT INTO wiki_topic_element SET Element = '" . mysql_real_escape_string($element) . "', TopicID = '" . mysql_real_escape_string($_POST["topicID"]) . "'");
                }
            }
        }

        $mysql_connection->close_MYSQL();
    }
}
?>
