<?php
require_once (realpath(dirname( __FILE__ )) . '/../../Config.php');
use Config as Conf;    

class Departamento {
    
    private $id;
    private $nome;
    private $observacoes;
    
    public function getid(){
        return $this->id;
    }
    
    public function getnome(){
        return $this->nome;
    }    
    
    public function getobservacoes(){
        return $this->observacoes;
    }    
    
    public function setid($value){
        $this->id = $value;        
    }
    
    public function setnome($value){     
        $this->nome = $value;
    }
    
    public function setobservacoes($value){      
        $this->observacoes = $value;
    }    
    

    
    public function convertObjectToArray(){
        $data = array(  'id' => $this->getid(), 
                        'nome' => $this->getnome(),
                        'observacoes' => $this->getobservacoes());        
        
        return $data;
    }
    
    public static function convertArrayToObject(Array &$data){
        return self::createObject($data['id'], $data['nome'], $data['observacoes']);
    }    
    
    public static function createObject($id, $nome, $observacoes){
        $obj = new Departamento();
        $obj->setId($id);
        $obj->setNome($nome);
        $obj->setObservacoes($observacoes);
        
        return $obj;
    }
}
