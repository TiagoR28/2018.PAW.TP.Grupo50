<?php
    require_once (realpath(dirname( __FILE__ )) . '/../../Config.php');
    use Config as Conf;
    
require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationModelPath() . 'Funcionario.php');

class FuncionarioManager extends MyDataAccessPDO{
    
    const SQL_TABLE_NAME = 'funcionario';
    
    public function getFuncionarios($convertRecordToObject = false){
        try{
            $results = $this->getRecords(self::SQL_TABLE_NAME, null,
                                            null);
        }catch(Exception $e){
            throw $e;
        }
              
        $list = array();
        if ($convertRecordToObject){
            foreach($results AS $rec){
                // Estamos a assumir que existe um relacionamento entre os atributos do array e os atributos da classe                    
                $list[$rec['id']] = Utente::convertArrayToObject($rec);   
            }
        }else{
            $list = $results;
        }
        
        return $list;
    }
    
    public function getFuncionariosByID($id){
        try{
            return $this->getRecords(self::SQL_TABLE_NAME, array('id' => $id));
        }catch(Exception $e){
            throw $e;
        }
    }
    
    public function createFuncionario(Funcionario $obj){
        try{    
            $this->insert(self::SQL_TABLE_NAME, $obj->convertObjectToArray());
        }catch(Exception $e){
            throw $e;
        }            
    }
}