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
    /**
     * 
     * @param type $date
     * @return string
     * @note Tem bugs 
     */
    public static function validateDate($date) {
        $erro = NULL;
        $format = 'Y-m-d';
        $min = DateTime::createFromFormat($format, '1900-01-01');
        $aux = DateTime::createFromFormat($format, $date);
        $now = date($format);
        if (!$aux instanceof DateTime) {
            $erro = 'O campo é obrigatorio';
        } else {
            if ($aux < $min || $aux < $now) {
                $erro = 'O campo deve estar entre o ano 1900 e a data autal';
            }
        }
        return $erro;
    }
    /**
     * 
     * @param type $valor
     * @param type $array
     */
    public static function validateRadio($valor, $array) {
        $cont = 0;
        $erro = NULL;
     
        foreach ($array as $key => $value) {
            if ($valor == $value) {
                $cont++;
            }
        }
        if ($cont != 1) {
            $erro = 'O campo é obrigatorio';
        }
        
        return $erro;
    }

    public static function validateInteger($valor, $size) {
        $erro = NULL;
        
        if (strlen($valor) != $size) {
            $erro = 'O campo deve ter um tamanho de ' . $size . ' numeros';
        }
        
        return $erro;
    }
}
