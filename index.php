
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.9/dist/css/bootstrap.min.css">

    <title>Sistema de Feedback</title>
</head>

<body class="bg-light">

    <?php
        require 'conexao.php';
    ?>

    <div class="container mt-5">

        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="card shadow">

                    <div class="card-header bg-primary text-white">
                        <h3 class="text-center mb-0">
                            Sistema de Feedback
                        </h3>
                    </div>

                    <div class="card-body">

                        <form method="post">

                            <div class="mb-3">
                                <label class="form-label">Nome</label>
                                <input type="text" name="nome" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">E-mail</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Categoria</label>
                                <select name="categoria" class="form-select" required>
                                    <option value="">Selecione uma categoria</option>
                                    <option value="Elogio">Elogio</option>
                                    <option value="Reclamação">Reclamação</option>
                                    <option value="Sugestão">Sugestão</option>
                                    <option value="Dúvida">Dúvida</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Avaliação</label>
                                <select name="avaliacao" class="form-select" required>
                                    <option value="">Selecione uma nota</option>
                                    <option value="1">1 - Muito ruim</option>
                                    <option value="2">2 - Ruim</option>
                                    <option value="3">3 - Regular</option>
                                    <option value="4">4 - Bom</option>
                                    <option value="5">5 - Excelente</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Feedback</label>
                                <textarea name="mensagem" class="form-control" rows="4" required></textarea>
                            </div>

                            <button type="submit" name="enviar" class="btn btn-primary w-100">
                                Enviar Feedback
                            </button>

                        </form>

                        <?php

                        if (isset($_POST['enviar'])) {

                            $nome = trim($_POST["nome"]);
                            $email = trim($_POST["email"]);
                            $categoria = trim($_POST["categoria"]);
                            $avaliacao = trim($_POST["avaliacao"]);
                            $mensagem = trim($_POST["mensagem"]);

                            $sql = "INSERT INTO feedbacks (nome, email, categoria, avaliacao, mensagem) VALUES (?, ?, ?, ?, ?)";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("sssis",$nome, $email, $categoria, $avaliacao, $mensagem);

                            if ($stmt->execute()) {
                                echo "<div class='alert alert-success mt-3'> Feedback enviado com sucesso!</div>";
                            } else {
                                echo "<div class='alert alert-danger mt-3'> Erro ao enviar feedback!</div>";
                            }

                            $stmt->close();
                        }

                        ?>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.9/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
