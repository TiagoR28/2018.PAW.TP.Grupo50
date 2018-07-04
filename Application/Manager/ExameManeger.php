<?php
    require_once (realpath(dirname( __FILE__ )) . '/../../Config.php');
    use Config as Conf;
    
require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationModelPath() . 'Exames.php');

class ExameManager extends MyDataAccessPDO{
    
    const SQL_TABLE_NAME = 'exames';
    /*
    public function getConsultas($convertRecordToObject = false){
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
    }*/
    
    public function getExamesByMedic($id){
        try{
            return $this->getRecords(self::SQL_TABLE_NAME, array('idMedico' => $id));
        }catch(Exception $e){
            throw $e;
        }
    }

    public function getExamesByConsulta($id){
        try{
            return $this->getRecords(self::SQL_TABLE_NAME, array('idConsulta' => $id));
        }catch(Exception $e){
            throw $e;
        }
    }
    
    public function createExame(Exames $obj){
        try{    
            $this->insert(self::SQL_TABLE_NAME, $obj->convertObjectToArray());
        }catch(Exception $e){
            throw $e;
        }            
    }
}
