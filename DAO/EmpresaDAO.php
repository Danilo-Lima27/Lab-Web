<?php
	   
class EmpresaDAO{

	//Carrega um elemento pela chave primária
	public function carregar($cod){
		include("conexao.php");
		$sql = 'SELECT * FROM empresa WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":cod",$cod);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	//Lista todos os elementos da tabela
	public function listarTodos(){
		include("conexao.php");
		$sql = 'SELECT * FROM empresa';
		$consulta = $conexao->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarTodosOrgenandoPor($coluna){
		include("conexao.php");
		$sql = 'SELECT * FROM empresa ORDER BY '.$coluna;
		$consulta = $conexao->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Apaga um elemento da tabela
	public function deletar($cod){
		include("conexao.php");
		$sql = 'DELETE FROM empresa WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":cod",$cod);
		if($consulta->execute()){
			return true;
		}
		else{
			return false;
		}
	}
	
	//Insere um elemento na tabela
	public function inserir($empresa){
		include("conexao.php");
		$sql = 'INSERT INTO empresa (cod, nome, slogan, foto, login, senha) VALUES (:cod, :nome, :slogan, :foto, :login, :senha)';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(':cod',$empresa->getCod()); 
		$consulta->bindValue(':nome',$empresa->getNome()); 
		$consulta->bindValue(':slogan',$empresa->getSlogan()); 
		$consulta->bindValue(':foto',$empresa->getFoto()); 
		$consulta->bindValue(':login',$empresa->getLogin()); 
		$consulta->bindValue(':senha',$empresa->getSenha()); 
		if($consulta->execute()){
			return true;
		}
		else {
			return false;
		}
	}
	
	//Atualiza um elemento na tabela
	public function atualizar($empresa){
		include("conexao.php");
		$sql = 'UPDATE empresa SET cod = :cod, nome = :nome, slogan = :slogan, foto = :foto, login = :login, senha = :senha WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(':cod',$empresa->getCod()); 
		$consulta->bindValue(':nome',$empresa->getNome()); 
		$consulta->bindValue(':slogan',$empresa->getSlogan()); 
		$consulta->bindValue(':foto',$empresa->getFoto()); 
		$consulta->bindValue(':login',$empresa->getLogin()); 
		$consulta->bindValue(':senha',$empresa->getSenha()); 
		if($consulta->execute()){
			return true;
		}
		else{
			return false;
		}
	}

	//Apaga todos os elementos da tabela
	public function limparTabela(){
		include("conexao.php");
		$sql = 'DELETE FROM empresa';
		$consulta = $conexao->prepare($sql);
		if($consulta->execute()){
			return true;
		}
		else{
			return false;
		}
	}
	public function logar($log){
		try{
			include("conexao.php");
			$sql ="SELECT * FROM empresa WHERE login=:login AND senha=:senha";
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