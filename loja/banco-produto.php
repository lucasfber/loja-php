<?php
	
	function listarProdutos($conexao){
		$produtos = array();

		$query = "select p.*, c.nome as categoria_nome from produto as p join categoria as c on p.categoria_id=c.id";
 		$resultado = mysqli_query($conexao,$query);

 		while($produto = mysqli_fetch_assoc($resultado)){
 			array_push($produtos,$produto);
 		}
 		return $produtos;
	}

	function insereProduto($conexao,$nome,$preco,$descricao,$categoria_id,$usado){
		$query = "insert into produto (nome, preco, descricao, categoria_id, usado) values ('{$nome}', {$preco}, '{$descricao}', {$categoria_id}, {$usado})";
		return mysqli_query($conexao,$query);	
	}

	function removeProduto($conexao,$id){
		$query = "delete from produto where id={$id}";
		return mysqli_query($conexao,$query);
	}

	
	function buscaProduto($conexao,$id){
		$query = "select * from produto where id= {$id}";
		$resultado = mysqli_query($conexao,$query);
		
		return mysqli_fetch_assoc($resultado);
	}
	
	function alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado){
		$query = "update produto set nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}', categoria_id = {$categoria_id}, usado = {$usado} where id = {$id}";
		return mysqli_query($conexao,$query);
	}
		
 ?>