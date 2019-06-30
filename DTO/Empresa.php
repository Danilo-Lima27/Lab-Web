<?php

	/* @Autor: Dalker Pinheiro
	   Atributos e métodos da classe */
	   
	class Empresa{
		//Atributos
		private $nome;
 		private $slogan;
 		private $foto;
 		private $cod;
 		private $login;
 		private $senha;
 				
		//Métodos Getters e Setters
		public function getNome(){
			return $this->nome;
		}
		public function getSlogan(){
			return $this->slogan;
		}
		public function getFoto(){
			return $this->foto;
		}
		public function getCod(){
			return $this->cod;
		}
		public function getLogin(){
			return $this->login;
		}
		public function getSenha(){
			return $this->senha;
		}
		
		public function setNome($nome){
			$this->nome=$nome;
		}
		public function setSlogan($slogan){
			$this->slogan=$slogan;
		}
		public function setFoto($foto){
			$this->foto=$foto;
		}
		public function setCod($cod){
			$this->cod=$cod;
		}
		public function setLogin($login){
			$this->login=$login;
		}
		public function setSenha($senha){
			$this->senha=$senha;
		}
		
	}
?>