<?php
require_once "conexao.php";

$resultado = $conn->query(
    "SELECT * FROM feedbacks ORDER BY id DESC"
);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Sistema de Feedback</title>

<style>
body{
    font-family: Arial, sans-serif;
    width: 800px;
    margin: 30px auto;
}

form{
    margin-bottom: 30px;
}

input, textarea{
    width:100%;
    padding:10px;
    margin-top:5px;
    margin-bottom:15px;
}

button{
    padding:10px 20px;
    cursor:pointer;
}

.erro{
    color:red;
    font-size:14px;
}

.campo-erro{
    border:2px solid red;
}
</style>
</head>
<body>

<h1>Sistema de Feedback</h1>

<?php if(isset($_GET['sucesso'])): ?>
<p style="color:green">
    Feedback enviado com sucesso!
</p>
<?php endif; ?>

<form id="feedbackForm" action="processa.php" method="POST">

    <label>Nome:</label>
    <input type="text" name="nome" required>

    <label>Mensagem:</label>
    <textarea
        id="mensagem"
        name="mensagem"
        rows="5"
        required></textarea>

    <span id="erroMensagem" class="erro"></span>

    <br>

    <button type="submit" id="btnEnviar">
        Enviar
    </button>

</form>

<h2>Feedbacks Recebidos</h2>

<?php while($registro = $resultado->fetch_assoc()): ?>

<div style="border:1px solid #ccc;padding:10px;margin-bottom:10px">

    <strong>
        <?= htmlspecialchars($registro['nome']) ?>
    </strong>

    <p>
        <?= htmlspecialchars($registro['mensagem']) ?>
    </p>

    <small>
        <?= $registro['data_envio'] ?>
    </small>

</div>

<?php endwhile; ?>


<script>

const form = document.getElementById('feedbackForm');
const mensagem = document.getElementById('mensagem');
const erro = document.getElementById('erroMensagem');
const botao = document.getElementById('btnEnviar');

form.addEventListener('submit', function(e){

    erro.textContent = "";
    mensagem.classList.remove("campo-erro");

    if(mensagem.value.trim().length < 10){

        e.preventDefault();

        mensagem.classList.add("campo-erro");

        erro.textContent =
        "A mensagem deve possuir pelo menos 10 caracteres.";

        return;
    }

    botao.textContent = "Enviando...";
    botao.disabled = true;

});

</script>

</body>
</html>