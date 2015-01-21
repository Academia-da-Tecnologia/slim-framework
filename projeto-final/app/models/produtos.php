<?php

namespace app\models;

class produtos extends \app\models\appModel{
	use \app\traits\pagination;
	static $table_name = 'tb_produto';

	public static function produtosInicio(){
		$join = "inner join tb_categoria on(tb_produto.tb_produto_categoria = tb_categoria.id)";
		return parent::find('all', array('select' => '*', 'joins' => $join, 'limit' => 10, 'order' => 'RAND()'));
	}

}