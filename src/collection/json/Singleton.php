<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 02-04-18
 * Time: 11:32
 */

namespace edwrodrig\contento\collection\json;


class Singleton
{
    public static function create_from_json(string $filename, string $class) {
        $element = json_decode(file_get_contents($filename), true);

        return $class::create_from_array($element);

    }
}