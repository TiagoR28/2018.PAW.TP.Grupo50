<?php

require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

class User {

    private $Username;
    private $Password;
    private $Nome;
    private $Tipo;

    public function getUsername() {
        return $this->Username;
    }

    public function getPassword() {
        return $this->Password;
    }

    public function getNome() {
        return $this->Nome;
    }

    public function getTipo() {
        return $this->Tipo;
    }

    public function setUsername($value) {
        $this->Username = $value;
    }

    public function setPassword($value) {
        $this->Password = $value;
    }

    public function setNome($value) {
        $this->Nome = $value;
    }

    public function setTipo($value) {
        $this->Tipo = $value;
    }

    public function convertObjectToArray() {
        $data = array('Username' => $this->getUsername(),
            'Password' => $this->getPassword(),
            'Nome' => $this->getNome(),
            'Tipo' => $this->getTipo());

        return $data;
    }

    public static function convertArrayToObject(Array &$data) {
        return self::createObject($data['Username'], $data['Password'], $data['Nome'], $data['Tipo']);
    }

    public static function createObject($Username, $Password, $Nome, $Tipo) {
        $obj = new Users();
        $obj->setUsername($Username);
        $obj->setPassword($Password);
        $obj->setNome($Nome);
        $obj->setTipo($Tipo);

        return $obj;
    }

}
