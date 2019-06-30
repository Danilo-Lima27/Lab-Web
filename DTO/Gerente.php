<?php

	/* @Autor: Dalker Pinheiro
	   Atributos e métodos da classe */
	   
	class Gerente{
		//Atributos
		private $cod;
 		private $nome;
 		private $endereco;
 		private $telefone;
 		private $email;
 		private $rg;
 		private $cpf;
 		private $login;
 		private $senha;
 				
		//Métodos Getters e Setters
		public function getCod(){
			return $this->cod;
		}
		public function getNome(){
			return $this->nome;
		}
		public function getEndereco(){
			return $this->endereco;
		}
		public function getTelefone(){
			return $this->telefone;
		}
		public function getEmail(){
			return $this->email;
		}
		public function getRg(){
			return $this->rg;
		}
		public function getCpf(){
			return $this->cpf;
		}
		public function getLogin(){
			return $this->login;
		}
		public function getSenha(){
			return $this->senha;
		}
		
		public function setCod($cod){
			$this->cod=$cod;
		}
		public function setNome($nome){
			$this->nome=$nome;
		}
		public function setEndereco($endereco){
			$this->endereco=$endereco;
		}
		public function setTelefone($telefone){
			$this->telefone=$telefone;
		}
		public function setEmail($email){
			$this->email=$email;
		}
		public function setRg($rg){
			$this->rg=$rg;
		}
		public function setCpf($cpf){
			$this->cpf=$cpf;
		}
		public function setLogin($login){
			$this->login=$login;
		}
		public function setSenha($senha){
			$this->senha=$senha;
		}
		
	}
?>