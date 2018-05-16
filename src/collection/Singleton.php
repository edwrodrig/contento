<?php
declare(strict_types=1);

namespace edwrodrig\contento\collection;

use edwrodrig\contento\type\DefaultElement;

/**
 * Class Singleton
 *
 * It just a util class that have the same format than {@see Collection}.
 * @package edwrodrig\contento\collection
 */
class Singleton
{
    /**
     * Create a object from a json filename
     *
     * This is a convenience function.
     * Tries to resemble {@see Collection::createFromJson()} but fot singleton elements instead collections.
     *
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