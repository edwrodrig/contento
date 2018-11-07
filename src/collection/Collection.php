<?php
declare(strict_types=1);

namespace edwrodrig\contento\collection;

use Countable;
use edwrodrig\contento\type\DefaultElement;
use edwrodrig\contento\type\Element;
use IteratorAggregate;
use ArrayIterator;

/**
 * Class Collection
 * Represents a collection of elements from json elements
 * @package edwrodrig\contento\collection\json
 */
class Collection implements Countable, IteratorAggregate
{
    /**
     * An array of elements of the collection.
     * All must be object of class {@see Collection::$class_name}
     * @var array
     */
    private $elements;

    /**
     * The class name of the element of this collection
     * @var string
     */
    private $class_name;


    /**
     * Collection constructor.
     */
    protected function __construct() {
        $this->elements = [];
    }

    protected function fromArray(array $data, string $class_name) {
        $this->class_name = $class_name;

        foreach ( $data as $element ) {

            /** @noinspection PhpUndefinedMethodInspection */
            $element_object = $class_name::createFromArray($element);

            /** @noinspection PhpUndefinedMethodInspection */
            $this->elements[$element_object->getId()] = $element_object;
        }
    }

    public function getIterator() {
        return new ArrayIterator($this->elements);
    }

    /**
     * Sort the elements in ascendent order.
     *
     * first < last
     * @see Collection::reverseSort() to order in reverse order
     */
    public function sort() : Collection {
        if ( method_exists($this->class_name, 'compare') )
            uasort($this->elements, function($a, $b) { return ($this->class_name)::compare($a, $b); });
        else
            ksort($this->elements);

        return $this;
    }

    /**
     * Sort the elements in descendent order.
     *
     * first > last
     * @see Collection::reverseSort() to order in normal order
     */
    public function reverseSort() : Collection {
        if ( method_exists($this->class_name, 'compare') )
            uasort($this->elements, function($a, $b) { return ($this->class_name)::compare($b, $a); });
        else
            krsort($this->elements);

        return $this;
    }

    /**
     * The number of elements
     * @return int
     */
    public function count() : int {
        return count($this->elements);
    }

    /**
     * Get an element by key
     *
     * The key coincide with the element {@see Element::getId() id}
     * @param string $offset
     * @return Element
     */
    public function getElement(string $offset) {
        return $this->elements[$offset];
    }

    /**
     * Get an element by key or default
     *
     * Is the same as {@see Collection::getElement()} but with a fallback default value
     * The key coincide with the element {@see Element::getId() id}
     * @param string $offset
     * @param null $default
     * @return mixed|null
     */
    public function getElementOrDefault(string $offset, $default = null) {
        if ( isset($this->elements[$offset]) )
            return $this->elements[$offset];
        else
            return $default;
    }

    /**
     * Get the class name of the object in this collection
     * @return string
     */
    public function getClassName() : string {
        return $this->class_name;
    }

    /**
     * Create filtered collection
     *
     * @param $filter
     * @return Collection
     */
    public function createFiltered($filter) : Collection {
        $collection = new static;
        $collection->elements = array_filter($this->elements, $filter);
        $collection->class_name = $this->class_name;
        return $collection;
    }

    /**
     * Split the elements of this collection
     *
     * Creates a associative array with collections. Each element is inserted in every collection that matches the filter function
     *
     * Callback function must return an string or an array of string corresponding to the collection where the element belong. A element may belong yo more than one collection.
     * @param $filter callable a callback function
     * @return Collection[]
     */
    public function createOrganized(callable $filter) : array {
        /** @var $result Collection[] */
        $result = [];

        foreach ( $this->elements as $element ) {


            $keys = $filter($element);

            if ( is_string($keys) )
                $keys = [$keys];

            if ( count($keys) == 0 ) {
                $keys = ['without classification'];
            }

            foreach ( $keys as $key ) {
                if (!isset($result[$key])) {
                    $collection = new static;
                    $collection->class_name = $this->class_name;
                    $result[$key] = $collection;
                }

                $result[$key]->elements[$element->getId()] = $element;
            }
        }

        return $result;
    }

    /**
     * Add an element to the list
     * @param $element
     * @return mixed
     */
    public function addElement($element) {
        $this->elements[$element->getId()] = $element;
        return $element;
    }

    /**
     * @param Element[] $elements
     * @return Collection
     */
    public static function createFromElements(array $elements) {
        $r = new static;
        $last_element = null;
        foreach ( $elements as $element ) {
            $last_element = $r->addElement($element);
        }

        if ( !is_null($last_element) ) {
            $r->class_name = get_class($last_element);
        }

        return $r;
    }

    /**
     * @param array $elements
     * @param string $class
     * @return Collection
     */
    public static function createFromArray(array $elements, string $class = DefaultElement::class)  {
        $r = new static;
        $r->fromArray($elements, $class);
        return $r;
    }

    /**
     * @param string $filename
     * @param string $class
     * @return Collection
     */
    public static function createFromJson(string $filename, string $class = DefaultElement::class)  {
        $elements = json_decode(file_get_contents($filename), true);

        return self::createFromArray($elements, $class);
    }
}