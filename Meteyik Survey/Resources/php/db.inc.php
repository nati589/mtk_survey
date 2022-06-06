<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "surveydb";

$conn = new mysqli($servername, $username, $password, $database);

if($conn -> connect_error) {
    die("connection failed: " .$conn->connect_error);
}

function isUsed($field, $value, $table)
{
    global $conn;
    $sql = "SELECT $field FROM $table WHERE $field = '" . $value . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return true;
    }
    return false;
}

function displaytable($table) {
    global $conn;
    $query = "SELECT * FROM $table";
    $result = $conn->query($query);
    return $result;
}

function deletetable($table, $email) {
    global $conn;
    $query = "DELETE FROM $table WHERE email= '$email'";
    $result = $conn->query($query);
    return $result;
}
