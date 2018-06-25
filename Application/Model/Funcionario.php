<?php

require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

class Funcionario {

    private $id;
    private $nome;
    private $tipo;
    private $password;
    private $genero;
    private $morada;

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getPassword() {
        return $this->password;
    }

    function getGenero() {
        return $this->genero;
    }

    function getMorada() {
        return $this->morada;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }

    function setMorada($morada) {
        $this->morada = $morada;
    }

    public function convertObjectToArray() {
        $data = array('id' => $this->getId(),
            'nome' => $this->getNome(),
            'tipoFunc' => $this->gettipo(),
            'password' => $this->getPassword(),
            'genero' => $this->getGenero(),
            'morada' => $this->getMorada());

        return $data;
    }

    public static function convertArrayToObject(Array &$data) {
        return self::createObject($data['id'], $data['nome'], $data['tipoFunc'], $data['password'], $data['genero'], $data['morada']);
    }

    public static function createObject($id, $nome, $tipo, $password, $genero, $morada) {
        $Funcionario = new Funcionario();

        $Funcionario->setId($id);
        $Funcionario->setNome($nome);
        $Funcionario->setTipo($tipo);
        $Funcionario->setPassword($password);
        $Funcionario->setGenero($genero);
        $Funcionario->setMorada($morada);

        return $Funcionario;
    }

}
