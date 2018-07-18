<?php

require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

class Processo {

    private $Id;
    private $IdUser;
    private $Problema;
    private $Estado;
    private $Criacao;
    private $Limite;
    

    function getId() {
        return $this->Id;
    }

    function getIdUser() {
        return $this->IdUser;
    }

    function getProblema() {
        return $this->Problema;
    }

    function getEstado() {
        return $this->Estado;
    }

    function getCriacao() {
        return $this->Criacao;
    }

    function getLimite() {
        return $this->Limite;
    }

    
    function setId($Id) {
        $this->Id = $Id;
    }

    function setIdUser($IdUser) {
        $this->IdUser = $IdUser;
    }

    function setProblema($Problema) {
        $this->Problema = $Problema;
    }

    function setEstado($Estado) {
        $this->Estado = $Estado;
    }


    function setCriacao($Criacao) {
        $this->Criacao = $Criacao;
    }

    function setLimite($Limite) {
        $this->Limite = $Limite;
    }

  
    public function convertObjectToArray() {
        $data = array('IdPro' => $this->getId(),
            'IdUser' => $this->getIdUser(),
            'Problema' => $this->getProblema(),
            'Estado' => $this->getEstado(),
            'Criacao' => $this->getCriacao(),
            'Limite' => $this->getLimite());

        return $data;
    }

    public static function convertArrayToObject(Array &$data) {
        return self::createObject($data['IdPro'], $data['IdUser'], $data['Problema'], $data['Estado'], $data['Criacao'], $data['Limite']);
    }

    public static function createObject($Id, $IdUser, $Problema, $Estado, $Criacao, $Limite) {
        $obj = new Processo();

        $obj->setId($Id);
        $obj->setIdUser($IdUser);
        $obj->setProblema($Problema);
        $obj->setEstado($Estado);
        $obj->setCriacao($Criacao);
        $obj->setLimite($Limite);
        
        return $obj;
    }

}
