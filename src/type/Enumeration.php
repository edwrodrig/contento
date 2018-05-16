<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 18-04-18
 * Time: 12:11
 */

namespace edwrodrig\contento\type;

use JsonSerializable;
use ReflectionClass;
use ReflectionException;

/**
 * Class Enumeration
 *
 * A base class to generate enumerations.
 * This class validates the input with all the values of constant of the class.
 * @see Gender one clear example
 * @package edwrodrig\contento\type
 */
abstract class Enumeration implements JsonSerializable
{

    /**
     * The value of the enumeration
     * @var string
     */
    protected $value;

    /**
     * Type constructor.
     *
     * This validates the input value with the valuas of all constant in the class
     * @param string $value
     * @throws exception\InvalidEnumerationValueException
     */
    public function __construct(string $value) {

        if ( in_array($value, $this->getConsts()) ) {
            $this->value = $value;
        } else
            throw new exception\InvalidEnumerationValueException($value, get_class($this));
    }

    /**
     * Get an array with all the values of constants.
     * @return array
     */
    private function getConsts() : array
    {
        try {
            $reflection_class = new ReflectionClass($this);
            return $reflection_class->getConstants();
        } catch (ReflectionException $e) {
            return [];
        }
    }

    /**
     * Get as a string
     * @uses Enumeration::$value
     * @return string
     */
    public function __toString() : string {
        return $this->value;
    }

    /**
     * For json serialization
     * @return mixed|string
     */
    public function jsonSerialize() {
        return $this->value;
    }

}