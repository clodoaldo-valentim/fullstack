<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "fullstack";

$conn = new mysqli(
    $host,
    $username,
    $password,
    $database
);

if($conn->connect_error) {
    die("erro na conexão: " . $conn->connect_error);
}

?>