<!DOCTYPE html>
<?php
	session_start();
	if(!isset($_SESSION['logadoAdm'])){
		header("location=../login.php");
	}
?>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="jquery.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,369;1,369&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../CSS/style.css">
</head>
<body>
    <header>
        <h1 id="titulo">Boutique Elegance</h1>
        <div>
        <a class="btn-op-alt" href="../../site/usuario_produtos.php">Visitar Site</a>
        <a id="sair" href="../../operacoes/sair.php">Sair</a>
    </div>
    </header>
    <main id="adm-main">
        <aside>
            <a href="listar.php">ADM's</a>
            <a href="cadastro.php">Cadastrar ADM's</a>
            <a href="../../categoria/listarCategoria.php">Categorias</a>
            <a href="../../categoria/adicionarCategoria.php">Adicionar Categoria</a>
            <a href="../../produtos/cadastroProduto.php">Adicionar Produto</a>
            <a href="../../produtos/listarProduto.php">Produtos</a>
            <a href="../../vendas/listarVenda.php">Vendas</a>        
        </aside>
        <div id="adm-conteudo">
            <h1>Seja bem vindo</h1>
            <h4>Utilize a barra o lado para acessar as funcionalidades do ADM.<h4>
        </div>
    </main>
</body>
</html>