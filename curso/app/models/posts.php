<?php

namespace app\models;

class posts{

	use \app\traits\mysql;
	private $table='tb_posts';

	public function __construct(){
		$this->tableModel();
	}

	public function buscarPost($busca){
		return \ActiveRecord\Model::find('all',array('conditions'=>array('tb_posts_titulo like CONCAT("%",?,"%") || tb_posts_texto like CONCAT("%",?,"%")',$busca,$busca)));
    }

}