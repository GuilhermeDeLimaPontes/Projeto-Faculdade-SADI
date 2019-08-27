<?php

require_once __DIR__ .'/../db/Conexao.php';

Class Paciente extends Conexao {
    private $nome;
    private $data_nascimento;
    private $sexo;
    private $observacao;
    private $rg;
    private $cartao_sus;

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
        $sql = "INSERT INTO paciente (NOME, DATA_NASCIMENTO,SEXO,OBSERVACAO,RG,CARTAO_SUS)
                VALUES(:nome, :data_nascimento,:sexo,:observacao,:rg,:cartao_sus)";
                
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":data_nascimento", $this->data_nascimento);
        $stmt->bindParam(":sexo", $this->sexo);
        $stmt->bindParam(":observacao", $this->observacao);
        $stmt->bindParam(":rg", $this->rg);
        $stmt->bindParam(":cartao_sus", $this->cartao_sus);
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