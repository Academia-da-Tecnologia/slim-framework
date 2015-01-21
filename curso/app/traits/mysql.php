<?php

namespace app\traits;

trait mysql{

	private $dataArray=array();
	private $database;

	public function tableModel(){
		\ActiveRecord\Model::$table_name = $this->table;
	}

	public function listar(){
		return \ActiveRecord\Model::find('all');
	}

	public function deletar($id){
		$deletar=\ActiveRecord\Model::find($id);
		$deletar->delete();
	}

	public function cadastrar($attributes){
		\ActiveRecord\Model::create($attributes);
	}

	public function pegar_pelo_id($id){
		return \ActiveRecord\Model::find($id);
	}

	public function atualizar($id, $attributes) {
        $atualizar = \ActiveRecord\Model::find($id);
        $atualizar->update_attributes($attributes);
    }

    public function toJson($returnedData){

    	if(count($returnedData) > 0){
			foreach ($returnedData as $data):
	            array_push($this->dataArray, $data->to_array());
	        endforeach;
	        return json_encode($this->dataArray);
    	}else{
    		return json_encode($returnedData->to_array());
    	}
        
    }

}