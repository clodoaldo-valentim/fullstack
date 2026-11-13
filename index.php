<?php
require_once 'conexao.php';
$sql = "SELECT id, nome, email, mensagem, criado_em
FROM feedbacks
ORDER BY id DESC";
$resultado = $conn->query($sql);
$feedbacks = $resultado->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Formulário Feedback</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 640px;
            margin: 0 auto;
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0, .08);
        }

        h1 {
            margin-top: 0;
            color: #222;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }

        textarea {
            min-height: 110px;
            resize: vertical;
        }

        .erro {
            color: #c0392b;
            font-size: 14px;
            margin: -10px 0 15px;
            display: none;
        }

        .campo-invalido {
            border-color: #c0392b !important;
            background-color: #fff5f5;
        }

        /* Mensagens de retorno do PHP */
        .alerta {
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .alerta-sucesso {
            color: #155724;
            background: #d4edda;
            border: 1px solid #c3e6cb;
        }

        .alerta-erro {
            color: #721c24;
            background: #f8d7da;
            border: 1px solid #f5c6cb;
        }

        button {
            background: #0d6efd;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        button:disabled {
            background: #6c757d;
            cursor: not-allowed;
        }

        .feedback {
            border-left: 4px solid #0d6efd;
            background: #f8f9fa;
            padding: 12px;
            margin-bottom: 12px;
            border-radius: 4px;
        }

        .feedback p {
            margin: 4px 0;
        }

        .data {
            color: #666;
            font-size: 13px;
        }
    </style>

</head>

<body>

    <div class="container">

        <h1>Deixe seu feedback</h1>

        <!-- Mensagens de sucesso e erro -->
        <?php if (isset($_GET['sucesso'])): ?>

            <div class="alerta alerta-sucesso">
                Feedback enviado com sucesso!
            </div>

        <?php elseif (isset($_GET['erro']) && $_GET['erro'] == '1'): ?>

            <div class="alerta alerta-erro">
                Preencha todos os campos e informe uma mensagem com pelo menos 10 caracteres.
            </div>

        <?php elseif (isset($_GET['erro']) && $_GET['erro'] == 'email'): ?>

            <div class="alerta alerta-erro">
                Informe um endereço de e-mail válido.
            </div>

        <?php endif; ?>

        <!-- Formulário -->
        <form id="form-feedback" action="processa.php" method="POST">

            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" required>

            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" required>

            <label for="mensagem">Mensagem</label>
            <textarea id="mensagem" name="mensagem" required></textarea>

            <p id="erro-mensagem" class="erro">
                A mensagem deve ter pelo menos 10 caracteres.
            </p>

            <button type="submit" id="botao-enviar">
                Enviar feedback
            </button>

        </form>

        <h2>Feedbacks recebidos</h2>

        <?php if (count($feedbacks) === 0): ?>

            <p>Nenhum feedback cadastrado ainda.</p>

        <?php endif; ?>

        <?php foreach ($feedbacks as $feedback): ?>

            <div class="feedback">

                <strong>
                    <?= htmlspecialchars($feedback['nome']) ?>
                </strong>

                <p>
                    <?= nl2br(htmlspecialchars($feedback['mensagem'])) ?>
                </p>

                <span class="data">
                    <?= date('d/m/Y H:i', strtotime($feedback['criado_em'])) ?>
                </span>

            </div>

        <?php endforeach; ?>

    </div>

    <script>

        const form = document.getElementById('form-feedback');
        const mensagem = document.getElementById('mensagem');
        const erroMensagem = document.getElementById('erro-mensagem');
        const botaoEnviar = document.getElementById('botao-enviar');

        form.addEventListener('submit', function (event) {

            const texto = mensagem.value.trim();

            if (texto.length < 10) {

                event.preventDefault();

                mensagem.classList.add('campo-invalido');
                erroMensagem.style.display = 'block';
                mensagem.focus();

                return;
            }

            mensagem.classList.remove('campo-invalido');
            erroMensagem.style.display = 'none';

            botaoEnviar.disabled = true;
            botaoEnviar.textContent = 'Enviando...';

        });

        mensagem.addEventListener('input', function () {

            if (mensagem.value.trim().length >= 10) {

                mensagem.classList.remove('campo-invalido');
                erroMensagem.style.display = 'none';

            }

        });

    </script>

</body>
</html>
