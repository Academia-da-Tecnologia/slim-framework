<?php

namespace app\classes;

class validation{

	public $errors=array();
	private $model;

	public function __construc(appModel $model){
		$this->model = $model;
	}

	public function validar($data,$validacoes){
		$valido=true;
		foreach($validacoes as $key=>$value){
			$explodeBarra=explode('|', $value);
			foreach($explodeBarra as $metodo){
				$parametros = explode('=',$metodo);
				$numero=isset($parametros[1]) ? $parametros[1] : null;
				$post=isset($data[$key]) ? $data[$key] : NULL;
				if(!$this->$parametros[0]($post,$key,$numero)){
					$valido=false;
				}
			}
		}
		return $valido;
	}

	public function obrigatorio($post,$fieldName){
		$valido=true;
		if(empty($post)){
			$valido=false;
			$this->errors[]='O campo '.$fieldName.' não pode ficar em branco';
		}
		return $valido;
	}

	public function email($post,$fieldName){
		$valido=true;
		if(!filter_var($post,FILTER_VALIDATE_EMAIL)){
			$this->errors[]='Digite um e-mail válido no campo '.$fieldName;
			$valido=false;
		}
		return $valido;
	}

	public function cep($post,$fieldName){
		$valido=false;
		$er='/^[0-9]{5}\-[0-9]{3}$/';
		if(preg_match($er,$post)){
			$valido=true;
		}
		return $valido;
	}

   public function maxlength($valor, $fieldName, $paramentros = NULL) {
        if (strlen($valor) < $paramentros):
            $valido = false;
            $this->errors[] = 'O campo ' . strtoupper($fieldName) . ' deve ter no máximo ' . $paramentros . ' caracteres.';
        else:
            $valido = true;
        endif;
        return $valido;
    }

     public function unique($valor, $fieldName,$parametros=null) {
        $dados = explode('.', $paramentros);
        $lixo1 = $this->model->metodoVerificarRegistroVindoDoModelAppModel($dados[0],$dados[1]);
        if (count($lixo1) > 0):
            $valido = false;
            $this->errors[] = 'O campo ' . strtoupper($fieldName) . ' esta com o valor duplicado.';
        else:
            $valido = true;
        endif;
    }


	public function mostrarErros(){
		$erros=$this->errors;
		$html= '<ul id="listar-erros">';
		foreach ($erros as $erro) {
			$html.= '<li class="erro">'.$erro.'</li>';
		}
		$html.= '</ul>';
		return $html;
	}
}