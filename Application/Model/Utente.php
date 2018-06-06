<?php
require_once (realpath(dirname( __FILE__ )) . '/../../Config.php');
use Config as Conf;    

class Utente {
    
    private $id;
    private $nome;
    private $idade;
    private $genero;
    private $morada;
    
    public function getId(){
        return $this->id;
    }
    
    public function getNome(){
        return $this->nome;
    }    
    
    public function getIdade(){
        return $this->idade;
    }  
    
    public function getGenero(){
        return $this->genero;
    } 

    public function getMorada(){
        return $this->morada;
    } 
    
    public function setId($value){        
        $this->id = $value;        
    }
    
    public function setNome($value){        
        $this->nome = $value;
    }
    
    public function setIdade($value){        
        $this->idade = $value;
    }    
    
    public function setGenero($value){        
        $this->genero = $value;
    }   

    public function setMorada($value){        
        $this->morada = $value;
    }   

    public function convertObjectToArray(){
        $data = array(  'id' => $this->getId(), 
                        'nome' => $this->getNome(),
                        'idade' => $this->getIdade(),
                        'genero' => $this->getGenero(),
                        'morada' => $this->getMorada());        
        
        return $data;
    }
    
    public static function convertArrayToObject(Array &$data){
        return self::createObject($data['id'], $data['nome'], $data['idade'], $data['genero'], $data['morada']);
    }    
    
    public static function createObject($id, $nome, $idade, $genero, $morada){
        $Utente = new Utente();
        $Utente->setId($id);
        $Utente->setNome($nome);
        $Utente->setIdade($idade);
        $Utente->setGenero($genero);
        $Utente->setMorada($morada);
        
        return $Utente;
    }
}
