<?php

namespace app\models;

class menu{

	private $menu;
	private $categorias;

	public function __construct(){
		$this->categorias = \app\models\categoria::listar();
	}

	private function listarMenuLateral(){
		$this->menu = '<ul>';
		$this->menu.= '<li><a href="/">Início</a></li>';
			foreach ($this->categorias as $categoria):
				$this->menu.= '<li>';
				$this->menu.= $categoria->tb_categoria_nome;
				$this->menu.= '<ul>';
					foreach (\app\models\subcategoria::where('tb_subcategoria_categoria',$categoria->id,'all') as $subcategoria):
						$this->menu.= '<li class="li-subcategoria">';
						$this->menu.= '<a href="/subcategoria/'. $subcategoria->tb_subcategoria_slug. '">'.$subcategoria->tb_subcategoria_nome.'</a>';
						$this->menu.= '</li>';
					endforeach;
				$this->menu.= '</ul>';
				$this->menu.= '</li>';
			endforeach;
		$this->menu.= '</ul>';
		return $this->menu;
	}

	public function exibirMenuLateral(){
		return $this->listarMenuLateral();
	}

}
