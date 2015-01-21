<div id="acoes">
    <button type="button" class="btn btn-primary"><a href="/painel/" style="color: #FFF;">Voltar Lista Produtos</a></button>
</div>

<div id="foto-cadastrada">
    
    <h3>Foto cadastrada do produto</h3>
    <?php if(empty($produto->tb_produto_foto)): ?>
        Nenhuma foto encontrada
    <?php else: ?>
        <img src="<?php echo site_url().'/'.$produto->tb_produto_foto; ?>" class="img-rounded" width="200" height="160" />
    <?php endif; ?>  
    <br /> 
    <br /> 
    <div>
        <a href="/produto/admin/foto/<?php echo $produto->id; ?>" class="btn btn-primary">Quero alterar essa foto</a>
    </div>

</div>

<div id="form-editar-produto">
    <?php echo isset($flash['mensagem']) ? $flash['mensagem']: ''; ?>

    <h3>Alterar dados do produto</h3>
    
    <form role="form" action="/produto/atualizar/" method="POST">
            
        <div class="form-group">
            <label for="nome">Nome Produto:</label>
            <input type="hidden" name="id" value="<?php echo $produto->id; ?>">
            <input type="text" class="form-control" name="nome" value="<?php echo isset($produto->tb_produto_nome ) ? $produto->tb_produto_nome : '';  ?>">
        </div>
        <div class="form-group">
            <label for="nome">Categoria Produto:</label>
            <select class="form-control" name="categoria">
                  <?php foreach( $categorias as $categoria ): ?>
                        <option value=" <?php echo $categoria->id; ?>" <?php echo ($categoria->id == $produto->tb_produto_categoria )? "selected = 'selected'" : ''; ?>>
                        <?php echo $categoria->tb_categoria_nome; ?>
                        </option>
                  <?php endforeach; ?>  
            </select>
        </div>
        <div class="form-group">
            <label for="nome">Subcategoria Produto:</label>
                <select class="form-control" name="subcategoria">
                  <?php foreach( $subcategorias as $subcategoria ): ?>
                        <option value=" <?php echo $subcategoria->id; ?>" <?php echo ($subcategoria->id == $produto->tb_produto_subcategoria )? "selected = 'selected'" : ''; ?>>
                        <?php echo $subcategoria->tb_subcategoria_nome; ?>
                        </option>
                  <?php endforeach; ?>  
                </select>
        </div>
        <div class="form-group">
            <label for="nome">Preço</label>
            <input type="text" class="form-control" name="preco" id="input-medium" value="<?php echo isset($produto->tb_produto_preco ) ? number_format($produto->tb_produto_preco,2) : '';  ?>">
        </div>

        <div class="form-group">
            <label for="nome">Link</label>
            <input type="text" class="form-control" name="link" value="<?php echo isset($produto->tb_produto_link ) ? $produto->tb_produto_link : '';  ?>">
        </div>

        <div class="form-group">
            <label for="nome">Slug</label>
            <input type="text" class="form-control" name="slug" value="<?php echo isset($produto->tb_produto_slug ) ? $produto->tb_produto_slug : '';  ?>">
        </div>

         <div class="form-group">
            <label for="preco">Descrição</label>
            <textarea name="descricao"><?php echo isset($produto->tb_produto_descricao) ? $produto->tb_produto_descricao : '';  ?>
            </textarea>
        </div>
        <button type="submit" class="btn btn-danger">Alterar Produto</button>
    </form>

</div>