<?php

	/* @Autor: Dalker Pinheiro
	   Classe DAO */
	   
class GerenteDAO{

	//Carrega um elemento pela chave primária
	public function carregar($cod){
		include("conexao.php");
		$sql = 'SELECT * FROM gerente WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":cod",$cod);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	//Lista todos os elementos da tabela
	public function listarTodos(){
		include("conexao.php");
		$sql = 'SELECT * FROM gerente';
		$consulta = $conexao->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarTodosOrgenandoPor($coluna){
		include("conexao.php");
		$sql = 'SELECT * FROM gerente ORDER BY '.$coluna;
		$consulta = $conexao->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Apaga um elemento da tabela
	public function deletar($cod){
		include("conexao.php");
		$sql = 'DELETE FROM gerente WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":cod",$cod);
		if($consulta->execute())
			return true;
		else
			return false;
	}
	
	//Insere um elemento na tabela
	public function inserir($gerente){
		include("conexao.php");
		$sql = 'INSERT INTO gerente (cod, nome, endereco, telefone, email, rg, cpf, login, senha) VALUES (:cod, :nome, :endereco, :telefone, :email, :rg, :cpf, :login, :senha)';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(':cod',$gerente->getCod()); 
		$consulta->bindValue(':nome',$gerente->getNome()); 
		$consulta->bindValue(':endereco',$gerente->getEndereco()); 
		$consulta->bindValue(':telefone',$gerente->getTelefone()); 
		$consulta->bindValue(':email',$gerente->getEmail()); 
		$consulta->bindValue(':rg',$gerente->getRg()); 
		$consulta->bindValue(':cpf',$gerente->getCpf()); 
		$consulta->bindValue(':login',$gerente->getLogin()); 
		$consulta->bindValue(':senha',$gerente->getSenha()); 
		if($consulta->execute())
			return true;
		else
			return false;
	}
	
	//Atualiza um elemento na tabela
	public function atualizar($gerente){
		include("conexao.php");
		try {
			$sql = 'UPDATE gerente SET nome = :nome, endereco = :endereco, telefone = :telefone, email = :email, rg = :rg, cpf = :cpf, login = :login, senha = :senha WHERE cod = :cod';
			$consulta = $conexao->prepare($sql);
			$consulta->bindValue(':cod',$gerente->getCod()); 
			$consulta->bindValue(':nome',$gerente->getNome()); 
			$consulta->bindValue(':endereco',$gerente->getEndereco()); 
			$consulta->bindValue(':telefone',$gerente->getTelefone());
			$consulta->bindValue(':email',$gerente->getEmail()); 
			$consulta->bindValue(':rg',$gerente->getRg()); 
			$consulta->bindValue(':cpf',$gerente->getCpf()); 
			$consulta->bindValue(':login',$gerente->getLogin()); 
			$consulta->bindValue(':senha',$gerente->getSenha());
			if($consulta->execute())
				return true;
			else
				return false;
			
		} catch (PDOException  $e) {
			echo 'Erro:' . $e->getMessage();
		}
		
	}

	//Apaga todos os elementos da tabela
	public function limparTabela(){
		include("conexao.php");
		$sql = 'DELETE FROM gerente';
		$consulta = $conexao->prepare($sql);
		if($consulta->execute())
			return true;
		else
			return false;
	}
	public function logar($log){
		try{
			include("conexao.php");
			$sql ="SELECT * FROM gerente WHERE login=:login AND senha=:senha";
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