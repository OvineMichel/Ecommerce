<?php

session_start();
if(!@$_SESSION['logado'] && !@$_SESSION['logadoAdm'])
header("location: ../usuarios/login.php");

include_once "../class/produtos.DAO.class.php";
include_once "../class/vendas_produtos.DAO.class.php";

$objProduto = new ProdutosDAO();
$ObjvendasProdutosDAO = new vendas_produtosDAO();
$retorno = $ObjvendasProdutosDAO->retornarVendas($_GET['id']);
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
    <div id="container" style="display: flex; flex-direction: column;">
            <form id="form-prech" style="width: auto; padding: 20px;">
                <p style="background-color: #d6d6d6; padding: 4px;">Dados dos Itens:</p>
                <?php
                foreach($retorno as $query){
                $query_produto = $objProduto->retornarUnico($query['id_produto_id']);?>
                <div class="centralizarecibo" style="padding: 20px">
                <img src="../img/<?=$query_produto['foto']?>" width="80" height="80">
                <p><?=$query_produto['nome_produto']?></p>
                <div style="display: flex; gap: 4px;" class="recibo_mini">
                    <p>Valor unitario: </p><input class="inputs" value="<?=$query['valor_unit']?>" readonly>
                </div>
                <?php @$ValorTotal = $ValorTotal + $query['valor_unit'] * $query['quantidade']; ?>
                <div style="display: flex; gap: 4px;" class="recibo_mini">
                    <p>Quantidade: </p><input class="inputs" value="<?=$query['quantidade']?>" readonly>
                </div>
                
            </div>
            <?php } ?>
            <h3 style="background-color: green; padding: 5px; border-radius: 6px; color: white;">Valor total da compra: R$<?=$ValorTotal?></h3>
        </form>
             <button class="btn-op" onclick="window.location.href='usuario_produtos.php'">Retornar</button>
    </div>
</body>
</html>