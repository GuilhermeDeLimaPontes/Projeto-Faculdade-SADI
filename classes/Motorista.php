<?php
    require_once '../db/Conexao.php';

class Motorista extends Conexao 
{
    private $nome;
    private $email;
    private $senha;

    public function __get($atributo)
    {   
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function cadastro()
    {

    }

    public function logarSistema()
    {
        $sql = "SELECT * FROM motorista WHERE email =:email and senha =:senha";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $this->email);
        $stmt->bindValue(':senha', $this->senha);
        $stmt->execute();

        if($stmt->rowCount() > 0)
        {
            $results = $stmt->fetch();
            session_start();
            $_SESSION['IDMOTORISTA'] = $results['IDMOTORISTA'];
            header("location: ../views/index.php");
            return true;
        }else{
            session_start();
            $_SESSION['loginErro'] = "Login ou Senha Inválida";
            header("location: ../views/page-login.php");
            return false;
            exit;
        }
    }


}
?>