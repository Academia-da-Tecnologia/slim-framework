<div id="acoes">
    <button type="button" class="btn btn-primary"><a href="/painel/" style="color: #FFF;">Voltar Lista Produtos</a></button>
</div>

<h2>Editar subcategoria</h2>

<?php echo isset($flash['mensagem']) ? $flash['mensagem'] : ''; ?>

<form action="/subcategoria/atualizar/" method="post">
    <input type="hidden" name="id" value="<?php echo $subcategoria->id; ?>">

    <div class="form-group">
        <label for="categoria">Categoria</label>
        <select name="categoria" class="form-control">

            <?php foreach($categorias as $categoria): ?>
                <option value="<?php echo $categoria->id ?>" <?php echo ($categoria->id == $subcategoria->tb_subcategoria_categoria ) ? " selected='selected' " : ''; ?> ><?php echo $categoria->tb_categoria_nome; ?> </option>
            <?php endforeach; ?>

        </select>
    </div>

    <div class="form-group">
        <label for="Subcategoria">Subcategoria</label>
        <input type="text" class="form-control" name="subcategoria" value="<?php echo $subcategoria->tb_subcategoria_nome; ?>">
    </div>
    
    <label></label>
    <input type="submit" value="Atualizar" class="btn btn-primary">
</form>