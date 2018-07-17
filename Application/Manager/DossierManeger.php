<?php
    require_once (realpath(dirname( __FILE__ )) . '/../../Config.php');
    use Config as Conf;
    
require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationModelPath() . 'Dossier.php');

class DossierManeger extends MyDataAccessPDO {
    const SQL_TABLE_NAME = 'dossier';
    
    public function getDossier($convertRecordToObject = false){
        try{
            $results = $this->getRecords(self::SQL_TABLE_NAME, null, 
                                            null);
        }catch(Exception $e){
            throw $e;
        }
              
        $list = array();
        if ($convertRecordToObject){
            foreach($results AS $rec){                                 
                $list[$rec['Id']] = Dossier::convertArrayToObject($rec);   
            }
        }else{
            $list = $results;
        }
        
        return $list;
    }
    
    public function getDossierByID($id){
        try{
            return $this->getRecords(self::SQL_TABLE_NAME, array('Id' => $id));
        }catch(Exception $e){
            throw $e;
        }
    }
    
    public function getListAlunos($nome) {
        try {
            return $this->getRecords('dossier AS d JOIN accoes AS a ON a.IdDossier = d.Id', array('Nome' => $nome));
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function createDossier(Dossier $obj){
        try{    
            $this->insert(self::SQL_TABLE_NAME, $obj->convertObjectToArray());
        }catch(Exception $e){
            throw $e;
        }            
    }
    
    public function updateDossier(Dossier $obj){
        try{
            $this->update(self::SQL_TABLE_NAME, $obj->convertObjectToArray(), array('Id' => $obj->getId()));
        }catch(Exception $e){
            throw $e;
        }            
    }    

    public function deleteDossier(Dossier $obj){
        try{
            $this->delete(self::SQL_TABLE_NAME, array('Id' => $obj->getId()));
        }catch(Exception $e){
            throw $e;
        }
    }
}
