<?php
require_once (realpath(dirname( __FILE__ )) . '/../../Config.php');
use Config as Conf;    

class Accoes {
    
    public $IdDossier;
    private $IdProc;
    private $Descricao;
    private $Data;
    private $Solucao;
    
    public function getIdDossier(){
        return $this->IdDossier;
    }
    
    public function getIdProc(){
        return $this->IdProc;
    }    
    
    public function getDescricao(){
        return $this->Descricao;
    }  
    
    public function getData(){
        return $this->Data;
    } 

    public function getSolucao(){
        return $this->Solucao;
    } 
    
    public function setIdDossier($value){        
        $this->IdDossier = $value;        
    }
    
    public function setIdProc($value){        
        $this->IdProc = $value;
    }
    
    public function setDescricao($value){        
        $this->Descricao = $value;
    }    
    
    public function setData($value){        
        $this->Data = $value;
    }   

    public function setSolucao($value){        
        $this->Solucao = $value;
    }   

    public function convertObjectToArray(){
        $data = array(  'IdDossier' => $this->getIdDossier(), 
                        'IdProc' => $this->getIdProc(),
                        'Descricao' => $this->getDescricao(),
                        'Data' => $this->getData(),
                        'Solucao' => $this->getSolucao());        
        
        return $data;
    }
    
    public static function convertArrayToObject(Array &$data){
        return self::createObject($data['IdDossier'], $data['IdProc'], $data['Descricao'], $data['Data'], $data['Solucao']);
    }    
    
    public static function createObject($IdDossier, $IdProc, $Descricao, $Data, $Solucao){
        $Accao = new Accoes();
        
        $Accao->setIdDossier($IdDossier);
        $Accao->setIdProc($IdProc);
        $Accao->setDescricao($Descricao);
        $Accao->setData($Data);
        $Accao->setSolucao($Solucao);
        
        return $Accao;
    }
}
