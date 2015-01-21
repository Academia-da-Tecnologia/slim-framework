<?php

namespace app\models;

class administrador extends \app\models\appModel{
	use \app\traits\login;
	static $table_name = 'tb_administrador';

	//public function logar($email,$senha){
		//$administradorEncontrado = parent::find('first', array('conditions' => array('tb_administrador_email=? and tb_administrador_senha=?',$email,$senha)));
		//return $administradorEncontrado;
	//}

}