<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 02-04-18
 * Time: 11:32
 */

namespace edwrodrig\contento\collection;

use edwrodrig\contento\type\DefaultElement;

class Singleton
{
    /**
     * Create a object from a json filename
     *
     * This is a convenience function
     * @param string $filename
     * @param string $class_name
     * @return mixed
     */
    public static function createFromJson(string $filename, string $class_name = DefaultElement::class) {
        $element = json_decode(file_get_contents($filename), true);

        /** @noinspection PhpUndefinedMethodInspection */
        return $class_name::createFromArray($element);

    }
}