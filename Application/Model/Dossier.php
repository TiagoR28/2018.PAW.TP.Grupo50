<?php
require_once (realpath(dirname( __FILE__ )) . '/../../Config.php');
use Config as Conf;    

require_once (Conf::getApplicationUtilsPath() . 'Validations.php');
use Validations as MyValidations;

class Dossier {
    
    private $Id;
    private $Nome;
    private $Nascimento;
    private $ContatoEnc;
    
    public function getId(){
        return $this->Id;
    }
    
    public function getNome(){
        return $this->Nome;
    }    
    
    public function getNascimento(){
        return $this->Nascimento;
    }    
    
    public function getContatoEnc(){
        return $this->ContatoEnc;
    }    
    
    public function setId($value){
        $this->Id = $value;        
    }
    
    public function setNome($value){
        $this->Nome = $value;
    }
    
    public function setNascimento($value){
        $this->Nascimento = $value;
    }    
    
    public function setContactoEnc($value){               
        $this->ContatoEnc = $value;
    }    
    

    
    public function convertObjectToArray(){
        $data = array(  'Id' => $this->getId(), 
                        'Nome' => $this->getNome(),
                       'Nascimento' => $this->getNascimento(),
                        'ContatoEnc' => $this->getContatoEnc());        
        
        return $data;
    }
    
    public static function convertArrayToObject(Array &$data){
        return self::createObject($data['Id'], $data['Nome'],  $data['Nascimento'] , $data['ContatoEnc']);
    }    
    
    public static function createObject($Id, $Nome, $Nascimento, $ContatoEnc){
        $dossier = new Dossier();
        $dossier->setId($Id);
        $dossier->setNome($Nome);
        $dossier->setNascimento($Nascimento);
        $dossier->setContactoEnc($ContatoEnc);
        
        return $dossier;
    }
}
