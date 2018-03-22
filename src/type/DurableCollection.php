<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 22-03-18
 * Time: 7:35
 */

namespace edwrodrig\contento\type;

use ArrayIterator;

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
        usort($this->elements, function($a, $b) { $a::compare($a, $b); });
    }

    public function get_active_elements($now = null) {
        $copy = clone self;
        $copy->elements = [];

        foreach ( $this->elements as $element ) {
            if ( $element->get_duration()->is_active($now) ) {
                $copy->elements[] = $element;
            }
        }
        return $copy;
    }

    public function get_finished_elements($now = null) {
        $copy = clone self;
        $copy->elements = [];

        foreach ( $this->elements as $element ) {
            if ( $element->get_duration()->has_finished($now) ) {
                $copy->elements[] = $element;
            }
        }
        return $copy;
    }


}