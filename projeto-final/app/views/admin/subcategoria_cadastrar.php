<div id="acoes">
	<a href="/painel" class="btn btn-primary">Voltar para página inicial</a>
</div>

<h3>Subcategorias Cadastradas</h3>
<table class="table table-striped" id="listagem-subcategorias" cellspacing="0">
	<thead>
		<tr style="background-color: #000;color: #FFF;">
			<th>Subcategoria</th>
			<th>Editar</th>
			<th>Deletar</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($subcategorias as $subcategoria): ?>
			<tr>
				<td><?php echo $subcategoria->tb_subcategoria_nome; ?></td>
				<td><a href="/subcategoria/editar/<?php echo $subcategoria->id ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
				<td><a href="#" data-id="<?php echo $subcategoria->id ?>" class="btn-deletar-subcategoria" ><span class="glyphicon glyphicon-remove"></span></a></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<h3>Cadastrar Subcategoria</h3>

<?php echo isset($flash['mensagem']) ? $flash['mensagem'] : ''; ?>

<form action="/subcategoria/admin/cadastrar" method="post" accept-charset="utf-8">
	<div class="form-group">
	    <label for="categoria">Categoria</label>
	   	<select class="form-control" name="categoria">
	    <?php foreach($categorias as $categoria): ?>
	    	<option value="<?php echo $categoria->id; ?>"><?php echo $categoria->tb_categoria_nome; ?></option>
	    <?php endforeach; ?>
	    </select>
	</div>

 	<div class="form-group">
	    <label for="subcategoria">SubCategoria</label>
	    <input type="text" class="form-control" name="subcategoria" placeholder="Subcategoria">

	    <label for="slug">Slug</label>
	    <input type="text" class="form-control" name="slug" placeholder="Subcategoria">
	</div>
	  <button type="submit" class="btn btn-danger">Cadastrar Categoria</button>
</form>




