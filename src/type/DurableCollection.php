<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 22-03-18
 * Time: 7:35
 */

namespace edwrodrig\contento\type;

use ArrayIterator;
use DateTime;

trait DurableCollection
{
    /**
     * @var Durable[]
     */
    protected $elements;


    public function getIterator() {
        return new ArrayIterator($this->elements);
    }

    public function sort() {
        usort($this->elements, function($a, $b) { return DateDuration::compare($a->get_duration(), $b->get_duration()); });
    }

    public function get_active_elements($now = null) {
        $copy = clone $this;
        $copy->elements = [];

        foreach ( $this->elements as $element ) {
            /** @var $element Durable*/
            if ( $element->get_duration()->is_active($now) ) {
                $copy->elements[] = $element;
            }
        }
        return $copy;
    }

    public function get_finished_elements($now = null) {
        $copy = clone $this;
        $copy->elements = [];

        foreach ( $this->elements as $element ) {
            /** @var $element Durable*/
            if ( $element->get_duration()->has_finished($now) ) {
                $copy->elements[] = $element;
            }
        }
        return $copy;
    }

    public function get_started_elements($now = null) {
        $copy = clone $this;
        $copy->elements = [];

        foreach ( $this->elements as $element ) {
            /** @var $element Durable*/
            if ( $element->get_duration()->has_started($now) ) {
                $copy->elements[] = $element;
            }
        }
        return $copy;
    }

    public function is_active($now = null) : bool {
        $elements = $this->get_active_elements($now);
        return count($elements) > 0;
    }


    public function offsetExists($offset) : bool {
        $count = count($this->elements);
        if ( $offset < 0 )
            return isset($this->elements[$count + $offset]);
        else
            return isset($this->elements[$offset]);
    }

    public function offsetGet($offset) {
        $count = count($this->elements);
        if ( $offset < 0 )
            return $this->elements[$count + $offset];
        else
            return $this->elements[$offset];
    }

    public function offsetSet($offset, $value) {}

    public function offsetUnset($offset) {}

    public function count() : int {
        return count($this->elements);
    }

    public function jsonSerialize() {
        return $this->elements;
    }

    public function get_start() : ?DateTime {
        $min = null;
        foreach ( $this->elements as $element ) {
            /** @var $element Durable*/
            $start = $element->get_duration()->get_start();
            if ( is_null($start) ) return null;
            if ( is_null($min) ) $min = $start;
            else if ( $min > $start ) $min = $start;
        }
        return $min;
    }

    public function get_end() : ?DateTime {
        $max = null;
        foreach ( $this->elements as $element ) {
            /** @var $element Durable*/
            $end = $element->get_duration()->get_end();
            if ( is_null($end) ) return null;
            if ( is_null($max) ) $max = $end;
            else if ( $max < $end ) $max = $end;
        }
        return $max;
    }

    public function get_first() {
        return $this->elements[count($this->elements) - 1] ?? null;
    }

    public function get_last() {
        return $this->elements[0] ?? null;
    }
}