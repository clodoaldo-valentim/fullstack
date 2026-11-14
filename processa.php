<?php

require_once "connect.php";

$nome = htmlspecialchars(trim($_POST["nome"]));
$email = htmlspecialchars(trim($_POST["email"]));
$tempo = htmlspecialchars(trim($_POST["tempo"]));
$frequencia = htmlspecialchars(trim($_POST["frequencia"]));
$satisfacao = htmlspecialchars(trim($_POST["satisfacao"]));
$atendimento = htmlspecialchars(trim($_POST["atendimento"]));
$indicacao = htmlspecialchars(trim($_POST["indicacao"]));
$melhoria = htmlspecialchars(trim($_POST["melhoria"]));
$produto = htmlspecialchars(trim($_POST["produto"]));
$sugestao = htmlspecialchars(trim($_POST["sugestao"]));


$sql = $conn->prepare(
    "INSERT INTO form (nome, email, tempo, frequencia, satisfacao, atendimento, indicacao, melhoria, produto, sugestao) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"

);

$sql->bind_param("ssssssssss", $nome, $email, $tempo, $frequencia, $satisfacao, $atendimento, $indicacao, $melhoria, $produto, $sugestao);

$sql->execute();

$sql->close();
$conn->close();

header("location: logs.php?sucesso=1");
exit();

?>