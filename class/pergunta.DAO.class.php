<?php
include_once "pergunta.class.php";

class perguntaDAO{
    public function __construct(){
			$this->conexao = 
			new PDO("mysql:host=localhost; dbname=bancoSD","root", "");
		}

        public function inserir(pergunta $pergunta){
        $sql = $this->conexao->prepare("INSERT INTO perguntas(id_cliente_id_pergunta,pergunta,resposta) VALUES(:idcli, :per, :res)");
        $sql->bindValue(":idcli",$pergunta->getIdCliente());
        $sql->bindValue(":per",$pergunta->getPergunta());
        $sql->bindValue(":res",$pergunta->getResposta());
        return $sql->execute();
    }

    public function listar($id){
        $sql = $this->conexao->prepare("SELECT * FROM perguntas WHERE id_cliente_id_pergunta = :id");
        $sql->bindValue(":id",$id);
        $sql->execute();
        return $sql->fetch(); 
    }
}