<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php
        include 'header.php';
    ?>

    
    <h1>Feedback</h1>
    <br>
    
    
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <form action="#" method="POST" class="w-100">

            <div>
                <label for="nome" class="form-label w-50 mx-auto d-block">
                    1. Qual é o seu nome completo?
                </label>
                <input class="form-control w-50 mx-auto" type="text" id="nome" name="nome" placeholder="Digite seu nome completo">
            </div>
            <br>

            <div>
                <label for="email" class="form-label w-50 mx-auto d-block">
                    2. Qual é o seu e-mail para contato?
                </label>
                <input class="form-control w-50 mx-auto" type="email" id="email" name="email" placeholder="Digite seu e-mail">
            </div>
            <br>

            <div>
                <label for="tempo" class="form-label w-50 mx-auto d-block">
                    3. Há quanto tempo você é nosso cliente?
                </label>
                <select class="form-control w-50 mx-auto" id="tempo" name="tempo">
                    <option value="">Selecione uma opção</option>
                    <option>Menos de 6 meses</option>
                    <option>Entre 6 meses e 1 ano</option>
                    <option>Entre 1 e 3 anos</option>
                    <option>Mais de 3 anos</option>
                </select>
            </div>
            <br>

            <div>
                <label for="frequencia" class="form-label w-50 mx-auto d-block">
                    4. Com que frequência você utiliza nossos produtos ou serviços?
                </label>
                <select class="form-control w-50 mx-auto" id="frequencia" name="frequencia">
                    <option value="">Selecione uma opção</option>
                    <option>Todos os dias</option>
                    <option>Algumas vezes por semana</option>
                    <option>Uma vez por semana</option>
                    <option>Raramente</option>
                </select>
            </div>
            <br>

            <div>
                <label for="satisfacao" class="form-label w-50 mx-auto d-block">
                    5. Como você avalia a qualidade dos nossos produtos?
                </label>
                <select class="form-control w-50 mx-auto" id="satisfacao" name="satisfacao">
                    <option value="">Selecione uma opção</option>
                    <option>Excelente</option>
                    <option>Boa</option>
                    <option>Regular</option>
                    <option>Ruim</option>
                    <option>Péssima</option>
                </select>
            </div>
            <br>

            <div>
                <label for="atendimento" class="form-label w-50 mx-auto d-block">
                    6. Como você avalia nosso atendimento ao cliente?
                </label>
                <select class="form-control w-50 mx-auto" id="atendimento" name="atendimento">
                    <option value="">Selecione uma opção</option>
                    <option>Excelente</option>
                    <option>Bom</option>
                    <option>Regular</option>
                    <option>Ruim</option>
                </select>
            </div>
            <br>

            <div>
                <label for="indicacao" class="form-label w-50 mx-auto d-block">
                    7. Você recomendaria nossos serviços para outras pessoas?
                </label>
                <select class="form-control w-50 mx-auto" id="indicacao" name="indicacao">
                    <option value="">Selecione uma opção</option>
                    <option>Sim, com certeza</option>
                    <option>Talvez</option>
                    <option>Não</option>
                </select>
            </div>
            <br>

            <div>
                <label for="melhoria" class="form-label w-50 mx-auto d-block">
                    8. O que poderíamos melhorar em nossos serviços?
                </label>
                <textarea class="form-control w-50 mx-auto" id="melhoria" name="melhoria" rows="3" placeholder="Deixe sua sugestão"></textarea>
            </div>
            <br>

            <div>
                <label for="produto" class="form-label w-50 mx-auto d-block">
                    9. Qual produto ou serviço você mais utiliza?
                </label>
                <input class="form-control w-50 mx-auto" type="text" id="produto" name="produto" placeholder="Digite sua resposta">
            </div>
            <br>

            <div>
                <label for="sugestao" class="form-label w-50 mx-auto d-block">
                    10. Você gostaria de deixar algum comentário ou sugestão?
                </label>
                <textarea class="form-control w-50 mx-auto" id="sugestao" name="sugestao" rows="3" placeholder="Escreva aqui sua opinião"></textarea>
            </div>
            <br>

            <input type="submit" value="Enviar respostas" class="btn btn-primary w-50 mx-auto d-block">

        </form>
    </div>

<script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
    
</script>   
</body>
</html>