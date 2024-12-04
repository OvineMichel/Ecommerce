<?php
session_start();
    include_once "../class/cliente.class.php";
	include_once "../class/cliente.DAO.class.php";
    $clienteDAO = new clienteDAO();
    $email = $_POST['email'];
    $retorno = $clienteDAO->checaEmail($email);

    if($retorno['quantia']){
    $retorno = $clienteDAO->retornarUnicoEmail($email);
    $_SESSION['id_cliente'] = $retorno['id_cliente'];
    header('location: checarPergunta.php?id='.$retorno['id_cliente']);
    }
    else
    header('location: checarEmail.php?emailnok');

?>