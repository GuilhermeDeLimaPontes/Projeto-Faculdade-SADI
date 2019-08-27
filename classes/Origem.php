<?php

require_once __DIR__ .'/../db/Conexao.php';

Class Origem extends Conexao{
    private $nome_solicitante;
    private $hora_comunicacao;
    private $solicitamento;
    private $data_fato;

    public function __get($atributo)
    {   
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }


    public function cadastrar()
    {
        $sql = "INSERT INTO origem(NOME_SOLICITANTE, HORA_COMUNICACAO, SOLICITAMENTO, DATA_FATO)
                VALUES(:nome_solicitante, :hora_comunicacao, :solicitamento, :data_fato)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nome_solicitante",$this->nome_solicitante);
        $stmt->bindParam(":hora_comunicacao",$this->hora_comunicacao);
        $stmt->bindParam(":solicitamento",$this->solicitamento);
        $stmt->bindParam(":data_fato",$this->data_fato);
        $stmt->execute();

    }

    public function listar()
    {

    }

    public function editar($id)
    {

    }

    public function excluir($id)
    {

    }
}

?>