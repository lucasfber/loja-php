<?php 
include("cabecalho.php");
include("conecta.php"); 
include("banco-produto.php"); 

if(array_key_exists("removido",$_GET) && $_GET['removido'] == true){

?>
	<p class="alert-success">Produto removido com sucesso!</p>	
<?php 	
}

$produtos = listarProdutos($conexao);
?>
<h2>Tabela de Produtos Adicionados</h2>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Preço</th>
			<th>Descrição</th>
			<th>Categoria</th>
			<th>Usado</th>
			<th>Alterar Produto</th>
			<th>Remover Produto</th>
		</tr>
	</thead>
<?php 
	foreach ($produtos as $produto):
 ?>
	<tr>
		<td><?= $produto['nome'] ?></td>
		<td>R$ <?= $produto['preco'] ?></td>
		<td><?= substr($produto['descricao'],0,40) ?></td>
		<td><?= $produto['categoria_nome'] ?></td>
		<td>
			<?php if($produto['usado'] == true){ ?>
			 	Sim

			<?php } else{ ?>
				Não
			<?php } ?>
		</td>
		<td>
			<a class="btn btn-primary" href="formulario-altera-produto.php?id=<?=$produto['id']?>">Alterar Produto</a>
		</td>
		<td>
			<form action="remove-produto.php" method="post" > 
			<input name="id" type="text" hidden="true" value="<?= $produto['id'] ?>"></input>
			<button class="btn btn-danger">Remover</button>
		</form>	
		</td>
		
	</tr>

<?php endforeach ?>
</table>


<?php
include("rodape.php"); 
?>