<?php

require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

class Consultas {

    private $Id;
    private $nome;
    private $medico;
    private $func;
    private $estado;
    private $entrada;
    private $saida;
    private $limiteespera;
    private $idHospital;

    function getId() {
        return $this->Id;
    }

    function getNome() {
        return $this->nome;
    }

    function getMedico() {
        return $this->medico;
    }

    function getFunc() {
        return $this->func;
    }

    function getEstado() {
        return $this->estado;
    }

    function getEntrada() {
        return $this->entrada;
    }

    function getSaida() {
        return $this->saida;
    }

    function getLimiteespera() {
        return $this->limiteespera;
    }

    function getIdHospital() {
        return $this->idHospital;
    }

    function setId($Id) {
        $this->Id = $Id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setMedico($medico) {
        $this->medico = $medico;
    }

    function setFunc($func) {
        $this->func = $func;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setEntrada($entrada) {
        $this->entrada = $entrada;
    }

    function setSaida($saida) {
        $this->saida = $saida;
    }

    function setLimiteespera($limiteespera) {
        $this->limiteespera = $limiteespera;
    }

    function setIdHospital($idHospital) {
        $this->idHospital = $idHospital;
    }

    public function convertObjectToArray() {
        $data = array('Id' => $this->getId(),
            'idNome' => $this->getNome(),
            'idFunc' => $this->getFunc(),
            'estado' => $this->getestado(),
            'entrada' => $this->getentrada(),
            'saida' => $this->getsaida(),
            'limiteespera' => $this->getlimiteespera(),
            'idHospital' => $this->getidHospital());

        return $data;
    }

    public static function convertArrayToObject(Array &$data) {
        return self::createObject($data['Id'], $data['nome'], $data['idFunc'], $data['estado'], $data['entrada'], $data['saida'], $data['limiteespera'], $data['idHospital']);
    }

    public static function createObject($id, $nome, $func, $estado, $entrada, $saida, $limiteespera, $idHospital) {
        $obj = new Consultas();

        $obj->setId($id);
        $obj->setNome($nome);
        $obj->setFunc($func);
        $obj->setEstado($estado);
        $obj->setEntrada($entrada);
        $obj->setSaida($saida);
        $obj->setLimiteespera($limiteespera);
        $obj->setIdHospital($idHospital);

        return $obj;
    }

}
