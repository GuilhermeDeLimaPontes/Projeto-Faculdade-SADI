<?php
    require_once __DIR__ .'/../db/Conexao.php';

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

    public function cadastrar()
    {
        $sql = "SELECT IDMOTORISTA FROM motorista where email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":email", $this->email);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            session_start();
            $_SESSION['emailJaCadastrado'] = "Email já existente";
            return false;
        }else{
            $sql = "INSERT INTO motorista(nome, email, senha) VALUES(:nome,:email, :senha)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(":nome", $this->nome);
            $stmt->bindValue(":email", $this->email);
            $stmt->bindValue(":senha", password_hash($this->senha, PASSWORD_DEFAULT));
            $stmt->execute();

            session_start();
            $_SESSION['success'] = "Cadastro Realizado com Sucesso";

            return true;
        }
    }

    public function logarSistema()
    {
        $sql = "SELECT * FROM motorista WHERE email =:email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $this->email);
        $stmt->execute();

        if($stmt->rowCount() > 0)
        {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $hash = $results['SENHA'];

            if(password_verify($this->senha, $hash))
            { 
                session_start();
                $_SESSION['IDMOTORISTA'] = $results['IDMOTORISTA'];
                header("location: ../views/index.php");
                return true;
            }else{
                session_start();
                $_SESSION['loginErro'] = "Login ou Senha Inválida";
                header("location: ../views/page-login.php");
                exit;
            }
        }else{
            session_start();
            $_SESSION['loginErro'] = "Login ou Senha Inválida";
            header("location: ../views/page-login.php");
            return false;
            exit;
        }
    }

    public function listar()
    {
        $sql = "SELECT IDMOTORISTA, NOME, EMAIL FROM MOTORISTA";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function listarNomes()
    {
        $sql = "SELECT NOME FROM MOTORISTA";
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