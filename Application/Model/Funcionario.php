<?php
require_once (realpath(dirname( __FILE__ )) . '/../../Config.php');
use Config as Conf;    

class Funcionario {
    
    private $id;
    private $nome;
    private $tipo;
    private $password;
    private $genero;
    private $morada;
    
    public function getId(){
        return $this->id;
    }
    
    public function getNome(){
        return $this->nome;
    }    
    
    public function gettipo(){
        return $this->tipo;
    }  
    
    public function getPassword(){
        return $this->password;
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
    
    public function settipo($value){        
        $this->tipo = $value;
    }    

    public function setPassword($value){        
        $this->password = $value;
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
                        'tipo' => $this->gettipo(),
                        'password' => $this->getPassword(),
                        'genero' => $this->getGenero(),
                        'morada' => $this->getMorada());        
        
        return $data;
    }
    
    public static function convertArrayToObject(Array &$data){
        return self::createObject($data['id'], $data['nome'], $data['tipoFunc'], $data['password'], $data['genero'], $data['morada']);
    }    
    
    public static function createObject($id, $nome, $tipo, $password, $genero, $morada){
        $Funcionario = new Funcionario();
        $Funcionario->setId($id);
        $Funcionario->setNome($nome);
        $Funcionario->settipo($tipo);
        $Funcionario->setPassword($password);
        $Funcionario->setGenero($genero);
        $Funcionario->setMorada($morada);
        
        return $Funcionario;
    }
}
