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
        if (!MyValidations::isString($value)){
            throw new Exception ('tem que ser uma String...');
        }        
        
        $this->Id = $value;        
    }
    
    public function setNome($value){
        if (!MyValidations::isString($value)){
            throw new Exception ('tem que ser uma String...');
        }
        
        $this->Nome = $value;
    }
    
    public function setNascimento($value){
        if (!MyValidations::isString($value)){
            throw new Exception ('tem que ser uma String...');
        }
        
        $this->Nascimento = $value;
    }    
    
    public function setContactoEnc($value){
        if (!MyValidations::isString($value)){
            throw new Exception ('tem que ser uma String...');
        }
        
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
        return self::createObject($data['Id'], $data['Nome'],  $data['Nascimento'] , $data['ContactoEnc']);
    }    
    
    public static function createObject($Id, $Nome, $Nascimento, $ContatoEnc){
        $dossier = new Dossier();
        $dossier->setId($Id);
        $dossier->setNome($Nome);
        $dossier->setNascimento($Nascimento);
        $dossier->setContatoEnc($ContatoEnc);
        
        return $dossier;
    }
}
