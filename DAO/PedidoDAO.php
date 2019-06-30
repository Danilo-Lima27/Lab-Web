<?php

	/* @Autor: Dalker Pinheiro
	   Classe DAO */
	   
class PedidoDAO{

	//Carrega um elemento pela chave primária
	public function carregar($cod){
		include("conexao.php");
		$sql = 'SELECT * FROM pedido WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":cod",$cod);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	//Lista todos os elementos da tabela
	public function listarTodos(){
		include("conexao.php");
		$sql = 'SELECT * FROM pedido';
		$consulta = $conexao->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarPorCod($cod){
		include("conexao.php");
		$sql = 'SELECT * FROM pedido ORDER BY '.$cod;
		$consulta = $conexao->prepare($sql);
		$consulta->execute();
		return ($consulta->fetch(PDO::FETCH_ASSOC));
	}
	
	//Apaga um elemento da tabela
	public function deletar($cod){
		include("conexao.php");
		$sql = 'DELETE FROM pedido WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":cod",$cod);
		if($consulta->execute())
			return true;
		else
			return false;
	}
	
	//Insere um elemento na tabela
	public function inserir($pedido){
		include("conexao.php");
		$sql = 'INSERT INTO pedido (numMesa, codGarcom, codProduto, data, hora, cod) VALUES (:numMesa, :codGarcom, :codProduto, :data, :hora, :cod)';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(':numMesa',$pedido->getNumMesa()); 
		$consulta->bindValue(':codGarcom',$pedido->getCodGarcom()); 
		$consulta->bindValue(':codProduto',$pedido->getCodProduto()); 
		$consulta->bindValue(':data',$pedido->getData()); 
		$consulta->bindValue(':hora',$pedido->getHora()); 
		$consulta->bindValue(':cod',$pedido->getCod()); 
		if($consulta->execute())
			return true;
		else
			return false;
	}
	
	//Atualiza um elemento na tabela
	public function atualizar($pedido){
		include("conexao.php");
		$sql = 'UPDATE pedido SET numMesa = :numMesa, codGarcom = :codGarcom, codProduto = :codProduto, data = :data, hora = :hora, cod = :cod WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(':numMesa',$pedido->getNumMesa()); 
		$consulta->bindValue(':codGarcom',$pedido->getCodGarcom()); 
		$consulta->bindValue(':codProduto',$pedido->getCodProduto()); 
		$consulta->bindValue(':Data',$pedido->getData()); 
		$consulta->bindValue(':Hora',$pedido->getHora()); 
		$consulta->bindValue(':cod',$pedido->getCod()); 
		if($consulta->execute())
			return true;
		else
			return false;
	}

	//Apaga todos os elementos da tabela
	public function limparTabela(){
		include("conexao.php");
		$sql = 'DELETE FROM pedido';
		$consulta = $conexao->prepare($sql);
		if($consulta->execute())
			return true;
		else
			return false;
	}
}
?>