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
                $list[$rec['IdPro']] = Processo::convertArrayToObject($rec);   
            }
        }else{
            $list = $results;
        }
        
        return $list;
    }
    
    public function getProcessoByID($id){
        try{
            return $this->getRecords(self::SQL_TABLE_NAME, array('IdPro' => $id));
        }catch(Exception $e){
            throw $e;
        }
    }
    
    public function getHistoricoByID($id){
        try{
            return $this->getRecords('processo AS p JOIN accoes AS a ON p.IdPro = a.IdProc JOIN dossier as d ON '
                    . 'd.Id = a.IdDossier JOIN users AS u ON u.Username = p.IdUser', array('IdPro' => $id));
        }catch(Exception $e){
            throw $e;
        }
    }
    
    public function getProcessoByEstado($estado){
        try{
            return $this->getRecords(self::SQL_TABLE_NAME, array('Estado' => $estado));
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
            $this->update(self::SQL_TABLE_NAME, $obj->convertObjectToArray(), array('IdPro' => $obj->getId()));
        }catch(Exception $e){
            throw $e;
        }            
    }    

    public function deleteProcesso(Processo $obj){
        try{
            $this->delete(self::SQL_TABLE_NAME, array('IdPro' => $obj->getStudentID()));
        }catch(Exception $e){
            throw $e;
        }
    }
}
