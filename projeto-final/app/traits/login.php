<?php

namespace app\traits;

trait login{

	private $campos;
	private $campo;
	private $sqlCampo;

	public function setCampos($campos){
		$this->campos = $campos;
	}

	public function getCampos(){
		return $this->campos;
	}

	public function logar($email,$senha){
		foreach($this->getCampos() as $campo):
			$this->campo.= $campo.'=? and ';
		endforeach;	
		$this->sqlCampo = rtrim($this->campo,'and ');
		return parent::find('first', array('conditions'=> array($this->sqlCampo,$email,$senha)));
	}

	public static function deslogar($sessao){
		if(isset($_SESSION[$sessao])){
			unset($_SESSION[$sessao]);
		}
	}

	public static function estaLogado($sessao,$app){
		if(!isset($_SESSION[$sessao])){
			$app->redirect('/admin');
		}else{
			return true;
		}
	}
}