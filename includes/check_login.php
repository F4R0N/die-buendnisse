<?php

session_start();


$mysql_connection = new mysql_connection();
$mysql_connection->connect_MYSQL();

mysql_query('
    UPDATE
        users
    SET
        session_ID = NULL
    WHERE
        last_action < "' . (time() - 60 * 20) . '"
');

if (isset($_SESSION['ID'])) {
    
    mysql_query('
        UPDATE
            users
        SET
            last_action = "' . time() . '"
        WHERE
            ID = "' . $_SESSION['ID'] . '"
    ');
    
    $result = mysql_query('
        SELECT
            session_ID
        FROM
            users
        WHERE
            ID = "' . $_SESSION['ID'] . '"
    ');
    
    $row = mysql_fetch_assoc($result);
    
    if (!$row['session_ID']) {
        unset($_SESSION);
        session_destroy();
    }
}

$mysql_connection->close_MYSQL();