<?php

	/* @Autor: Dalker Pinheiro
	   Atributos e métodos da classe */
	   
	class Garcom{
		//Atributos
		private $cod;
 		private $endereco;
 		private $escolaridade;
 		private $cpf;
 		private $telefone;
 		private $nome;
 		private $dataNasc;
 		private $login;
 		private $senha;
 				
		//Métodos Getters e Setters
		public function getCod(){
			return $this->cod;
		}
		public function getEndereco(){
			return $this->endereco;
		}
		public function getEscolaridade(){
			return $this->escolaridade;
		}
		public function getCPF(){
			return $this->cpf;
		}
		public function getTelefone(){
			return $this->telefone;
		}
		public function getNome(){
			return $this->nome;
		}
		public function getDataNasc(){
			return $this->dataNasc;
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
		public function setEndereco($endereco){
			$this->endereco=$endereco;
		}
		public function setEscolaridade($escolaridade){
			$this->escolaridade=$escolaridade;
		}
		public function setCpf($cpf){
			$this->cpf=$cpf;
		}
		public function setTelefone($telefone){
			$this->telefone=$telefone;
		}
		public function setNome($nome){
			$this->nome=$nome;
		}
		public function setDataNasc($dataNasc){
			$this->dataNasc=$dataNasc;
		}
		public function setLogin($login){
			$this->login=$login;
		}
		public function setSenha($senha){
			$this->senha=$senha;
		}
		
	}
?>