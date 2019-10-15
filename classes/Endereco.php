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

        try{
            $this->db->beginTransaction();

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":numero", $this->numero);
            $stmt->bindParam(":bairro", $this->bairro);
            $stmt->bindParam(":rua", $this->rua);
            $stmt->bindParam(":estado", $this->estado);
            $stmt->bindParam(":cidade", $this->cidade);
            $stmt->execute();
            $this->db->commit();        
        }catch(PDOException $e){
            echo $e->getMessage();
            $this->db->rollBack();
        }
        
    }

    public function getLastIdEndereco()
    {
        $sql = "SELECT IDENDERECO FROM endereco ORDER BY IDENDERECO DESC LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0)
        {
         $result = $stmt->fetch(PDO::FETCH_ASSOC);
         $lastId = $result['IDENDERECO']+1;
         return intval($lastId);
        }
    }

    public function pegarDadosPorId($id)
    {
        $sql = "SELECT IDENDERECO, NUMERO, BAIRRO, RUA, ESTADO, CIDADE from endereco WHERE IDENDERECO = :id ";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();

        if($stmt->rowCount() > 0)
        {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }else{
            $result = array();
        }
    }

    public function listar()
    {

    }

    public function editar($id)
    {
        $sql = "UPDATE endereco SET 
                RUA = :rua, BAIRRO = :bairro, NUMERO= :numero, CIDADE = :cidade, ESTADO = :estado
                WHERE IDENDERECO = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":rua",$this->rua);
        $stmt->bindValue(":bairro",$this->bairro);
        $stmt->bindValue(":numero",$this->numero);
        $stmt->bindValue(":cidade",$this->cidade);
        $stmt->bindValue(":estado",$this->estado);
        $stmt->bindValue(":id",$id);
        $stmt->execute();

        if($stmt->execute())
        {
            session_start();
            $_SESSION['Success'] = "Dados Alterados Com Sucesso";
        }else{
            session_start();
            $_SESSION['Warning'] = "Erro ao Alterar. Tente Novamente Mais Tarde";
        }

    }

    public function excluir($id)
    {

    }
}
?>