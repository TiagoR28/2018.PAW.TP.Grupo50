<?php

/**
 * Ficheiro de configuração
 *
 * @author ESTGF.PAW
 */
class Config {
    
    const IMAGES_FOLDER = '/Images/';
    
    const SGBD_HOST_NAME = 'localhost';
    const SGBD_DATABASE_NAME = 'recurso';
    const SGBD_USERNAME = 'root';
    const SGBD_PASSWORD = '';
    
    public static function getApplicationPath(){
        return realpath(dirname( __FILE__ )) . '/Application/';
    }
    
    public static function getApplicationDatabasePath(){
        return self::getApplicationPath() . '/Database/';
    }
    
    public static function getApplicationManagerPath(){
        return self::getApplicationPath() . '/Manager/';
    }
    
    public static function getApplicationModelPath(){
        return self::getApplicationPath() . '/Model/';
    }
    
    public static function getApplicationUtilsPath(){
        return self::getApplicationPath() . '/Utils/';
    }    
    
    public static function getApplicationValidarPath(){
        return self::getApplicationPath() . '/Validar/';
    }  
    
    public static function getApplicationCSSPath(){
        return '../CSS/';
    } 
    
    public static function getApplicationBootstrapPath(){
        return '../CSS/bootstrap-3.3.7-dist/css/';
    } 
    
    public static function getApplicationImagePath(){
        return '../img/';
    }
    
    public static function getApplicationViewPath(){
        return '../View/';
    }
    
    public static function getApplicationJavaScriptPath(){
        return '../JavaScript/';
    }
    
    public static function getApplicationGraficoPath(){
        return '../phplot-6.2/';
    }
}
