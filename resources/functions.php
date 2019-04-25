<?php

if($connection) {
    echo "is connected";
}

function redirect($location) {
    header("Location: $location ");
}

global $connection;

function query($sql) {
    return mysqli_query($connection, $sql);
}

function confirm($result) {
    global $connection;

    if(!$result) {
        die("QUERY FAILED " . mysqli_error($connection));
    }
}

function escape_string($string) {
    global $connection;

    return mysql_real_escape_string($connection, $string);
}

function fetch_array($result) {
    return mysqli_fetch_array($result)
}

?>