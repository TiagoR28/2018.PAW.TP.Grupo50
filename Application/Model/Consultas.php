<?php
require_once (realpath(dirname( __FILE__ )) . '/../../Config.php');
use Config as Conf;    

class Consultas {
    
    private $Id;
    private $nome;
    private $medico;
    private $estado;
    private $entrada;
    private $saida;
    private $limiteespera;
    private $idHospital;
    
    public function getId(){
        return $this->Id;
    }
    
    public function getNome(){
        return $this->nome;
    }    
    
    public function getestado(){
        return $this->estado;
    }    
    public function getentrada(){
        return $this->entrada;

    }   public function getsaida(){
        return $this->saida;

    }   public function getlimiteespera(){
        return $this->limiteespera;

    }   public function getidHospital(){
        return $this->idHospital;
    }   
    public function setId($value){
        $this->Id = $value;        
    }
    
    public function setNome($value){     
        $this->nome = $value;
    }
    
    public function setestado($value){      
        $this->estado = $value;
    }
    public function setentrada($value){      
        $this->entrada = $value;
    }    
    public function setsaida($value){      
        $this->saida = $value;
    }
    public function setlimiteespera($value){      
        $this->limiteespera = $value;
    }      
    public function setidHospital($value){      
        $this->idHospital = $value;
    }  
    

    
    public function convertObjectToArray(){
        $data = array(  'Id' => $this->getId(), 
                        'nome' => $this->getNome(),
                        'estado' => $this->getestado()), 
                        'entrada' => $this->getentrada()),
                        'saida' => $this->getsaida()),
                        'limiteespera' => $this->getlimiteespera()),
                        'idHospital' => $this->getidHospital()); 
        
        return $data;
    }
    
    public static function convertArrayToObject(Array &$data){
        return self::createObject($data['Id'], $data['nome'], $data['estado'],$data['entrada'],$data['saida'],$data['limiteespera'],$data['idHospital']);
    }    
    
    public static function createObject($id, $nome, $estado, $entrada, $saida, $limiteespera, $idHospital){
        $obj = new Consultas();
        $obj->setId($id);
        $obj->setNome($nome);
        $obj->setObservacoes($estado);
        $obj->setNome($entrada);
        $obj->setNome($saida);
        $obj->setNome($limiteespera);
        $obj->setNome($idHospital);   


        
        return $obj;
    }
}
