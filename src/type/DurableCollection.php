<?php
declare(strict_types=1);

namespace edwrodrig\contento\type;

use ArrayAccess;
use ArrayIterator;
use Countable;
use DateTime;
use IteratorAggregate;

/**
 * Trait DurableCollection
 *
 * This trait is useful when an object has a set of object with durations, for example the studies of a person.
 * Every study has a duration so the education of a person as a set of study is a durable collection
 * @package edwrodrig\contento\type
 */
class DurableCollection implements IteratorAggregate, ArrayAccess, Countable
{
    /**
     * The durable elements
     * @var Durable[]
     */
    protected $elements;

    /**
     * Get an interator.
     *
     * Convenience function to iterate thought the class. In the class that use this trait just need to implements IteratorAggregate in their declaration to be iterable.
     * ```
     * class SomeCollection implements IteratorAggregate {
     *      use DurableCollection;
     * }
     * @return ArrayIterator
     */
    public function getIterator() {
        return new ArrayIterator($this->elements);
    }

    /**
     * Sort the dates.
     *
     * When you use this class always keep elements sorted or some functions will return wrong values.
     * The first indexes are in the past and the last are more in the present
     */
    public function sort() : self {

        usort($this->elements, function($a, $b) {
            /**
             * @var $a Durable
             * @var $b Durable
             */
            return DateDuration::compare($a->getDuration(), $b->getDuration());
        });

        return $this;
    }

    /**
     * Get the active elements.
     *
     * Returns a new DurableCollection element with the {@see DateDuration::isActive() active elements} only
     * @param null|DateDuration|DateTime $now
     * @return DurableCollection
     */
    public function getActiveElements($now = null) : self {
        $copy = clone $this;
        $copy->elements = [];

        foreach ( $this->elements as $element ) {
            /** @var $element Durable*/
            if ( $element->getDuration()->isActive($now) ) {
                $copy->elements[] = $element;
            }
        }
        return $copy;
    }

    /**
     * Get the finished elements.
     *
     * Returns a new DurableCollection element with the {@see DateDuration::hasFinished() finished elements} only
     * @param null|DateDuration|DateTime $now
     * @return DurableCollection
     */
    public function getFinishedElements($now = null) : self {
        $copy = clone $this;
        $copy->elements = [];

        foreach ( $this->elements as $element ) {
            /** @var $element Durable*/
            if ( $element->getDuration()->hasFinished($now) ) {
                $copy->elements[] = $element;
            }
        }
        return $copy;
    }

    /**
     * Get the started elements.
     *
     * Returns a new DurableCollection element with the {@see DateDuration::hasStarted() started elements} only
     * @param null|DateDuration|DateTime $now
     * @return DurableCollection
     */
    public function getStartedElements($now = null) : self {
        $copy = clone $this;
        $copy->elements = [];

        foreach ( $this->elements as $element ) {
            /** @var $element Durable*/
            if ( $element->getDuration()->hasStarted($now) ) {
                $copy->elements[] = $element;
            }
        }
        return $copy;
    }

    /**
     * Is active?
     *
     * Returns if one of the elements is active.
     * @uses DurationCollection::getActiveElements()
     * @param null|DateDuration|DateTime $now
     * @return bool
     */
    public function isActive($now = null) : bool {
        /**
         * @var $elements \Countable
         */
        $elements = $this->getActiveElements($now);
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

    /**
     * The number of elements.
     * @return int
     */
    public function count() : int {
        return count($this->elements);
    }

    /**
     * For serializing to json
     * @return Durable[]
     */
    public function jsonSerialize() {
        return $this->elements;
    }

    /**
     * Get the start date of the collection.
     *
     * The most past {@see DateDuration::getStart() start date} in the collection. Null means start of time
     * @return DateTime|null
     */
    public function getStart() : ?DateTime {
        $min = null;
        foreach ( $this->elements as $element ) {
            /** @var $element Durable*/
            $start = $element->getDuration()->getStart();
            if ( is_null($start) ) return null;
            if ( is_null($min) ) $min = $start;
            else if ( $min > $start ) $min = $start;
        }
        return $min;
    }

    /**
     * Get the end date of the collection.
     *
     * The most future {@see DateDuration::getEnd() end date} in the collection. Null means end of time
     * @return DateTime|null
     */
    public function getEnd() : ?DateTime {
        $max = null;
        foreach ( $this->elements as $element ) {
            /** @var $element Durable*/
            $end = $element->getDuration()->getEnd();
            if ( is_null($end) ) return null;
            if ( is_null($max) ) $max = $end;
            else if ( $max < $end ) $max = $end;
        }
        return $max;
    }

    /**
     * Get the first element occurred.
     *
     * The element most related to past
     * The elements must be {@see DurableCollection::sort() sorted}
     * @return Durable|null
     */
    public function getFirst() {
        return $this->elements[0] ?? null;
    }

    /**
     * Get the last element occurred.
     *
     * The element most related to future.
      The elements must be {@see DurableCollection::sort() sorted}
     * @return Durable|null
     */
    public function getLast() {
        return $this->elements[count($this->elements) - 1] ?? null;
    }
}