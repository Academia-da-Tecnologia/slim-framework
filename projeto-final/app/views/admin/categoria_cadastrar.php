<div id="acoes">
	<a href="/painel" class="btn btn-primary">Voltar para página inicial</a>
</div>

<h3>Categorias Cadastradas</h3>
<table class="table table-striped" cellspacing="0">
	<thead>
		<tr style="background-color: #000;color: #FFF;">
			<th>Categoria</th>
			<th>Editar</th>
			<th>Deletar</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($categorias as $categoria): ?>
			<tr>
				<td><?php echo $categoria->tb_categoria_nome; ?></td>
				<td><a href="/categoria/editar/<?php echo $categoria->id ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
				<td><a href="/categoria/deletar/<?php echo $categoria->id ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<h3>Cadastrar categoria</h3>

<?php echo isset($flash['mensagem']) ? $flash['mensagem'] : ''; ?>

<form action="/categoria/cadastrar/" method="post">
	<div class="form-group">
	<label for="nome">Categoria</label>
	    <input type="text" class="form-control" name="categoria" placeholder="Categoria">
	</div>
	<button type="submit" class="btn btn-danger">Cadastrar Categoria</button>
</form>




