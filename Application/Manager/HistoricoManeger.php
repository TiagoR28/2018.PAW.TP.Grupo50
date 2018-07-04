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
    
    public function filtrarUtentesByDepartamento($data, $idFunc, $convertRecordToObject = false){
        try{
            $results = $this->getRecords('departamento AS d JOIN historico as h ON d.Id = h.idDepartamento Join consulta AS c ON h.idConsulta = c.Id'
                                        , array('entradaDep' => $data, 'idFuncionario' => $idFunc), NULL);
        }catch(Exception $e){
            throw $e;
        }
              
        $list = array();
        if ($convertRecordToObject){
            foreach($results AS $rec){
                // Estamos a assumir que existe um relacionamento entre os atributos do array e os atributos da classe                    
                $list[$rec['id']] = Student::convertArrayToObject($rec);   
            }
        }else{
            $list = $results;
        }
        
        return $list;
    }
    
    public function getUtentesByEstado($id){
        try{
            return $this->getRecords('departamento AS d JOIN historico as h ON d.Id = h.idDepartamento Join consulta AS c ON h.idConsulta = c.Id', 
                    array('idNome' => $id));
        }catch(Exception $e){
            throw $e;
        }
    }
        
    public function CountUtentesByDepartamento($idDepa, $idFunc){
        try{
            return $this->getRecords('departamento AS d JOIN historico as h ON d.Id = h.idDepartamento Join consulta AS c ON h.idConsulta = c.Id JOIN utente AS u ON u.id = c.idNome', array('idDepartamento' => $idDepa, 'idFuncionario' => $idFunc));
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
