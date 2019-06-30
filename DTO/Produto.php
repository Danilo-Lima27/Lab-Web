<?php

	/* @Autor: Dalker Pinheiro
	   Atributos e métodos da classe */
	   
	class Produto{
		//Atributos
		private $cod;
 		private $nome;
 		private $tamanho;
 		private $valor;
 		private $categoria;
 				
		//Métodos Getters e Setters
		public function getCod(){
			return $this->cod;
		}
		public function getNome(){
			return $this->nome;
		}
		public function getTamanho(){
			return $this->tamanho;
		}
		public function getValor(){
			return $this->valor;
		}
		public function getCategoria(){
			return $this->categoria;
		}
		
		public function setCod($cod){
			$this->cod=$cod;
		}
		public function setNome($nome){
			$this->nome=$nome;
		}
		public function setTamanho($tamanho){
			$this->tamanho=$tamanho;
		}
		public function setValor($valor){
			$this->valor=$valor;
		}
		public function setCategoria($categoria){
			$this->categoria=$categoria;
		}
		
	}
?>