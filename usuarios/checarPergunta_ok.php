<?php
include_once "../class/pergunta.DAO.class.php";

$resposta = $_POST['resposta'];
$id = $_GET['id'];

$objPerguntaDAO = new perguntaDAO();
$retorno = $objPerguntaDAO->listar($id);

if($retorno['resposta'] == hash("sha256",$resposta))
    header("location: alterarSenha.php?id=".$id);
else
    header("location: checarPergunta.php?erro&id=".$id);