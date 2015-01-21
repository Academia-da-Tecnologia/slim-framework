<?php

namespace app\models;

class administrador{

	use \app\traits\mysql;

	private $table = 'tb_administrador';

	public function __construct(){
		$this->tableModel();
	}

	public function logar($login,$senha){
		$administradorEncontrado=\ActiveRecord\Model::find('first', array('conditions' => array('tb_administrador_login=? and tb_administrador_senha=?',$login,$senha)));
		return $administradorEncontrado;

	}

}