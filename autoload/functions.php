<?php

function database($text, $col = '', $t = '')
{
    // db.exesfull.com

    $conn = new mysqli(
        config('database.connections.mysql.host'),
        config('database.connections.mysql.username'),
        config('database.connections.mysql.password'),
        config('database.connections.mysql.database'),
    );

    if ($conn->connect_error) {
        die(" Connection failed: " . $conn->connect_error);
    }

    // $conn->set_charset("utf8mb4_general_ci");

    if (($t == '') && ($col == '')) {
        $conn->query($text);
    } else {
        $result = $conn->query($text);
        if ($result->num_rows > 0) {
            if ($t == '') {
                while ($row = $result->fetch_assoc()) {
                    return ($row[$col]);
                }
            } else {
                return $result;
            }
        } else {
            return '';
        }
    }
    $conn->close();
}