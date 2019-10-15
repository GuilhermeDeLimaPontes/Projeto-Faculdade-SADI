<?php
    require_once __DIR__ .'/../db/Conexao.php';

Class Ocorrencia_Motorista extends Conexao{

    private $id_ocorrencia;
    private $id_motorista;

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
        try{
        $sql = "INSERT INTO ocorrencia_motorista(ID_OCORRENCIA, ID_MOTORISTA) VALUES(:id_ocorrencia, :id_motorista)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id_ocorrencia", $this->id_ocorrencia);
        $stmt->bindValue(":id_motorista", $this->id_motorista);
        $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
            $this->db->rollBack();
        }
    }

}
?>