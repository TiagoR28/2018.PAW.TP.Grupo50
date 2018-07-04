<?php

/**
 * Description of Maneger
 *
 * @author hugo_
 */
class historico {
    private $idDepartamento;
    private $idConsulta;
    private $idFunc;
    private $entrada;
    private $saida;

    function getIdDepartamento() {
        return $this->idDepartamento;
    }

    function getIdConsulta() {
        return $this->idConsulta;
    }

    function getIdFunc() {
        return $this->idFunc;
    }

        function getEntrada() {
        return $this->entrada;
    }

    function getSaida() {
        return $this->saida;
    }

    function setIdDepartamento($idDepartamento) {
        $this->idDepartamento = $idDepartamento;
    }

    function setIdConsulta($idConsulta) {
        $this->idConsulta = $idConsulta;
    }
    
    function setIdFunc($idFunc) {
        $this->idFunc = $idFunc;
    }

    function setEntrada($entrada) {
        $this->entrada = $entrada;
    }

    function setSaida($saida) {
        $this->saida = $saida;
    }    
    
    public function convertObjectToArray(){
        $data = array(  'idDepartamento' => $this->getIdDepartamento(), 
                        'idConsulta' => $this->getIdConsulta(),
                        'idFunc' => $this->getIdConsulta(),
                        'entrada' => $this->getEntrada(),
                        'saida' => $this->getSaida());        
        
        return $data;
    }
    
    public static function convertArrayToObject(Array &$data){
        return self::createObject($data['idDepartamento'], $data['idConsulta'], $data['idFunc'], $data['entrada'], $data['saida']);
    }    
    
    public static function createObject($entrada, $idcons, $idDep, $saida, $idFunc){
        $obj = new historico();
        
        $obj->setEntrada($entrada);
        $obj->setIdConsulta($idcons);
        $obj->setIdDepartamento($idDep);
        $obj->setSaida($saida);
        $obj->setIdFunc($idFunc);
        
        return $obj;
    }
}
