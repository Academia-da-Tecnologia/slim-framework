<div id="acoes">
	<a href="/produto/admin/novo/" class="btn btn-primary">Cadastrar Novo produto</a>
	<a href="/categoria/admin/novo/" class="btn btn-primary">Ver/Cadastrar Nova Categoria</a>
	<a href="/subcategoria/admin/novo" class="btn btn-primary">Ver/Cadastrar Nova Subcategoria</a>
</div>

<div id="listar_produtos">
	<h3>Produtos cadastrados até o momento: (<?php echo $totalProdutos; ?>)</h3>
	<table class="table table-striped" cellspacing="0">
		<thead>
			<tr>
				<th>Produto</th>
				<th>Editar</th>
				<th>Deletar</th>
				<th>Foto</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($produtos as $produto): ?>
				<tr>
					<td><?php echo $produto->tb_produto_nome; ?></td>
					<td><a href="/produto/editar/<?php echo $produto->id; ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
					<td><a href="#" class="btn-deletar-produto" data-id="<?php echo $produto->id; ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
					<td><a href="/produto/admin/foto/<?php echo $produto->id ?>"><span class="glyphicon glyphicon-picture"></span></a></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
		<tfoot>
			<tr style="text-align: center;">
				<td colspan="4"><?php echo $links; ?></td>
			</tr>
		</tfoot>
	</table>
</div>