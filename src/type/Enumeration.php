<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 18-04-18
 * Time: 12:11
 */

namespace edwrodrig\contento\type;

use JsonSerializable;
use ReflectionClass;

abstract class Enumeration implements JsonSerializable
{

    /**
     * @var string
     */
    protected $value;

    /**
     * Type constructor.
     * @param string $value
     * @throws exception\InvalidEnumerationValueException
     */
    public function __construct(string $value) {

        if ( in_array($value, $this->get_consts()) ) {
            $this->value = $value;
        } else
            throw new exception\InvalidEnumerationValueException($value, get_class($this));
    }

    private function get_consts() : array
    {
        $reflection_class = new ReflectionClass($this);
        return $reflection_class->getConstants();
    }

    public function __toString() : string {
        return $this->value;
    }

    public function jsonSerialize() {
        return $this->value;
    }

}