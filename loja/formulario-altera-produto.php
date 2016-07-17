<?php 
include("cabecalho.php");
include("conecta.php");
include('banco-categoria.php');
include('banco-produto.php');

$id = $_GET['id'];
$produto = buscaProduto($conexao,$id);
$usado = $produto['usado'] ? "checked='checked'" : "";
?>
	
	<h1>Alterando Produto</h1>
	<form class="formulario" action="altera-produto.php" role="form" method="post">
		<input type="text" name="id" hidden="true" value="<?= $produto['id'] ?>">
		<div class="form-group">
			<label for="nome">Nome:</label>
			<input class="form-control"type="text" id="nome" name="nome" value="<?=$produto['nome']?>"></input>
		</div>
		<div class="form-group">
			<label for="preco">Preço:</label>
			<input class="form-control" type="number" step="any" min="0" id="preco" name="preco" value="<?=$produto['preco']?>"></input>
		</div>	
		<div class="form-group">
			<label for="descricao">Descrição:</label>
			<textarea class="form-control" id="descricao" name="descricao"><?= $produto['descricao'] ?></textarea>
		</div>

		<div class="form-group">
			<label for="categoria_id">Categoria:</label>
			<select class="form-control" name="categoria_id" id="categoria_id">
				<?php foreach(listarCategorias($conexao) as $categoria) : 
					$categoriaProduto = $produto['categoria_id'] == $categoria['id'];
					$selecao = $categoriaProduto ? "selected='selected'" : "";
				?>
					<option value="<?=$categoria['id']?>" <?= $selecao?>><?=$categoria['nome']?></option>

				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-group">
			<div class="checkbox">
				<label><input type="checkbox" name="usado" <?= $usado ?> value="true">O Produto é Usado ?</label>
			</div>
		</div>

			<input class="btn btn-primary" type="submit" value="Alterar"></input>			
	</form>
<?php include("rodape.php"); ?>