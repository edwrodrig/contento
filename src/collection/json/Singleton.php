<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 02-04-18
 * Time: 11:32
 */

namespace edwrodrig\contento\collection\json;


use edwrodrig\contento\type\DefaultElement;

class Singleton
{
    public static function create_from_json(string $filename, string $class = DefaultElement::class) {
        $element = json_decode(file_get_contents($filename), true);

        return $class::create_from_array($element);

    }
}