<?php

class pergunta{
    public $id_pergunta;
    public $id_cliente;
    public $pergunta;
    public $resposta;

    function getIdPergunta(){
        return $this->id_pergunta;
    }

    function setIdPergunta($tmp){
       $this->id_pergunta = $tmp;
    }

    function getIdCliente(){
        return $this->id_cliente;
    }

    function setIdCliente($tmp){
        $this->id_cliente = $tmp;
    }

    function getResposta(){
        return $this->resposta;
    }

    function setResposta($tmp){
        $this->resposta = $tmp;
    }

    function getPergunta(){
        return $this->pergunta;
    }

    function setPergunta($tmp){
        $this->pergunta = $tmp;
    }
}