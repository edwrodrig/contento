<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 21-03-18
 * Time: 16:40
 */

namespace edwrodrig\contento\type;

use edwrodrig\contento\collection\Collection;
use JsonSerializable;

abstract class Reference implements JsonSerializable
{
    /**
     * @var string
     */
    private $ref;

    /**
     * @var string
     */
    private $type;

    public function __construct(string $type, string $ref) {
        $this->type = $type;
        $this->ref = $ref;
    }

    public function getRef() : string {
        return $this->ref;
    }

    public function getType() : string {
        return $this->type;
    }

    public function jsonSerialize() {
        return $this->ref;
    }

    public static function setCollection(Collection $collection) {
        static::$collection = $collection;
    }

    public static function getCollection() : Collection {
        return static::$collection;
    }

    public function getElement() {
        return static::getCollection()->getElement($this->getRef());
    }
}