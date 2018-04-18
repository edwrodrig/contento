<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 18-04-18
 * Time: 12:33
 */

namespace edwrodrig\contento\type\exception;

use Exception;

class InvalidEnumerationValueException extends Exception
{
    public function __construct(string $value, string $class_name) {
        parent::__construct("$class_name [$value]");
    }
}