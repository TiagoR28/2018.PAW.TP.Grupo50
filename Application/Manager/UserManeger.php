<?php

require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationModelPath() . 'User.php');

class UserManeger extends MyDataAccessPDO {

    const SQL_TABLE_NAME = 'users';

    public function getUser($convertRecordToObject = false) {
        try {
            $results = $this->getRecords(self::SQL_TABLE_NAME, null, NULL);
        } catch (Exception $e) {
            throw $e;
        }

        $list = array();
        if ($convertRecordToObject) {
            foreach ($results AS $rec) {
                $list[$rec['Username']] = User::convertArrayToObject($rec);
            }
        } else {
            $list = $results;
        }

        return $list;
    }

    public function getUserByUsername($id) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, array('Username' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function createUser(User $obj) {
        try {
            $this->insert(self::SQL_TABLE_NAME, $obj->convertObjectToArray());
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function updateUser(User $obj) {
        try {
            $this->update(self::SQL_TABLE_NAME, $obj->convertObjectToArray(), array('Username' => $obj->getUsername()));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteUser(User $obj) {
        try {
            $this->delete(self::SQL_TABLE_NAME, array('Username' => $obj->getUsername()));
        } catch (Exception $e) {
            throw $e;
        }
    }

}
