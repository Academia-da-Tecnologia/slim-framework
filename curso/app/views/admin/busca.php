<?php 
if(empty($resultadoBusca)): ?>
Nenhum resultado encontrado
<?php
else:
	foreach($resultadoBusca as $post): ?>
	<h3><?php echo $post->tb_posts_titulo ?></h3>
	<p><?php echo $post->tb_posts_texto; ?></p>
	<?php
	endforeach;
endif;	