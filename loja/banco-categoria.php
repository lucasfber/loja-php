<?php 
include ('conecta.php');	

function listarCategorias($conexao){
	$categorias = array();
	$query = "select * from categoria";

	$resultados = mysqli_query($conexao,$query);

	while($categoria = mysqli_fetch_assoc($resultados)){
		array_push($categorias,$categoria);
	}

	return $categorias;
}
 
 ?>
