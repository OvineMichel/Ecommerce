<?php
	session_start();
    include_once "../class/produtos.DAO.class.php";
    include_once "../class/categoria.DAO.class.php";

    if(isset($_GET['compra'])){
        if(!isset($_SESSION['carrinho']))
        $_SESSION['carrinho'] = [];

            if(!in_array($_GET['id'],$_SESSION['carrinho'])){
            array_push($_SESSION['carrinho'], $_GET['id']);
            }
        } 
    $objCategoriaDAO = new categoriaDAO();
    $retornoCat = $objCategoriaDAO->listar();
    $objProdutoDAO = new produtosDAO();
    $retorno = $objProdutoDAO->listar();
    $lancamento = $objProdutoDAO->listarLancamento();
    $ofertados = $objProdutoDAO->listarOfertados();
?>
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
        <div>
            <h1 id="titulo">Boutique Elegance</h1>
        </div>
        <div>
            <a style="font-size: 11px;" class="btn-op-alt" href='usuario_compras.php'>Minhas Compras</a>
            <?php if(isset($_SESSION['logadoAdm'])){
              echo "<a style='font-size: 11px;' class='btn-op-alt' href='../usuarios/adm/indexadm.php'>Voltar ADM</a>";
            }?>
            <a id="carrinho" style="width:auto;" href="carrinho.php">Carrinho de compras</a>
            <a id="sair" href="../operacoes/sair.php">Sair</a>
            <form style="margin-top: 8px;" action="usuario_produtos_pesquisa.php" method="GET">
                <input type="text" name="pesquisa" class="inputs">
                <button class="btn-op">Procurar</button>
            </form>
        </div>
    </header>
    <div id="div-botoes" style="margin-bottom: 0;">
                <?php
                    foreach($retornoCat as $query){?>
                    <button class="side-links" onclick="window.location.href='usuario_produtos_categoria.php?categoria=<?=$query['nome']?>'"><?=$query['nome']?></button>
                <?php } ?>
     </div>
     <h1 id="titulo-lancamento"style="font-family: lobster; text-align: center; color: white; background-color: #01820E; margin:0; padding: 10px;">Nossas Ofertas</h1>
     <div id="div-ofertados">
     <?php foreach ($ofertados as $query) { ?>
                <div class='form-listar'>
                    <p class='top-text'><?= $query['nome_produto'] ?></p>
                    <p class="p-valor" style="color: red; font-size: 17px;"><?= $query['preco_original'] ?> R$</p>
                    <p class="p-valor"><?= $query['valor'] ?> R$</p>
                    <p id="warning-button" style="width:100px; text-align:center; margin:0;"><?= $query['nome'] ?></p>
                    <img style='border-radius:10px;' src='../img/<?= $query['foto'] ?>' width='130' height='130'>
                    <?php if($query['disponibilidade']){
                        ?><a class="btn-op" href="?id=<?=$query['id_produto']?>&compra">Comprar</a><?php
                    }?>
                    <button class='btn-op botao-mais'>Mais</button>
                    <div class='div-mais' style='display:none; flex-direction: column; justify-content: center;'>
                        <p><?= $query['descricao'] ?></p>
                        <p><?php if($query['disponibilidade'])
                        echo'<p style="padding: 4px; border-radius: 4px; color:white; background-color: var(--verdep);">Disponivel</p>';
                        else echo'<p style="padding: 4px; border-radius: 4px; color:white; background-color: red;">Indisponivel</p>';?>
                    </div>
                </div>
            <?php } ?>
     </div>
     <h1 id="titulo-lancamento"style="font-family: lobster; text-align: center; color: white; background-color: #01820E; margin:0; padding: 10px;">Nossos lançamentos</h1>
     <div id="div-lancamento">
     <?php foreach ($lancamento as $query) { ?>
                <div class='form-listar'>
                    <p class='top-text'><?= $query['nome_produto'] ?></p>
                    <p class="p-valor"><?= $query['valor'] ?> R$</p>
                    <p id="warning-button" style="width:100px; text-align:center; margin:0;"><?= $query['nome'] ?></p>
                    <img style='border-radius:10px;' src='../img/<?= $query['foto'] ?>' width='130' height='130'>
                    <?php if($query['disponibilidade']){
                        ?><a class="btn-op" href="?id=<?=$query['id_produto']?>&compra">Comprar</a><?php
                    }?>
                    <button class='btn-op botao-mais'>Mais</button>
                    <div class='div-mais' style='display:none; flex-direction: column; justify-content: center;'>
                        <p><?= $query['descricao'] ?></p>
                        <p><?php if($query['disponibilidade'])
                        echo'<p style="padding: 4px; border-radius: 4px; color:white; background-color: var(--verdep);">Disponivel</p>';
                        else echo'<p style="padding: 4px; border-radius: 4px; color:white; background-color: red;">Indisponivel</p>';?>
                    </div>
                </div>
            <?php } ?>
     </div>
            <div class="container-list">
            <?php foreach ($retorno as $query) { ?>
                <div class='form-listar'>
                    <p class='top-text'><?= $query['nome_produto'] ?></p>
                    <p class="p-valor"><?= $query['valor'] ?> R$</p>
                    <p id="warning-button" style="width:100px; text-align:center; margin:0;"><?= $query['nome'] ?></p>
                    <img style='border-radius:10px;' src='../img/<?= $query['foto'] ?>' width='130' height='130'>
                    <?php if($query['disponibilidade']){
                        ?><a class="btn-op" href="?id=<?=$query['id_produto']?>&compra">Comprar</a><?php
                    }?>
                    <button class='btn-op botao-mais'>Mais</button>
                    <div class='div-mais' style='display:none; flex-direction: column; justify-content: center;'>
                        <p><?= $query['descricao'] ?></p>
                        <?php if($query['disponibilidade'])
                        echo'<p style="padding: 4px; border-radius: 4px; color:white; background-color: var(--verdep);">Disponivel</p>';
                        else echo'<p style="padding: 4px; border-radius: 4px; color:white; background-color: red;">Indisponivel</p>';?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </body>
    </html>