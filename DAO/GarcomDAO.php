<?php

	/* @Autor: Dalker Pinheiro
	   Classe DAO */
	   
class GarcomDAO{

	//Carrega um elemento pela chave primária
	public function carregar($cod){
		include("conexao.php");
		$sql = 'SELECT * FROM garcom WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":cod",$cod);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	//Lista todos os elementos da tabela
	public function listarTodos(){
		include("conexao.php");
		$sql = 'SELECT * FROM garcom';
		$consulta = $conexao->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarPorCod($cod){
		include("conexao.php");
		$sql = 'SELECT nome FROM garcom WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":cod",$cod);
		$consulta->execute();
		return ($consulta->fetch(PDO::FETCH_ASSOC));
	}
	
	//Apaga um elemento da tabela
	public function deletar($cod){
		include("conexao.php");
		$sql = 'DELETE FROM garcom WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":cod",$cod);
		if($consulta->execute())
			return true;
		else
			return false;
	}
	
	//Insere um elemento na tabela 
	public function inserir($garcom){ 
		try {
			include("conexao.php"); 
			$sql = 'INSERT INTO garcom(endereco, escolaridade, cpf, telefone, nome, dataNasc, login, senha) VALUES (:endereco,:escolaridade,:cpf,:telefone,:nome,:dataNasc,:login,:senha)'; 
			$consulta = $conexao->prepare($sql);
			$consulta->bindValue(':endereco',$garcom->getEndereco()); 
			$consulta->bindValue(':escolaridade',$garcom->getEscolaridade()); 
			$consulta->bindValue(':cpf',$garcom->getCpf()); 
			$consulta->bindValue(':telefone',$garcom->getTelefone()); 
			$consulta->bindValue(':nome',$garcom->getNome()); 
			$consulta->bindValue(':dataNasc',$garcom->getDataNasc()); 
			$consulta->bindValue(':login',$garcom->getLogin()); 
			$consulta->bindValue(':senha',$garcom->getSenha());  	
			if ($consulta->execute()) {
				return true;
			} else {
				return false;
			}

		}	
		catch (Exception $e){ 
		 	echo 'Erro:' . $e->getMessage(); 
		 }
	}
	
	//Atualiza um elemento na tabela
	public function atualizar($garcom){
		include("conexao.php");
		$sql = 'UPDATE garcom SET endereco = :endereco, escolaridade = :escolaridade, cpf = :cpf, telefone = :telefone, nome = :nome, dataNasc = :dataNasc, login = :login, senha = :senha WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(':cod',$garcom->getCod()); 
		$consulta->bindValue(':endereco',$garcom->getEndereco()); 
		$consulta->bindValue(':escolaridade',$garcom->getEscolaridade()); 
		$consulta->bindValue(':cpf',$garcom->getCpf()); 
		$consulta->bindValue(':telefone',$garcom->getTelefone()); 
		$consulta->bindValue(':nome',$garcom->getNome()); 
		$consulta->bindValue(':dataNasc',$garcom->getDataNasc()); 
		$consulta->bindValue(':login',$garcom->getLogin()); 
		$consulta->bindValue(':senha',$garcom->getSenha()); 
		if($consulta->execute())
			return true;
		else
			return false;
	}

	//Apaga todos os elementos da tabela
	public function limparTabela(){
		include("conexao.php");
		$sql = 'DELETE FROM garcom';
		$consulta = $conexao->prepare($sql);
		if($consulta->execute())
			return true;
		else
			return false;
	}
	public function logar($log){
		try{
			include("conexao.php");
			$sql ="SELECT * FROM garcom WHERE login=:login AND senha=:senha";
			$consulta = $conexao->prepare($sql);
			$consulta->bindValue(':login',$log->getLogin());
			$consulta->bindValue(':senha',$log->getSenha());
			$consulta->execute();
			return($consulta->fetchAll(PDO::FETCH_ASSOC));
		} catch(PDOException $e){
			echo 'Erro:' . $e->getMessage();
		}
	}
}
?>