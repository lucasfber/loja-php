<?php 
include("cabecalho.php");
include('banco-categoria.php');

?>
	<h1>Formulário de Produtos</h1>
	<form class="formulario" action="adiciona-produto.php" role="form" method="post">
		<div class="form-group">
			<label for="nome">Nome:</label>
			<input class="form-control"type="text" id="nome" name="nome"></input>
		</div>
		<div class="form-group">
			<label for="preco">Preço:</label>
			<input class="form-control" type="number" step="any" min="0" id="preco" name="preco"></input>
		</div>	
		<div class="form-group">
			<label for="descricao">Descrição:</label>
			<textarea class="form-control" id="descricao" name="descricao"></textarea>
		</div>

		<div class="form-group">
			<label for="categoria_id">Categoria:</label>
			<select class="form-control" name="categoria_id" id="categoria_id">
				<?php foreach(listarCategorias($conexao) as $categoria) : ?>
					<option value="<?=$categoria['id']?>"><?=$categoria['nome']?></option>

				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-group">
			<div class="checkbox">
				<label><input type="checkbox" name="usado" value="true">O Produto é Usado ?</label>
			</div>
		</div>

			<input class="btn btn-primary" type="submit" value="Cadastrar"></input>			
	</form>
<?php include("rodape.php"); ?>