<?php

//conexão com PDO

Class conexao{

	public $db;	

	public function __construct(){
		try {
			$this->db = new PDO("mysql:dbname=sadi;host=localhost;charset=utf8","root","", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		} 
		catch (PDOException $e) {
			echo "Erro ao se conectar ao banco".$e->getMessage();
			
		}
		catch(Exception $e){
			echo "Erro Genérico".$e->getMessage();
		}
	}
}
?>