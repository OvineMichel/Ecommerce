<?php
include_once "../class/pergunta.DAO.class.php";
$objPerguntaDAO = new perguntaDAO();
$retorno = $objPerguntaDAO->listar($_GET['id']);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../operacoes/jquery.js"></script>
    <script src="../operacoes/operacoes.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,369;1,369&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <header>
        <h1 id="titulo">Boutique Elegance</h1>
    </header>
    <div id="container">
        <form id="form-prech" action="checarPergunta_ok.php?id=<?=$_GET['id']?>" method="POST">
                <p id="text-form">Responda a pergunta chave</p>
                <div style="display: flex;  flex-direction: column; gap: 4px;">
                <p style="text-align: center;"><?=$retorno['pergunta']?></p>
                    <input type="text" name="resposta" class="inputs">
                </div>
                <?php  if(isset($_GET['erro']))
                    echo "<p class='text-error'>Resposta Incorreta</p>";
                ?>
                <button class="btn-op">Enviar</button>
            </form>
    </div>
</body>
</html>