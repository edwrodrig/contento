<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 18-04-18
 * Time: 16:23
 */

namespace edwrodrig\contento;

use Exception;

class Util
{
    public static function create_or_null(&$value, string $class_name) {
        if ( isset($value) ) {
            try {
                return new $class_name($value);
            } catch ( Exception $e) {
                return null;
            }
        } else {
            return null;
        }
    }
}