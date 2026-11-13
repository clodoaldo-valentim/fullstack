<?php

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'projeto-feedback';

// Cria a conexão com o banco de dados
$conn = new mysqli($host, $username, $password, $dbname);

// Verifica se ocorreu algum erro na conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Define o padrão de caracteres
$conn->set_charset("utf8mb4");

?>
