<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 05-11-18
 * Time: 16:10
 */

namespace edwrodrig\contento\type;

use Countable;
use IteratorAggregate;

class ReferenceSet implements IteratorAggregate, Countable
{
    /**
     * @var string[]
     */
    private $elements;

    /**
     * @var string
     */
    private $class_name;

    public function __construct(string $class_name = Reference::class) {
        $this->class_name = $class_name;
    }

    /**
     * @param string[] $data
     * @return ReferenceSet
     */
    public static function createFromArray(array $data) {
        $s = new static;
        $s->fromArray($data);
        return $s;
    }

    /**
     * @param string[] $data
     */
    public function fromArray(array $data)
    {
        $this->elements = array_unique($data);
    }

    /**
     * @return \Generator|Reference[]
     */
    public function getIterator() {
        $class_name = $this->class_name;
        foreach ( $this->elements as $reference )
            yield new $class_name($reference);
    }

    /**
     * Count elements of an object
     * @link https://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count()
    {
        return count($this->elements);
    }
}