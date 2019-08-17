<?php

//conexão com PDO

Class conexao{

	public $db;	

	public function __construct(){
		try {
			$this->db = new PDO("mysql:dbname=sadi;host=localhost","root","");
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