<?php

require_once __DIR__ .'/../db/Conexao.php';

Class Ocorrencia extends Conexao{

    private $destino;
    private $hora_final;
    private $hora_fato;
    private $hora_local;
    private $km_inicial;
    private $km_rodado;
    private $km_final;
    private $prefixo_amb;
    private $nat_ocorrencia;
    private $ra;
    private $fk_id_paciente;
    private $fk_id_origem;
    
    
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
        $sql = "INSERT INTO ocorrencia(DESTINO, HORA_FINAL, HORA_FATO, HORA_LOCAL, KM_INICIAL, 
                             KM_RODADO, KM_FINAL, PREFIXO_AMB, NATUREZA_OCORRENCIA, RA,FK_ID_PACIENTE,FK_ID_ORIGEM) 
                VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";

        try{
            $this->db->beginTransaction();

            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(1, $this->destino);
            $stmt->bindValue(2, $this->hora_final);
            $stmt->bindValue(3, $this->hora_fato);
            $stmt->bindValue(4, $this->hora_local);
            $stmt->bindValue(5, $this->km_inicial);
            $stmt->bindValue(6, $this->km_rodado);
            $stmt->bindValue(7, $this->km_final);
            $stmt->bindValue(8, $this->prefixo_amb);
            $stmt->bindValue(9, $this->nat_ocorrencia);
            $stmt->bindValue(10, $this->ra);
            $stmt->bindValue(11, $this->fk_id_paciente);
            $stmt->bindValue(12, $this->fk_id_origem);
            $stmt->execute();
            
            $this->db->commit();
        }catch(PDOException $e){
            echo $e->getMessage();
            $this->db->rollBack();
        }
    }

    public function getLastIdOcorrencia()
    {
        
        $sql = "SELECT IDOCORRENCIA FROM ocorrencia ORDER BY IDOCORRENCIA DESC LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0)
        {
         $result = $stmt->fetch(PDO::FETCH_ASSOC);
         $lastId = $result['IDOCORRENCIA'];
         return intval($lastId);
        }
    }

    public function pegarIdOcorrenciaPorPaciente($id)
    {
        $sql = "SELECT IDOCORRENCIA FROM ocorrencia WHERE FK_ID_PACIENTE = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();

        if($stmt->execute() && $stmt->rowCount() > 0)
        {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $id = $result['IDOCORRENCIA'];
            return intval($id);
        }else{
            return '';
        }
    }

    public function DadosDoAtendimento($id)
    {
        $sql = "SELECT OCORRENCIA.DESTINO , 
                OCORRENCIA.HORA_FINAL, OCORRENCIA.HORA_FATO, OCORRENCIA.HORA_LOCAL, OCORRENCIA.KM_INICIAL, OCORRENCIA.KM_RODADO, OCORRENCIA.KM_FINAL, OCORRENCIA.PREFIXO_AMB, OCORRENCIA.NATUREZA_OCORRENCIA, OCORRENCIA.RA, 
                PACIENTE.NOME, PACIENTE.DATA_NASCIMENTO, PACIENTE.SEXO, PACIENTE.OBSERVACAO, PACIENTE.RG, PACIENTE.CARTAO_SUS, 
                ORIGEM.NOME_SOLICITANTE, ORIGEM.HORA_COMUNICACAO, ORIGEM.SOLICITAMENTO, ORIGEM.DATA_FATO, 
                ENDERECO.RUA, ENDERECO.BAIRRO, ENDERECO.NUMERO, ENDERECO.CIDADE, ENDERECO.ESTADO
                FROM OCORRENCIA 
                INNER JOIN PACIENTE ON OCORRENCIA.FK_ID_PACIENTE = PACIENTE.IDPACIENTE
                INNER JOIN ORIGEM ON OCORRENCIA.FK_ID_ORIGEM = ORIGEM.IDORIGEM
                INNER JOIN ENDERECO ON PACIENTE.FK_ID_ENDERECO = ENDERECO.IDENDERECO
                WHERE IDPACIENTE = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();

        if($stmt->execute() && $stmt->rowCount() > 0)
        {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            return $results;
        }else{
            return array();
        }
    }

    public function EquipeAtendimento($idOcorrencia)
    {
        $sql = "SELECT motorista.NOME 
                FROM motorista 
                INNER JOIN ocorrencia_motorista 
                ON motorista.IDMOTORISTA = ocorrencia_motorista.ID_MOTORISTA 
                INNER JOIN ocorrencia 
                ON ocorrencia.IDOCORRENCIA = ocorrencia_motorista.ID_OCORRENCIA 
                WHERE IDOCORRENCIA = :idocorrencia";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":idocorrencia", $idOcorrencia);
        $stmt->execute();

        if($stmt->execute() && $stmt->rowCount() > 0)
        {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }else{
            return array();
        }
    }

    public function contarNumOcorrencias()
    {
        $sql = "SELECT COUNT(IDOCORRENCIA) as numTotal FROM ocorrencia";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        
        if($stmt->rowCount() > 0)
        {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return intval($result['numTotal']);
        }else{
            return array('0');
        }
    }

    public function contarNumOcorrenciasPorMotorista($id)
    {
        $sql = "SELECT COUNT(ID_OCORRENCIA) as num FROM ocorrencia_motorista WHERE ID_MOTORISTA = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        if($stmt->rowCount() > 0)
        {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return intval($result['num']);
        }else{
            return array('0');
        }
    }
}

?>