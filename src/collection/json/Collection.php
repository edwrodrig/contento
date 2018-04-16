<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 20-03-18
 * Time: 14:13
 */

namespace edwrodrig\contento\collection\json;

use ArrayAccess;
use Countable;
use edwrodrig\contento\type\DefaultElement;
use IteratorAggregate;
use ArrayIterator;

class Collection implements ArrayAccess, Countable, IteratorAggregate
{
    private $elements;
    private $class;

    protected function __construct() {
        $this->elements = [];
    }

    protected function from_array(array $data, string $class) {
        $this->class = $class;

        foreach ( $data as $element ) {
            $element_object = $class::create_from_array($element);
            $this->elements[$element_object->get_id()] = $element_object;
        }
    }

    public function getIterator() {
        return new ArrayIterator($this->elements);
    }

    public function sort() {
        if ( method_exists($this->class, 'compare') )
            uasort($this->elements, function($a, $b) { return ($this->class)::compare($a, $b); });
        else
            ksort($this->elements);
    }

    public function reverse_sort() {
        if ( method_exists($this->class, 'compare') )
            uasort($this->elements, function($a, $b) { return ($this->class)::compare($b, $a); });
        else
            krsort($this->elements);
    }

    public function count() : int {
        return count($this->elements);
    }

    public function offsetExists( $offset ) : bool {
        return isset($this->elements[$offset]);
    }

    public function offsetGet ( $offset ) {
        return $this->elements[$offset];
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

    public static function create_from_elements(array $elements) : self {
        $r = new self;
        $last_element = null;
        foreach ( $elements as $element ) {
            $r->elements[$element->get_id()] = $element;
            $last_element = $element;
        }
        if ( !is_null($last_element) ) {
            $r->class = get_class($last_element);
        }

        return $r;
    }

    public static function create_from_array(array $elements, string $class = DefaultElement::class) : self {
        $r = new self;
        $r->from_array($elements, $class);
        return $r;
    }

    public static function create_from_json(string $filename, string $class = DefaultElement::class) : self {
        $elements = json_decode(file_get_contents($filename), true);

        return self::create_from_array($elements, $class);
    }
}