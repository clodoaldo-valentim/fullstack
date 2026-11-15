<?php
require_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = trim($_POST["nome"]);
    $mensagem = trim($_POST["mensagem"]);

    $sql = "INSERT INTO feedbacks (nome, mensagem)
            VALUES (?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nome, $mensagem);

    if ($stmt->execute()) {
        header("Location: index.php?sucesso=1");
        exit();
    } else {
        echo "Erro ao salvar feedback.";
    }

    $stmt->close();
    $conn->close();
}
?>