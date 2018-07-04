<?php
    require_once (realpath(dirname( __FILE__ )) . '/../../Config.php');
    use Config as Conf;
    
require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationModelPath() . 'Departamentos.php');

class DepartamentoManager extends MyDataAccessPDO{
    
    const SQL_TABLE_NAME = 'departamento';
    
    public function getDepartamentos($convertRecordToObject = false){
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
                $list[$rec['Id']] = Utente::convertArrayToObject($rec);   
            }
        }else{
            $list = $results;
        }
        
        return $list;
    }
    
    public function getDepartamentosByID($id){
        try{
            return $this->getRecords(self::SQL_TABLE_NAME, array('Id' => $id));
        }catch(Exception $e){
            throw $e;
        }
    }
    
    public function createConsulta(Departamento $obj){
        try{    
            $this->insert(self::SQL_TABLE_NAME, $obj->convertObjectToArray());
        }catch(Exception $e){
            throw $e;
        }            
    }
}
