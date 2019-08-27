<?php

require_once __DIR__ .'/../db/Conexao.php';

Class Endereco extends Conexao{

    private $numero;
    private $bairro;
    private $rua;
    private $estado;
    private $cidade;

    

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
        $sql = "INSERT INTO endereco(NUMERO, BAIRRO, RUA, ESTADO, CIDADE)
                VALUES(:numero, :bairro, :rua, :estado, :cidade)";


        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":numero", $this->numero);
        $stmt->bindParam(":bairro", $this->bairro);
        $stmt->bindParam(":rua", $this->rua);
        $stmt->bindParam(":estado", $this->estado);
        $stmt->bindParam(":cidade", $this->cidade);
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