<?php

	/* @Autor: Dalker Pinheiro
	   Atributos e métodos da classe */
	   
	class Pedido{
		//Atributos
		private $numMesa;
 		private $codGarcom;
 		private $codProduto;
 		private $data;
 		private $hora;
 		private $cod;
 				
		//Métodos Getters e Setters
		public function getNumMesa(){
			return $this->numMesa;
		}
		public function getCodGarcom(){
			return $this->codGarcom;
		}
		public function getCodProduto(){
			return $this->codProduto;
		}
		public function getData(){
			return $this->data;
		}
		public function getHora(){
			return $this->hora;
		}
		public function getCod(){
			return $this->cod;
		}
		
		public function setNumMesa($numMesa){
			$this->numMesa=$numMesa;
		}
		public function setCodGarcom($codGarcom){
			$this->codGarcom=$codGarcom;
		}
		public function setCodProduto($codProduto){
			$this->codProduto=$codProduto;
		}
		public function setData($data){
			$this->data=$data;
		}
		public function setHora($hora){
			$this->hora=$hora;
		}
		public function setCod($cod){
			$this->cod=$cod;
		}
		
	}
?>