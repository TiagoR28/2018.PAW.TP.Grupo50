<?php
require_once (realpath(dirname( __FILE__ )) . '/../../Config.php');
    use Config as Conf;
    
require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationModelPath() . 'Accoes.php');

class AcccoesManeger extends MyDataAccessPDO {
    
    const SQL_TABLE_NAME = 'accoes';
    
    public function getAccoes($convertRecordToObject = false){
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
                $list[$rec['IdDossier']] = Accoes::convertArrayToObject($rec);   
            }
        }else{
            $list = $results;
        }
        
        return $list;
    }
    
    public function getAccoesByIDDossier($id){
        try{
            return $this->getRecords(self::SQL_TABLE_NAME, array('IdDossier' => $id));
        }catch(Exception $e){
            throw $e;
        }
    }
    
    public function getAccoesByIDProc($id){
        try{
            return $this->getRecords(self::SQL_TABLE_NAME, array('IdProc' => $id));
        }catch(Exception $e){
            throw $e;
        }
    }
    
    public function createAccoes(Accoes $obj){
        try{    
            $this->insert(self::SQL_TABLE_NAME, $obj->convertObjectToArray());
        }catch(Exception $e){
            throw $e;
        }            
    }
    
    public function updateAccoes(Accoes $obj){
        try{
            $this->update(self::SQL_TABLE_NAME, $obj->convertObjectToArray(), array('IdDossier' => $obj->getIdDossier(), 'IdProc' => $obj->getIdProc()));
        }catch(Exception $e){
            throw $e;
        }            
    }    

    public function deleteAccoes(Accoes $obj){
        try{
            $this->delete(self::SQL_TABLE_NAME, array('IdDossier' => $obj->getIdDossier(), 'IdProc' => $obj->getIdProc()));
        }catch(Exception $e){
            throw $e;
        }
    }
}
