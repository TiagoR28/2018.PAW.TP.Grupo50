<?php
    require_once (realpath(dirname( __FILE__ )) . '/../../Config.php');
    use Config as Conf;
    
require_once (Conf::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Conf::getApplicationModelPath() . 'Student.php');

class StudentManager extends MyDataAccessPDO{
    
    const SQL_TABLE_NAME = 'student';
    
    public function getStudents($convertRecordToObject = false){
        try{
            $results = $this->getRecords('student AS s JOIN course AS c ON s.courseID = c.courseID', null, 
                                            array('s.courseID DESC, s.studentID'));
        }catch(Exception $e){
            throw $e;
        }
              
        $list = array();
        if ($convertRecordToObject){
            foreach($results AS $rec){
                // Estamos a assumir que existe um relacionamento entre os atributos do array e os atributos da classe                    
                $list[$rec['studentID']] = Student::convertArrayToObject($rec);   
            }
        }else{
            $list = $results;
        }
        
        return $list;
    }
    
    public function getStudentsByID($id){
        try{
            return $this->getRecords(self::SQL_TABLE_NAME, array('studentID' => $id));
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
    
    public function updateStudent(Student $obj){
        try{
            $this->update(self::SQL_TABLE_NAME, $obj->convertObjectToArray(), array('studentID' => $obj->getStudentID()));
        }catch(Exception $e){
            throw $e;
        }            
    }    

    public function deleteStudent(Student $obj){
        try{
            $this->delete(self::SQL_TABLE_NAME, array('studentID' => $obj->getStudentID()));
        }catch(Exception $e){
            throw $e;
        }
    }
}
