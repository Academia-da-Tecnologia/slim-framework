<?php

namespace app\classes;

class login{

	public static function verificaLogin($nomeSessao,$app){
		if(!isset($_SESSION[$nomeSessao])){
			$app->redirect('/admin');
		}
	}

}