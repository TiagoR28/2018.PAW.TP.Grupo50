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

    public static function isInteger($value) {
        return filter_var($value, FILTER_VALIDATE_INT);
    }

    public static function isString($value) {
        return is_string($value);
    }

    public static function validateString($string, $minSize, $maxSize) {
        if (empty($string)) {
            $erro = 'O campo é obrigatorio';
        } else {
            if (strlen($string) < $minSize || strlen($string) > $maxSize) {
                $erro = 'A string deve ter um tamaho superior a ' . $minSize . ' inferior a ' . $maxSize;
            }
        }
        return $erro;
    }

}
