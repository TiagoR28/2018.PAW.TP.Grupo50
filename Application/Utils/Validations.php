<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Validations
 *
 * @author jam
 */
class Validations {
    private $mandatori = 'O campo é obrigatorio';

    public static function isInteger($value) {
        return filter_var($value, FILTER_VALIDATE_INT);
    }

    public static function isString($value) {
        return is_string($value);
    }

    public static function validateString($string, $minSize, $maxSize) {
        $erro = NULL;
        
        if (empty($string)) {
            $erro = 'O campo é obrigatorio';
        } else {
            if (strlen($string) < $minSize || strlen($string) > $maxSize) {
                $erro = 'O campo deve ter um tamaho superior a ' . $minSize . ' inferior a ' . $maxSize;
            }
        }
        return $erro;
    }
    
    public static function validateDate($date) {
        $erro = NULL;
        $max = '2018-01-01';
        $min = '1900-01-01';
        $format = 'Y-m-d';
        
        
        if (!$aux = DateTime::createFromFormat($format, $date)) {
            $erro = 'O campo é obrigatorio';
        } else {
            if(strtotime($date) > strtotime($max) || strtotime($date) < strtotime($min)) {
                $erro = 'O campo deve estar entre os anos 1900 e 2018';
            }
        }
        return $erro;
    }
}
