<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 16-04-18
 * Time: 11:53
 */

namespace edwrodrig\contento\type;


/**
 * Class DefaultElement
 *
 * A default class to load from {@see Collection::createFromArray() collections} an {@see Collection::createFromArray() singletons}/
 * Always prefer to make your own classes. Use this only while you're testing or fast prototyping.
 * @package edwrodrig\contento\type
 */
class DefaultElement
{
    /**
     * The array with the original data
     * @var array
     */
    private $data;

    /**
     * Constructor from array.
     *
     * If the data does not has an {@see DefaultElement::getId() id} it generates one automatically.
     * @param array $data
     * @return DefaultElement
     */
    public static function createFromArray(array $data) {

        if ( !isset($data['id']) ) $data['id'] = uniqid();

        $s = new self;
        $s->data = $data;
        return $s;
    }

    /**
     * Get the id
     * @return string
     */
    public function getId() : string {
        return $this->data['id'];
    }

    /**
     * Get the data
     * @return array
     */
    public function getData() : array {
        return $this->data;
    }
}