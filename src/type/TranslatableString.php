<?php
declare(strict_types=1);

namespace edwrodrig\contento\type;

use ArrayAccess;
use ErrorException;
use JsonSerializable;

/**
 * Class TranslatableString
 *
 * A class to hold translatable strings.
 * Build from associative arrays and use as an array.
 * @package edwrodrig\contento\type
 */
class TranslatableString implements ArrayAccess, JsonSerializable
{
    /**
     * A associative array where each key is a language prefix and this values are the corresponding translation
     * @var string[]
     */
    private $strings;

    /**
     * Check if the value exists with isset
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists( $offset ) : bool {
        return isset($this->strings[$offset]);
    }

    /**
     * To get a translation value with []
     *
     * @param mixed $offset
     * @return mixed|string
     */
    public function offsetGet ( $offset ) {
        return $this->strings[$offset];
    }

    /**
     * Unimplemented.
     *
     * Never use
     * @internal
     * @param $offset
     * @param $value
     * @throws ErrorException
     */
    public function offsetSet ($offset , $value ) {
        throw new ErrorException('You can\'t set a value');
    }


    /**
     * Unimplemented.
     *
     * Never use
     * @internal
     * @param $offset
     * @throws ErrorException
     */
    public function offsetUnset($offset ) {
        throw new ErrorException('You can\'t unset a value');
    }

    /**
     * TranslatableString constructor.
     *
     * @param array $string
     */
    public function __construct(array $string) {
        $this->strings = $string;
    }

    /**
     * Get a array representation
     *
     * @return array
     */
    public function fromArray() : array {
        return $this->strings;
    }

    /**
     * For json serialization
     * @return array|mixed
     */
    public function jsonSerialize() {
        return $this->strings;
    }

}