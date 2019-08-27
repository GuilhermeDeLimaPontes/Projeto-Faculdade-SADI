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
                             KM_RODADO, KM_FINAL, PREFIXO_AMB, NATUREZA_OCORRENCIA, RA) 
                VALUES(?,?,?,?,?,?,?,?,?,?)";


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