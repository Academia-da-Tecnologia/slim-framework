<?php

namespace app\classes;

class imagem{

	private $novoNome;
	private $uploadImagem;

	public function renomear($foto){
		$explodeFoto = explode('.',$foto);
		$extensao = end($explodeFoto);
		$this->novoNome = uniqid().'.'.$extensao;
		return $this->novoNome;
	}

	public static function deletar($imagem){
		if(file_exists($_SERVER['DOCUMENT_ROOT'].$imagem)):
			@unlink($_SERVER['DOCUMENT_ROOT'].$imagem);
		endif;	
	}

	public function upload($wide,$pasta,$largura,$altura){
		$this->uploadImagem = $wide->resize($largura,$altura,'fill');
		$this->uploadImagem->savetofile($_SERVER['DOCUMENT_ROOT'].'public/'.$pasta.'/'.$this->novoNome);
	}

	public static function isImage($foto){
		$extensoesAceitas = array('jpeg','jpg','png');
		$explodeFoto = explode('.',$foto);
		$extensao = end($explodeFoto);

		if(in_array($extensao, $extensoesAceitas)):
			return true;
		else:	
			return false;
		endif;	
	}
}