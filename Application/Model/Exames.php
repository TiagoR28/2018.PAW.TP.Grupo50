<?php
require_once (realpath(dirname( __FILE__ )) . '/../../Config.php');
use Config as Conf;    

class exames {
    
    private $idmedico;
    private $idconsulta;
    private $tipo;
    private $observacoes;
    
    
    public function getidmedico(){
        return $this->idmedico;
    }
    
    public function getidconsulta(){
        return $this->idconsulta;
    }    
    
    public function gettipo(){
        return $this->tipo;
    }  
    
    public function getobservacoes(){
        return $this->observacoes;
    } 

    
    } 
    
    public function setidmedico($value){        
        $this->idmedico = $value;        
    }
    
    public function setidconsulta($value){        
        $this->idconsulta = $value;
    }
    
    public function settipo($value){        
        $this->tipo = $value;
    }    
    
    public function setobservacoes($value){        
        $this->observacoes = $value;
    }   

     

    public function convertObjectToArray(){
        $data = array(  'idmedico' => $this->getidmedico(), 
                        'idconsulta' => $this->getidconsulta(),
                        'tipo' => $this->gettipo(),
                        'observacoes' => $this->getobservacoes();
                               
        
        return $data;
    }
    
    public static function convertArrayToObject(Array &$data){
        return self::createObject($data['idmedico'], $data['idconsulta'], $data['tipo'], $data['observacoes']);
    }    
    
    public static function createObject($idmedico, $idconsulta, $tipo, $observacoes){
        $exames = new exames();
        $exames->setidmedico($idmedico);
        $exames->setidconsulta($idconsulta);
        $exames->settipo($tipo);
        $exames->setobservacoes($observacoes);
       
        
        return $exames;
    }
}
