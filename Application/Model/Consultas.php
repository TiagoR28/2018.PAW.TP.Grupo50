<?php
require_once (realpath(dirname( __FILE__ )) . '/../../Config.php');
use Config as Conf;    

class Consultas {
    
    private $Id;
    private $nome;
    private $observacoes;
    
    public function getId(){
        return $this->Id;
    }
    
    public function getNome(){
        return $this->nome;
    }    
    
    public function getObservacoes(){
        return $this->observacoes;
    }    
    
    public function setId($value){
        $this->Id = $value;        
    }
    
    public function setNome($value){     
        $this->nome = $value;
    }
    
    public function setObservacoes($value){      
        $this->observacoes = $value;
    }    
    

    
    public function convertObjectToArray(){
        $data = array(  'Id' => $this->getId(), 
                        'nome' => $this->getNome(),
                        'observacoes' => $this->getObservacoes());        
        
        return $data;
    }
    
    public static function convertArrayToObject(Array &$data){
        return self::createObject($data['Id'], $data['nome'], $data['observacoes']);
    }    
    
    public static function createObject($id, $nome, $observacoes){
        $obj = new Consultas();
        $obj->setId($id);
        $obj->setNome($nome);
        $obj->setObservacoes($observacoes);
        
        return $obj;
    }
}
