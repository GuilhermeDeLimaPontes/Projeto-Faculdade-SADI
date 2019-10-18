<?php

//conexão com PDO

Class conexao{

	public $db;	

	public function __construct(){
		try {
			$this->db = new PDO("mysql:dbname=sadi;host=localhost;charset=utf8","root","", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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