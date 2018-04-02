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
    public static function create_from_array(array $elements, string $class) : self {
        $r = new self;
        $r->from_array($elements, $class);
        return $r;
    }

    public static function create_from_json(string $filename, string $class) : self {
        $elements = json_decode(file_get_contents($filename), true);

        return self::create_from_array($elements, $class);
    }
}