
<?php

require_once 'conexao.php';

// Verifica se o formulário foi enviado pelo método POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit();
}

// Recebe os dados do formulário
$nome = trim($_POST['nome'] ?? '');
$email = trim($_POST['email'] ?? '');
$mensagem = trim($_POST['mensagem'] ?? '');

// Verifica se os campos estão preenchidos
if ($nome === '' || $email === '' || mb_strlen($mensagem) < 10) {
    header('Location: index.php?erro=1');
    exit();
}

// Verifica se o e-mail é válido
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: index.php?erro=email');
    exit();
}

// Prepara o comando SQL
$sql = "INSERT INTO feedbacks (nome, email, mensagem)
        VALUES (?, ?, ?)";

$stmt = $conn->prepare($sql);

// Verifica se a preparação foi realizada
if (!$stmt) {
    die("Erro ao preparar consulta: " . $conn->error);
}

// Vincula os valores aos parâmetros
$stmt->bind_param("sss", $nome, $email, $mensagem);

// Executa o comando
if ($stmt->execute()) {

    $stmt->close();
    $conn->close();

    header('Location: index.php?sucesso=1');
    exit();

} else {
    die("Erro ao cadastrar feedback: " . $stmt->error);
}

?>
