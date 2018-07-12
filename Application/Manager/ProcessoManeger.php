<?php
    require_once (realpath(dirname( __FILE__ )) . '/../../Config.php');
    use Config as Conf;
    
require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationModelPath() . 'Processo.php');

class ProcessoManeger extends MyDataAccessPDO {
    const SQL_TABLE_NAME = 'processo';
    
    public function getProcesso($convertRecordToObject = false){
        try{
            $results = $this->getRecords(self::SQL_TABLE_NAME, null, 
                                            NULL);
        }catch(Exception $e){
            throw $e;
        }
              
        $list = array();
        if ($convertRecordToObject){
            foreach($results AS $rec){                
                $list[$rec['Id']] = Processo::convertArrayToObject($rec);   
            }
        }else{
            $list = $results;
        }
        
        return $list;
    }
    
    public function getProcessoByID($id){
        try{
            return $this->getRecords(self::SQL_TABLE_NAME, array('Id' => $id));
        }catch(Exception $e){
            throw $e;
        }
    }
    
    public function createProcesso(Processo $obj){
        try{    
            $this->insert(self::SQL_TABLE_NAME, $obj->convertObjectToArray());
        }catch(Exception $e){
            throw $e;
        }            
    }
    
    public function updateProcesso(Processo $obj){
        try{
            $this->update(self::SQL_TABLE_NAME, $obj->convertObjectToArray(), array('Id' => $obj->getId()));
        }catch(Exception $e){
            throw $e;
        }            
    }    

    public function deleteProcesso(Processo $obj){
        try{
            $this->delete(self::SQL_TABLE_NAME, array('Id' => $obj->getStudentID()));
        }catch(Exception $e){
            throw $e;
        }
    }
}
