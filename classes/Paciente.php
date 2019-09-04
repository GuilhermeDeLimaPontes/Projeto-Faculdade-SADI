<?php

require_once __DIR__ .'/../db/Conexao.php';

Class Paciente extends Conexao {
    
    private $nome;
    private $data_nascimento;
    private $sexo;
    private $observacao;
    private $rg;
    private $cartao_sus;
    private $fk_id_endereco;


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
        $sql = "INSERT INTO paciente (NOME, DATA_NASCIMENTO,SEXO,OBSERVACAO,RG,CARTAO_SUS,FK_ID_ENDERECO)
                VALUES(:nome, :data_nascimento,:sexo,:observacao,:rg,:cartao_sus, :fk_id_endereco)";
        try{  

            $this->db->beginTransaction();

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":nome", $this->nome);
            $stmt->bindParam(":data_nascimento", $this->data_nascimento);
            $stmt->bindParam(":sexo", $this->sexo);
            $stmt->bindParam(":observacao", $this->observacao);
            $stmt->bindParam(":rg", $this->rg);
            $stmt->bindParam(":cartao_sus", $this->cartao_sus);
            $stmt->bindParam(":fk_id_endereco", $this->fk_id_endereco);
            $stmt->execute();

            $this->db->commit();
        }catch(PDOException $e){
            echo $e->getMessage();
            $this->db->rollBack();
        }    
    }

    public function getLastIdPaciente()
    {
        $sql = "SELECT IDPACIENTE FROM paciente ORDER BY IDPACIENTE DESC LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0)
        {
         $result = $stmt->fetch(PDO::FETCH_ASSOC);
         $lastId = $result['IDPACIENTE']+1;
         return intval($lastId);
        }
    }

    public function listar()
    {
        $sql = "SELECT IDPACIENTE,NOME,DATA_NASCIMENTO,SEXO,RG,CARTAO_SUS FROM paciente order by NOME";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;

    }

    public function editar($id)
    {

    }

    public function excluir($id)
    {

    }
}

?>