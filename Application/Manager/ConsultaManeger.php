<?php
    require_once (realpath(dirname( __FILE__ )) . '/../../Config.php');
    use Config as Conf;
    
require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationModelPath() . 'Consultas.php');

class ConsultaManager extends MyDataAccessPDO{
    
    const SQL_TABLE_NAME = 'consulta';
    
    public function getConsultas($convertRecordToObject = false){
        try{
            $results = $this->getRecords('consulta AS c JOIN utente AS u ON C.idNome = u.id', null,
                                            null);
        }catch(Exception $e){
            throw $e;
        }
              
        $list = array();
        if ($convertRecordToObject){
            foreach($results AS $rec){
                // Estamos a assumir que existe um relacionamento entre os atributos do array e os atributos da classe                    
                $list[$rec['Id']] = Consultas::convertArrayToObject($rec);   
            }
        }else{
            $list = $results;
        }
        
        return $list;
    }
    
    public function getRelatorioByID($id){
        try{
            return $this->getRecords('departamento AS d JOIN historico as h ON d.Id = h.idDepartamento '
                    . 'Join consulta AS c ON h.idConsulta = c.Id '
                    . 'JOIN hospital AS hos ON hos.id = c.idHospital '
                    . 'JOIN utente AS u ON U.id = c.idNome '
                    . 'JOIN exames AS e ON e.idConsulta = c.Id '
                    . 'JOIN funcionario AS f ON f.id = e.idMedico', array('idNome' => $id));
        }catch(Exception $e){
            throw $e;
        }
    }
    
    public function getConsultaByID($id){
        try{
            return $this->getRecords(self::SQL_TABLE_NAME, array('id' => $id));
        }catch(Exception $e){
            throw $e;
        }
    }
    
    
    
    public function createConsulta(Consultas $obj){
        try{    
            $this->insert(self::SQL_TABLE_NAME, $obj->convertObjectToArray());
        }catch(Exception $e){
            throw $e;
        }            
    }
}
