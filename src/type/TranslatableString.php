<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 16-03-18
 * Time: 13:45
 */

namespace edwrodrig\contento\type;

use ArrayAccess;

class TranslatableString implements ArrayAccess
{
    /**
     * array
     */
    private $strings;

    public function offsetExists( $offset ) : bool {
        return isset($this->strings[$offset]);
    }

    public function offsetGet ( $offset ) {
        return $this->strings[$offset];
    }

    /**
     * @param $offset
     * @param $value
     * @throws \ErrorException
     */
    public function offsetSet ($offset , $value ) {
        throw new \ErrorException('You can\'t set a value');
    }


    /**
     * @param $offset
     * @throws \ErrorException
     */
    public function offsetUnset($offset ) {
        throw new \ErrorException('You can\'t unset a value');
    }

    public function __construct(array $string) {
        $this->strings = $string;
    }

    public function from_array() : array {
        return $this->strings;
    }

}