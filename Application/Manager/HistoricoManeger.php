<?php

 require_once (realpath(dirname( __FILE__ )) . '/../../Config.php');
    use Config as Conf;
    
require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');

/**
 * Description of HistoricoManeger
 *
 * @author hugo_
 */
class HistoricoManeger extends MyDataAccessPDO{
    const SQL_TABLE_NAME = 'historico';
    
    
    public function getUtentesByEstado($id){
        try{
            return $this->getRecords('departamento AS d JOIN historico as h ON d.Id = h.idDepartamento Join consulta AS c ON h.idConsulta = c.Id', 
                    array('idNome' => $id));
        }catch(Exception $e){
            throw $e;
        }
    }
        
    public function getStudentsByCourse($courseID){
        try{
            return $this->getRecords(self::SQL_TABLE_NAME, array('courseID' => $courseID));
        }catch(Exception $e){
            throw $e;
        }            
    }
    
    public function createStudent(Student $obj){
        try{    
            $this->insert(self::SQL_TABLE_NAME, $obj->convertObjectToArray());
        }catch(Exception $e){
            throw $e;
        }            
    }
    
}
