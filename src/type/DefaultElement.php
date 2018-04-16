<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 16-04-18
 * Time: 11:53
 */

namespace edwrodrig\contento\type;

/**
 * Class DefaultElement
 * Usado para cargar json cuando no se tiene ninguna clase contenedora
 * @package edwrodrig\contento\type
 */
class DefaultElement
{
    public $data;

    public static function create_from_array(array $data) {
        $s = new self;
        $s->data = $data;
        return $s;
    }

    public function get_id() : string {
        return $this->data['id'] ?? uniqid();
    }

    public function __call($name, $args) {
        $parts = explode('get_', $name, 2);
        if ( count($parts) != 2 ) throw new \BadMethodCallException($name);
        if ( !empty($parts[0]) ) throw new \BadMethodCallException($name);

        return $this->data[$parts[1]] ?? null;
    }
}