
<?php
session_start();
    include_once "../class/cliente.class.php";
	include_once "../class/cliente.DAO.class.php";
    include_once "../arquivos_seguro/seguranca.php";
    if(!isset($_SESSION['logadoAdm'])){
		header("location=../login.php");
	}
    $objUsuarioDAO = new clienteDAO();
    $id = $_POST['id'];
    $senha = $_POST['senha'];
    $lista = $objUsuarioDAO->retornarUnico($id);
    
    if (senhaCharEsp($senha)) {
        header('Location: alterarSenha.php?errochar&id='.$id);
        exit();
    }
    
    if (detectSQL($senha)) {
        header('Location: alterarSenha.php?errosql&id='.$id);
        exit();
    }
    
    if (senhaCurto($senha)) {
        header('Location: alterarSenha.php?errocurto&id='.$id);
        exit();
    }

    if(hash('sha256',$senha) == $lista['senha']){
        header('Location: alterarSenha.php?erroMesmaSenha&id='.$id);
        exit();
    }
    $cliente = new cliente();
    $cliente->setSenha(hash("sha256",$senha));
    $cliente->setIdCliente($id);
    $clienteDAO = new clienteDAO();
    $operacao = $clienteDAO->alteraSenha($cliente);
    if($operacao)
    header('location:../index.php?senhaok');
    else
    header('location: ../index.php?senhanok');
?>